<?php

use Illuminate\Http\Request;
use App\Article;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//文章

//获取全部
Route::get('/1.0/articles', 'ArticleController@index');
//获取带id单个
Route::get('/1.0/articles/{article}', 'ArticleController@show');
//新增
Route::post('/1.0/articles', 'ArticleController@store');
//更新
Route::put('/1.0/articles/{article}', 'ArticleController@update');
//删除
Route::delete('/1.0/articles/{article}', 'ArticleController@delete');
//审核
Route::get('/1.0/management_articles','ArticleController@show_delete');

//文章分类

//获取全部
Route::get('/1.0/articles_class','Articles_classificationController@index');
//获取带id单个
Route::get('/1.0/articles_class/{articles_classification}','Articles_classificationController@show');
//新增
Route::post('/1.0/articles_class','Articles_classificationController@store');
//修改(更新)
Route::put('/1.0/articles_class/{articles_classification}','Articles_classificationController@update');
//删除
Route::delete('/1.0/articles_class/{articles_classification}','Articles_classificationController@delete');
//排序
Route::get('/1.0/articles_class/{sort_name}/{title}','Articles_classificationController@class_sort');

//评论
//获取一个文章的全部评论

//新增
Route::post('/1.0/comment','CommentController@store');
//删除
Route::delete('/1.0/comment','CommentController@delete');