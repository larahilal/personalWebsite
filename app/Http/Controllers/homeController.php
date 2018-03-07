<?php

namespace App\Http\Controllers;

use App\Models\Article;

use Auth;

class homeController extends BaseController
{
    public function displayHome(){

        $allArticles = Article::with('user')->orderBy('created_at', 'desc')->paginate(2);

        foreach($allArticles as $article){

            $article->abbreviation = substr($article->body, 0, 100).'...';

        }

        return view ('home', array('allArticles' => $allArticles));

    }

}
