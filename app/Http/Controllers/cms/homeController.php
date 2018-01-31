<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use App\logo;
use App\Http\Controllers\BaseController;

class homeController extends BaseController
{
    public function cmsHome(){

        return view('cms/cmsHome');

    }

    public function logoForm(){

        return view ('cms/cmsLogoForm');

    }

    public function saveLogo(Request $request)
    {

        $imagePath = request()->file('image')->store('images', 's3');

        $logo = new logo();

        $logo->imagePath = $imagePath;

        $logo->save();

        return redirect()->route('home');

    }
}
