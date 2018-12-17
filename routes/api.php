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
//提交
Route::post('/1.0/articles', 'ArticleController@store');
//更新
Route::put('/1.0/articles/{article}', 'ArticleController@update');
//删除
Route::delete('/1.0/articles/{article}', 'ArticleController@delete');