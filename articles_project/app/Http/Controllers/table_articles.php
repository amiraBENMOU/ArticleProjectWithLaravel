<?php

namespace App\Http\Controllers;
use app\Models\table_articles;
use Illuminate\Http\Request;

class articles extends Controller
{
    public function index()
    {
        $articles = \App\Models\table_articles::all();
        return view('table_articles.index', compact('articles'));
    }
    public function create()
    {
        return view('table_articles.create');
    }
    public function store(Request $request)
    {
        $request -> validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        $article = new \App\Models\table_articles;
        $article->title = $request->title;
        $article->content = $request->content;
        $article->save();
        return redirect()->route('table_articles.index');
    }
    public function show(Table_articles $article)   {
        return view('table_articles.show', compact('article'));
    }
    public function edit(Table_articles $article)   {
        return view('table_articles.edit', compact('article'));
    }
    public function update(Request $request, Table_articles $article)   {
        $request -> validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        $article->title = $request->title;
        $article->content = $request->content;
        $article->save();
        return redirect()->route('table_articles.index');
    }
    public function destroy(Table_articles $article)   {
        $article->delete();
        return redirect()->route('table_articles.index');
    }
        
}
