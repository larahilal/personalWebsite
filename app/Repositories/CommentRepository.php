<?php

namespace App\Repositories;

use App\Models\Comment;

use App\Models\Article;
use Auth;


class CommentRepository
{

    public function findComments($articleId){

        $comments = Article::find($articleId)->comments;

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