<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
    public function index()
    {
        return response()->json(Article::where('recycling', '<>', '1')->orderBy('id', 'asc')->get(), 200);
    }

    //
    public function show(Article $article)
    {
        return response()->json($article, 200);
    }

    //
    public function store(Request $request)
    {
        $arr = $request->all();
        $arr['recycling'] = 0;
        $article = Article::create($arr);
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
//        $article->delete();
        $article['recycling'] = 1;
        $article->save();
        return response()->json("删除成功", 204);
    }

    //
    public function show_delete()
    {
        return response(Article::where('recycling', '<>', '0')->orderBy('id', 'asc')->get(), 200);
    }
}