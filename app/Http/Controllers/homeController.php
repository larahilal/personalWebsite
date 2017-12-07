<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\article;

class homeController extends Controller
{

    public function displayHome(){

        $allArticles = article::paginate(2);

        foreach($allArticles as $article){

            $article->abbreviation = substr($article->body, 0, 100).'...';

        }

        return view ('home', array('allArticles' => $allArticles));

    }
}
