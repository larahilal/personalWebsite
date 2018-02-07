<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use App\article;
use Auth;
use App\Http\Controllers\BaseController;
use Validator;


class articleController extends BaseController
{

    public function newArticleForm()
    {

        return view('cms/cmsNewArticleForm');

    }

    public function saveNewArticle(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'body' => 'required',
            'image'=> 'required',

        ]);

        if ($validator->fails()) {
            return redirect()->route('newArticleForm')
                ->withErrors($validator)
                ->withInput();
        }

        $imagePath = request()->file('image')->store('images', 's3');

        $article = new article();

        $article->title = $request->title;

        $article->imagePath = $imagePath;

        $article->body = $request->body;

        $article->user_id = Auth::User()->id;

        $article->thumbnailPath = 1;

        $article->save();

        $thumbnailName = resizeImageToThumbnail($article->imagePath);

        $article->thumbnailPath = $thumbnailName;

        $article->save();

        return redirect()->route('cmsHome');

    }

    public function getAllArticles(){

        $allArticles = article::orderBy('created_at', 'desc')->paginate(2);

        foreach($allArticles as $article){

            $article->abbreviation = substr($article->body, 0, 100).'...';

        }

        return view('cms/cmsAllArticles', array('allArticles'=> $allArticles));

    }

    public function editArticle($articleId){

        $article = article::where('id', $articleId)->first();

        if(Auth::check() and (Auth::check()==$article->user_id)) {

            return view('cms/cmsEditArticle', array('article' => $article));

        }elseif(Auth::check()and (Auth::check()!=$article->user_id)){

            return redirect()->route('home')->with('status','You can only update articles you wrote');

        }else{

            return redirect()->route('loginForm')->with('status', 'You need to be logged in to edit content');

        }

    }

    public function updateArticle(Request $request){

        $article = article::where('id', $request->id)->first();

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'body' => 'required',
            'image'=> 'required',

        ]);

        if ($validator->fails()) {
            return redirect()->route('editArticle', array('article'=> $article))
                ->withErrors($validator)
                ->withInput();
        }

        if($request->hasFile('image')) {

            $imagePath = request()->file('image')->store('images', 's3');

            $article->imagePath = $imagePath;

            $article->save();

            $thumbnailName = resizeImageToThumbnail($article->imagePath);

            $article->thumbnailPath = $thumbnailName;

            $article->save();

        }

        $article->title = $request->title;

        $article->body = $request->body;

        $article->user_id = Auth::User()->id;

        $article->save();

        return redirect()->route('allArticles')->with('status', 'Article updated Successfully!');

    }

    public function deleteArticle($articleId){

        $article = article::where('id', $articleId)->first();

        $article->delete();

        return redirect()->route('cmsHome');

    }



}