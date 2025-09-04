<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // =================== USER ===================
    public function index()
    {
        $articles = Article::latest()->get();
        return view('dashboard', compact('articles')); // user dashboard
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'image'   => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public');
        }

        Article::create([
            'title'   => $request->title,
            'content' => $request->content,
            'image'   => $imagePath,
        ]);

        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard')->with('success', 'Article created successfully!');
        }

        return redirect()->route('user.dashboard')->with('success', 'Article created successfully!');
    }

    // =================== ADMIN ===================
    public function adminIndex()
    {
        $articles = Article::latest()->get();
        return view('admin.dashboard', compact('articles'));
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'image'   => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $imagePath = $article->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public');
        }

        $article->update([
            'title'   => $request->title,
            'content' => $request->content,
            'image'   => $imagePath,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Article updated successfully!');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Article deleted successfully!');
    }

    public function show($id)
{
    $article = Article::findOrFail($id);
    return view('articles.show', compact('article'));
}

}
// =================== SHOW SINGLE ARTICLE ===================
