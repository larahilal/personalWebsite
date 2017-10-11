<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\article;

class articleController extends Controller
{

    public function newArticleForm(){

        return view('cms/cmsNewArticleForm');

    }

    public function displayFullArticle($articleId){

        $article = article::where('id', $articleId)->first();

        return view('fullArticle', array('article'=>$article));

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

        foreach($allArticles as $article){

            $article->abbreviation = substr($article->body, 0, 100).'...';

        }

        return view('cms/cmsAllArticles', array('allArticles'=> $allArticles));

    }

    public function editArticle($articleId){

        $article = article::where('id', $articleId)->first();

        return view('cms/cmsEditArticle', array('article'=>$article));

    }

    public function updateArticle(Request $request){

        $article = article::where('id', $request->id)->first();

        $article->title = $request->title;

        $article->body = $request->body;

        $article->save();

        return redirect()->route('allArticles')->with('status', 'Article updated Successfully!');

    }

    public function deleteArticle($articleId){

        $article = article::where('id', $articleId)->first();

        $article->delete();




    }

}
