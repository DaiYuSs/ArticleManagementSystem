<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    //
    public function store(Request $request)
    {
        date_default_timezone_set('PRC');
        $comment = $request->all();
        $comment['audit'] = 1;
        $comment['create_time'] = now();

        $comment = Comment::create($comment);
        $comment['data'] = '新增成功';

        return response()->json($comment, 201);
    }

    //
    public function delete(Request $request)
    {
        $comment = Comment::find($request->all()['id']);
        $rs=null;
        if ($comment){
            $rs=$comment->delete();
        }
        return $rs?response()->json("删除成功",204):response()->json("删除失败",404);
    }
}
