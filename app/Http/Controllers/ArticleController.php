<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // Show all articles on dashboard
    public function index()
    {
        $articles = Article::latest()->get();
        return view('dashboard', compact('articles'));
    }

    // Form to create new article
    public function create()
    {
        return view('articles.create');
    }

    // Store new article in DB
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

        return redirect()->route('dashboard')->with('success', 'Article created successfully!');
    }
}
