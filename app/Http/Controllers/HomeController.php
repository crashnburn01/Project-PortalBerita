<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {   
        $articles = Article::with('user', 'category')
            ->where('is_published', true)
            ->latest()
            ->take(2)
            ->get();

        $article4 = Article::with('user', 'category')
            ->where('is_published', true)
            ->latest()
            ->take(4)
            ->get();

        $artikelKampus = Article::with('user', 'category')
            ->where('is_published', true)
            ->whereHas('category', function ($query) {
                $query->where('name', 'Kampus');
            })->latest()->take(3)->get();

        $opini = Article::with('user', 'category')
            ->where('is_published', true)
            ->whereHas('category', function ($query) {
                $query->where('name', 'Opini');
            })->latest()->take(2)->get();

        return view('public.home', compact('articles', 'article4', 'artikelKampus', 'opini'));
    }
}
