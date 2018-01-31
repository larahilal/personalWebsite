<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\logo;
use View;

class BaseController extends Controller
{
    public function __construct()
    {
        //its just a dummy data object.


        $logo = logo::first();

        // Sharing is caring
        View::share('logo', $logo);
    }
}
