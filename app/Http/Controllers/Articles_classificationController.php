<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles_classification;

class Articles_classificationController extends Controller
{
    //
    public function index()
    {
        return Articles_classification::all();
    }

    //
    public function show(Articles_classification $articles_classification)
    {
        return $articles_classification;
    }

    //
    public function store(Request $request)
    {
        date_default_timezone_set('PRC');

        $articles_classification = $request->all();
        $articles_classification['create_time'] = now();

        $articles_classification = Articles_classification::create($articles_classification);
        $articles_classification['data'] = "新增成功";

        return response()->json($articles_classification, 201);
    }

    //
    public function update(Request $request, Articles_classification $articles_classification)
    {
        $articles_classification->update($request->all());

        return response()->json("更新成功", 200);
    }

    //
    public function delete( Articles_classification $articles_classification)
    {
        $articles_classification->delete();
        return response()->json("删除成功", 204);
    }
}
