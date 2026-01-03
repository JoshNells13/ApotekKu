<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductTransaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {

        $CountProduct = Product::count();

        $Categories = Category::all();

        $products = Product::with('category')->latest()->paginate(10);
        return view('Admin.product.index', compact('products', 'CountProduct', 'Categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('Admin.product.create', compact('categories'));
    }




    public function store(Request $request)
    {
        $validated = $request->validate([
            'address'       => 'required|string|max:255',
            'city'          => 'required|string|max:100',
            'post_code'     => 'required|string|max:10',
            'phone_number'  => 'required|string|max:20',
            'notes'         => 'nullable|string|max:255',
            'proof'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $transaction = DB::transaction(function () use ($validated, $request) {

            $carts = Cart::with('product')
                ->where('user_id', Auth::id())
                ->get();

            if ($carts->isEmpty()) {
                abort(400, 'Keranjang kosong');
            }

            // Hitung total
            $totalAmount = $carts->sum(fn($cart) => $cart->product?->price ?? 0);

            // Upload bukti pembayaran (jika ada)
            $proofPath = null;
            if ($request->hasFile('proof')) {
                $proofPath = $request->file('proof')->store(
                    'transaction-proofs',
                    'public'
                );
            }

            // Create transaksi
            $transaction = ProductTransaction::create([
                'user_id'       => Auth::id(),
                'total_amount' => $totalAmount,
                'is_paid'      => false,
                'address'      => $validated['address'],
                'city'         => $validated['city'],
                'post_code'    => $validated['post_code'],
                'phone_number' => $validated['phone_number'],
                'notes'        => $validated['notes'] ?? null,
                'proof'        => $proofPath,
            ]);

            // Detail transaksi
            foreach ($carts as $cart) {
                if (!$cart->product) continue;

                TransactionDetail::create([
                    'product_transaction_id' => $transaction->id,
                    'product_id'             => $cart->product_id,
                    'price'                  => $cart->product->price,
                ]);
            }

            // Kosongkan cart
            Cart::where('user_id', Auth::id())->delete();

            return $transaction;
        });

        return redirect()
            ->route('transactions.index')
            ->with('success', 'Transaksi berhasil dibuat');
    }



    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('Admin.product.edit', compact('product', 'categories'));
    }


    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|integer',
            'about'       => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        // Default: pakai foto lama
        $photoPath = $product->photo;

        // Jika upload foto baru
        if ($request->hasFile('photo')) {

            // 🗑️ Hapus foto lama jika ada
            if ($product->photo && Storage::disk('public')->exists($product->photo)) {
                Storage::disk('public')->delete($product->photo);
            }

            // 📸 Simpan foto baru
            $photoPath = $request->file('photo')
                ->store('products', 'public');
        }

        // Update data
        $product->update([
            'name'        => $request->name,
            'price'       => $request->price,
            'about'       => $request->about,
            'category_id' => $request->category_id,
            'photo'       => $photoPath,
        ]);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil diperbarui ✨');
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Product deleted');
    }
}
