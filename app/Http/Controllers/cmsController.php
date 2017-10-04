<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cmsController extends Controller
{
    public function cmsHome(){

        return view('cms/cmsHome');

    }
}
