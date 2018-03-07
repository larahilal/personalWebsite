<?php

namespace App\Http\Controllers;

use App\Repositories\CommentRepository;
use Illuminate\Http\Request;
use Auth;

class commentController extends BaseController
{
    public function saveComment(Request $request, CommentRepository $commentRepository){

        if(Auth::User()) {

            $article_id = $request->articleId;

            $commentRepository->insert($article_id, $request->body);

            return redirect()->route('displayFullArticle', array('articleId' => $article_id));

        } else {

            $article_id = $request->articleId;

            return redirect()->route('displayFullArticle', array('articleId' => $article_id))->with('status', 'Please sign in to comment an article');

        }

    }
}
