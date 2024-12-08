<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\article as ModelsArticle;

class Article extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = ModelsArticle::all();
        return view('article.show', compact('articles'));
    }
    public function showDetail($id)
    {
        $article = ModelsArticle::find($id);
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'picture_article' => 'required|file|mimes:jpg,jpeg,png|max:2048', // Maksimal 2MB
        ]);
        $path = $request->file('picture_article')->store('uploads', 'public');
        $result = ModelsArticle::create([
            'judul' => $request->title,
            'user_id' => Auth::user()->id,
            'content' => $request->content,
            'picture_article' => $path,
        ]);
        if ($result) {
            return redirect()->route('article.insert')->with('success', 'berhasil menyimpan ke database');
        } else {
            return redirect()->route('article.insert')->with('error', 'gagal menyimpan ke database');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = ModelsArticle::find($id);
        if (isset($article)) {
            return view('article.edit', compact('article'));
        } else {
            $articles = ModelsArticle::all();
            return view('article.index', compact('articles'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        dd('woy');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'picture_article' => 'nullable|file|mimes:jpg,jpeg,png|max:2048', // Optional, max 2MB
        ]);

        $article = ModelsArticle::findOrFail($id);
        $article->judul = $request->title;
        $article->content = $request->content;
        if ($article->picture_article) {
        }
        if ($request->hasFile('picture_article')) {
            Storage::delete('uploads/' . $article->picture_article);
            $path = $request->file('picture_article')->store('articles', 'public');
            $article->picture_article = $path;
        }
        $article->save();
        return redirect()->route('article.index')->with('success', 'Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $article = ModelsArticle::findOrFail($id);
        $article->delete();

        return redirect()->route('article.index')->with('success', 'Article deleted successfully');
    }
}
