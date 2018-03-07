<?php

namespace App\Repositories;

use App\comment;

use App\article;
use Auth;


class CommentRepository
{

    public function findComments($articleId){

        $comments = article::find($articleId)->comments;

        return $comments;

    }

    public function insert($articleId, $body){

        $comment = new comment();

        $comment->body = $body;

        $comment->user_id = Auth::User()->id;

        $comment->article_id = $articleId;

        $comment->save();


    }







}