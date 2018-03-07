<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\article;

use App\Repositories\CommentRepository;

class articleController extends BaseController
{


    public function displayFullArticle($articleId, CommentRepository $commentRepository){

        $article = article::where('id', $articleId)->first();

        $comments = $commentRepository->findComments($articleId);

       // $comments = article::find($articleId)->comments;

        return view('fullArticle', array('article'=>$article, 'comments'=>$comments));

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
