<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Article;
use App\Http\Controllers\ArticleController;
use App\Http\Resources\ArticleResource;

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

Route::get('/articles', function() {
    return ArticleResource::collection(Article::all());
});

Route::get('/article/{id}', function($id) {
    return new ArticleResource(Article::findOrFails($id));
});

Route::post('/articles', [ArticleController::class, 'store']);

Route::put('/article/{id}', [ArticleController::class, 'update']);

Route::post('/article/{id}', [ArticleController::class, 'destroy']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
