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

        $articles = article::all();

        $articlesWithKeywordInTitle = array();

        foreach($articles as $article){

            $pos = stripos($article->title, $searchedKeyword);

            if($pos !== false){

                $articlesWithKeywordInTitle[] = $article;

            }

        }

        if(empty($articlesWithKeywordInTitle)){

            return redirect()->route('searchForm')->with('status','Try a different keyword');
        }


        return view('articlesWithSearchedKeyword', array('articlesWithKeywordInTitle'=>$articlesWithKeywordInTitle));


    }

}
