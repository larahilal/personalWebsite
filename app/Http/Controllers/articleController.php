<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\article;

class articleController extends Controller
{


    public function displayFullArticle($articleId){

        $article = article::where('id', $articleId)->first();

        return view('fullArticle', array('article'=>$article));

    }

    public function searchForm(){

        return view('searchForm');

    }

    public function searchArticle(Request $request){

        $searchedKeyword = $request->keyword;

        $articles = article::where('title', 'LIKE', '%' . $searchedKeyword . '%')->get();

        if(count($articles) == 0){

            return redirect()->route('searchForm')->with('status','Try a different keyword');

        } else {

            return view('articlesWithSearchedKeyword', array('articles'=>$articles));

        }

    }

}
