<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\comment;

use Auth;

class commentController extends Controller
{
    public function saveComment(request $request){

        if(Auth::user()) {

            $article_id = $request->articleId;

            $comment = new comment();

            $comment->body = $request->body;

            $comment->user_id = Auth::user()->id;

            $comment->article_id = $request->articleId;

            $comment->save();

            return redirect()->route('displayFullArticle', array('articleId' => $article_id));

        } else {

            $article_id = $$request->articleId;

            return redirect()->route('displayFullArticle', array('articleId' => $article_id))->with('status', 'Please sign in to comment an article');

        }

    }
}
