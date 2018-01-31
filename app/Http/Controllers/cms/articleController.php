<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use App\article;
use Auth;
use App\Http\Controllers\BaseController;


class articleController extends BaseController
{

    public function newArticleForm()
    {

        return view('cms/cmsNewArticleForm');

    }

    public function saveNewArticle(Request $request){

        $imagePath = request()->file('image')->store('images', 's3');

        $article = new article();

        $article->title = $request->title;

        $article->imagePath = $imagePath;

        $article->body = $request->body;

        $article->user_id = Auth::user()->id;

        $article->thumbnailPath = 1;

        $article->save();

        $thumbnailName = $this->resizeImageToThumbnail($article->imagePath);

        $article->thumbnailPath = $thumbnailName;

        $article->save();

        return redirect()->route('cmsHome');

    }

    public function getAllArticles(){

        $allArticles = article::paginate(2);

        foreach($allArticles as $article){

            $article->abbreviation = substr($article->body, 0, 100).'...';

        }

        return view('cms/cmsAllArticles', array('allArticles'=> $allArticles));

    }

    public function editArticle($articleId){

        $article = article::where('id', $articleId)->first();

        return view('cms/cmsEditArticle', array('article'=>$article));

    }

    public function updateArticle(Request $request){

        $article = article::where('id', $request->id)->first();

        if($request->hasFile('image')) {

            $imagePath = request()->file('image')->store('images', 's3');

            $article->imagePath = $imagePath;

            $article->save();

            $thumbnailName = $this->resizeImageToThumbnail($article->imagePath);

            $article->thumbnailPath = $thumbnailName;

            $article->save();

        }

        $article->title = $request->title;

        $article->body = $request->body;

        $article->save();

        return redirect()->route('allArticles')->with('status', 'Article updated Successfully!');

    }

    public function deleteArticle($articleId){

        $article = article::where('id', $articleId)->first();

        $article->delete();

        return redirect()->route('cmsHome');

    }



}