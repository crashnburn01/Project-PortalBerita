<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class adminIndexController extends Controller
{
    public function index()
    {
        $articles = Article::with('user', 'category')->latest()->take(3)->get();

        return view('admin.index', compact('articles'));
    }
}
