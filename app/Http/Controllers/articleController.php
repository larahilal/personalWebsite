<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\article;

class articleController extends Controller
{

    public function newArticleForm(){

        return view('newArticleForm');

    }

    public function saveNewArticle(Request $request){

        $article = new article();

        $article->title = $request->title;

        $article->body = $request->body;

        $article->save();

        return redirect()->route('cmsHome');

    }

    public function getAllArticles(){

        $allArticles = article::all();

        return view('allArticles', array('allArticles'=> $allArticles));

    }

    public function editArticle($articleId){

        $article = article::where('id', $articleId)->first();

        return view('editArticle', array('article'=>$article));

    }

    public function updateArticle(Request $request){

        $article = article::where('id', $request->id)->first();

        $article->title = $request->title;

        $article->body = $request->body;

        $article->save();

        return redirect()->route('allArticles')->with('status', 'Article updated Successfully!');

    }

    public function deleteArticle(Request $request){

        $article = article::where('id', $request->id)->first();

        $article->delete();


    }

}
