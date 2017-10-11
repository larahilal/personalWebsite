<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;

class homeController extends Controller
{
    public function cmsHome(){

        return view('cms/cmsHome');

    }
}
