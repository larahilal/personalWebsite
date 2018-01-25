<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\article;

use Auth;

class homeController extends Controller
{

    public function displayHome(){

        $user_id = Auth::user()->id;

        $allArticles = article::with('user')->paginate(2);

        foreach($allArticles as $article){

            $article->abbreviation = substr($article->body, 0, 100).'...';

        }

        return view ('home', array('allArticles' => $allArticles, 'userId'=>$user_id));

    }
}
