<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\User;
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

        $logo = new Logo();

        $logo->imagePath = $imagePath;

        $logo->save();

        return redirect()->route('home');

    }

    public function getAllUsers(){

        $allUsers = User::where('user_group_id', 2)->get();

        return view('cms/cmsDisplayAllUsers', array('allUsers'=> $allUsers));

    }
}
