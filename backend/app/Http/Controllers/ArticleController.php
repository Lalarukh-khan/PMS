<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Article::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Article::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Article::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Article::where('id', $id)->exists()){
            $article = Article::find($id);
            $article -> title = $request -> title;
            $article -> body = $request -> body;
            $article -> author = $request -> author;

            $article -> save();
            return response() -> json([
                "message" => "record updated successfully"
            ], 200);
        }else{
            return response()->json([
                "message" => "Article not found"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Article::where('id', $id)->exists()){
            $article = Article::find($id);
            $article -> delete();

            return response() -> json([
                "message" => "record deleted"
            ], 202);
        }else{
            return response()->json([
                "message" => "Article not found"
            ], 404);
        }
    }
}
