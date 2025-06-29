<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class PublicArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('user', 'category')
            ->where('is_published', true)
            ->orderByDesc('published_at')
            ->paginate(10);

        return view('public.article.index', compact('articles'));
    }
    
    public function show($slug)
    {
        $article = Article::with('user', 'category', 'tags')
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();
        
        $artikelTerbaru = Article::latest()
            ->where('is_published', true)
            ->take(5)
            ->get();
        
        return view('public.article.show', compact('article', 'artikelTerbaru'));
    }

    public function byCategory($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $articles = Article::with('user', 'category')
            ->where('category_id', $category->id)
            ->where('is_published', true)
            ->orderByDesc('published_at')
            ->paginate(10);

        return view('public.article.by-category', compact('articles', 'category'));
    }
}
