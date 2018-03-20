<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;

use App\Repositories\CommentRepository;

class articleController extends BaseController
{


    public function displayFullArticle($articleId, CommentRepository $commentRepository){

        $article = Article::where('id', $articleId)->first();

        $previousArticle = Article::select('id')->where('id', '<', $articleId)->orderBy('id', 'DESC')->first();

        $nextArticle = Article::select('id')->where('id', '>' ,  $articleId)->orderBy('id', 'ASC')->first();

        $comments = $commentRepository->findComments($articleId);

       // $comments = article::find($articleId)->comments;

        return view('fullArticle', array(
            'article' => $article,
            'previousArticle' => $previousArticle,
            'nextArticle' => $nextArticle,
            'comments' => $comments
        ));

    }

    public function searchForm(){

        return view('SearchForm');

    }

    public function searchArticle(Request $request){

        $searchedKeyword = $request->keyword;

        $articles = Article::where('title', 'LIKE', '%' . $searchedKeyword . '%')->get();

        if(count($articles) == 0){

            return redirect()->route('searchForm')->with('status','Try a different keyword');

        } else {

            return view('articlesWithSearchedKeyword', array('articles'=>$articles));

        }

    }

}
