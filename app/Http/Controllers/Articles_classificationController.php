<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles_classification;

class Articles_classificationController extends Controller
{
    //
    public function index()
    {
        return response()->json(Articles_classification::all(),200);
    }

    //
    public function show(Articles_classification $articles_classification)
    {
        return response()->json($articles_classification,200);
    }

    //
    public function store(Request $request)
    {
        //设置中国国区
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
    public function delete(Articles_classification $articles_classification)
    {
        $articles_classification->delete();
        return response()->json("删除成功", 204);
    }

    //
    public function class_sort($sort_name, $title)
    {
        //严格区分大小写,确定排序选择是否正确
        $arr_sort = ['desc', 'asc'];
        if (!in_array($sort_name, $arr_sort)) {
            return response()->json("请提供正确的排序选项", 404);
        }
        //严格区分大小写,确定字段选择是否正确
        $arr_title = ['serial', 'title', 'id'];
        if (!in_array($title, $arr_title)) {
            return response()->json("请提供正确的字段选项", 404);
        }
        $comment = Articles_classification::where('id', '>=', 1)->orderBy($title, $sort_name)->get();
        return response()->json($comment, 200);
    }
}
