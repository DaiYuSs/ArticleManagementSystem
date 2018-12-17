<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
    public function index()
    {
        return Article::all();
    }

    //
    public function show(Article $article)
    {
        return $article;
    }

    //
    public function store(Request $request)
    {
        $article = Article::create($request->all());
        $article['data'] = "新增成功";
        return response()->json($article, 201);
    }

    //
    public function update(Request $request, Article $article)
    {
        $article->update($request->all());

        return response()->json("更新成功", 200);
    }

    //
    public function delete(Article $article)
    {
        $article->delete();
        return response()->json("删除成功", 204);
    }
}