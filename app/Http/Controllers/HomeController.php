<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $LatestProduct = Product::latest()->take(6)->get();

        $Category = Category::all();


        return view('User.Home.index', compact('LatestProduct','Category'));
    }

    public function ShowCategory ($slug){
        $Category = Category::where('slug')->first();

        $Product = Product::where('category_id', $Category->id)->get();

        $CategoryAll = Category::all();

        return view('User.Home.Category', compact('Product','CategoryAll'));
    }
}
