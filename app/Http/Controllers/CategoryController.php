<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::withCount('articles')->paginate(10);
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:categories,name',
            'slug' => 'required|max:255|unique:categories,slug',
        ]);

        try { 
            Category::create([
                'name' => $request->name,
                'slug' => Str::slug($request->slug),
            ]);
            return redirect()->route('admin.category.index')->with('success', 'Kategori berhasil dibuat.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal membuat kategori')->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {   
        // Check if the category has articles
        if ($category->articles()->count() > 0) {
            return redirect()->back()->with('error', 'Kategori tidak dapat dihapus karena masih memiliki artikel.');
        }

        try {
            $category->delete();
            return redirect()->route('admin.category.index')->with('success', 'Kategori berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus kategori. Silakan coba lagi.')->withErrors($e->getMessage());
        }
    }
}
