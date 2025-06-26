<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ArticleController extends Controller
{

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $articles = Article::with('user', 'category')->paginate(10);
        $categories = Category::all();
        return view('admin.article.index', compact('articles','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.article.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $slug = Str::slug($request->title);

            if ($request->hasFile('thumbnail')) {
                $file = $request->file('thumbnail');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('portal-assets/img'), $filename);
                $thumbnail = 'portal-assets/img/' . $filename;
            } else {
                $thumbnail = null;
            }

            $user = Auth::user();

            Article::create([
                'title' => $request->title,
                'slug' => $slug,
                'content' => $request->content,
                'thumbnail' => $thumbnail,
                'user_id' => $user->id,
                'category_id' => $request->category_id,
                'is_published' => $request->has('is_published'),
                'published_at' => $request->has('is_published') ? now() : null,
            ]);

            return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil dibuat.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal mengunggah artikel. Silakan coba lagi.');
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
    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('admin.article.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        try {
            $slug = Str::slug($request->title);
        
            if ($request->hasFile('thumbnail')) {
                // Hapus file lama jika ada
                if ($article->thumbnail && file_exists(public_path($article->thumbnail))) {
                    unlink(public_path($article->thumbnail));
                }
            
                $file = $request->file('thumbnail');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('portal-assets/img'), $filename);
                $thumbnail = 'portal-assets/img/' . $filename;
            } else {
                $thumbnail = $article->thumbnail;
            }
        
            $article->update([
                'title' => $request->title,
                'slug' => $slug,
                'content' => $request->content,
                'category_id' => $request->category_id,
                'is_published' => $request->has('is_published'),
                'published_at' => $request->has('is_published') ? now() : null,
                'thumbnail' => $thumbnail,
            ]);
        
            return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui artikel.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if ($article->thumbnail && file_exists(public_path($article->thumbnail))) {
            unlink(public_path($article->thumbnail));
        }
        $article->delete();
        return back()->with('success', 'Artikel berhasil dihapus.');
    }
}
