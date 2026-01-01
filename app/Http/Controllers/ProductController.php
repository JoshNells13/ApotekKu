<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {

        $CountProduct = Product::count();

        $products = Product::with('category')->latest()->paginate(10);
        return view('Admin.product.index', compact('products','CountProduct'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('Admin.product.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|integer',
            'about'       => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'photo'       => 'required|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')
                ->store('products', 'public');
        }

        Product::create([
            'name'        => $request->name,
            'price'       => $request->price,
            'about'       => $request->about,
            'category_id' => $request->category_id,
            'photo'       => $photoPath,
        ]);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil ditambahkan 🚀');
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
