<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use App\article;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class articleController extends Controller
{

    public function newArticleForm()
    {

        return view('cms/cmsNewArticleForm');

    }

    public function resizeImageToThumbnail($article){

        $imagePath = config('app.images_url') . $article->imagePath;



        $source = imagecreatefrompng($imagePath);
        list($width, $height) = getimagesize($imagePath);

        $newWidth = $width/5;
        $newHeight = $height/5;

        $destinationImage = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($destinationImage, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);


        // This line down doesn't work because imagepng returns a bool

        //echo public_path(); // /Users/larahilal/Development/personal-website/public

        imagepng($destinationImage, "thumbnail.png", 9);

        $pathToFile = public_path() . '/thumbnail.png';

        $thumbnailName = 'thumbnails/' . $article->imagePath;

        Storage::put($thumbnailName, file_get_contents($pathToFile));

        return $thumbnailName;
    }





    public function saveNewArticle(Request $request){

        $imagePath = request()->file('image')->store('images', 's3');

        $article = new article();

        $article->title = $request->title;

        $article->imagePath = $imagePath;

        $article->body = $request->body;

        $article->thumbnailPath = 1;

        $article->save();

        $thumbnailName = $this->resizeImageToThumbnail($article);

        $article->thumbnailPath = $thumbnailName;

        $article->save();

        return redirect()->route('cmsHome');

    }

    public function getAllArticles(){

        $allArticles = article::all();

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

        $article->title = $request->title;

        $article->body = $request->body;

        $article->save();

        return redirect()->route('allArticles')->with('status', 'Article updated Successfully!');

    }

    public function deleteArticle($articleId){

        $article = article::where('id', $articleId)->first();

        $article->delete();

    }



}