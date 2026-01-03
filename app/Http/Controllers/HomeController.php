<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $LatestProduct = Product::with('category')->latest()->paginate(5);

        $Category = Category::all();


        return view('User.Home.index', compact('LatestProduct', 'Category'));
    }

    public function ShowCategory($slug)
    {
        $Category = Category::where('slug', $slug)->first();

        $Product = $Category->products;

        $CategoryAll = Category::all();

        return view('User.Home.Category', compact('Product', 'CategoryAll', 'Category'));
    }

    public function Detail($slug)
    {

        $Product = Product::where('slug', $slug)->first();

        return view('User.Home.detail', compact('Product'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'q' => 'required|string|max:100',
        ]);

        $keyword = $request->q;

        $Products = Product::with('category')
            ->where('name', 'LIKE', "%{$keyword}%")
            ->orWhere('about', 'LIKE', "%{$keyword}%")
            ->orWhereHas('category', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%");
            })
            ->latest()
            ->paginate(8)
            ->withQueryString();

        $CategoryAll = Category::all();

        return view('User.Home.search', compact(
            'Products',
            'CategoryAll',
            'keyword'
        ));
    }
}
