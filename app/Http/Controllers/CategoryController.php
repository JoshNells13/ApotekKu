<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $CountCategory = Category::count();

        $categories = Category::latest()->get();
        return view('Admin.category.index', compact('categories','CountCategory'));
    }


    public function create()
    {

        return view('Admin.category.create');
    }





    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'icon' => 'required|image|mimes:png,jpg,jpeg,svg,webp|max:2048'
        ]);

        $iconPath = $request->file('icon')->store('categories', 'public');

        Category::create([
            'name' => $request->name,
            'icon' => $iconPath
        ]);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit(Category $category)
    {
        return view('Admin.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'icon' => 'nullable|image|mimes:png,jpg,jpeg,svg,webp|max:2048'
        ]);

        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ];

        // Kalau upload icon baru
        if ($request->hasFile('icon')) {

            // hapus icon lama
            if ($category->icon && Storage::disk('public')->exists($category->icon)) {
                Storage::disk('public')->delete($category->icon);
            }

            // simpan icon baru
            $data['icon'] = $request->file('icon')
                ->store('categories', 'public');
        }

        $category->update($data);

        return redirect()->route('admin.categories.index')->with('success', 'Kategori Berhasil Di Ubah');
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('success', 'Category deleted');
    }
}
