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

}
