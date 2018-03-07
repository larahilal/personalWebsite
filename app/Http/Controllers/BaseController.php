<?php

namespace App\Http\Controllers;


use App\Models\Logo;
use View;

class BaseController extends Controller
{
    public function __construct()
    {
        //its just a dummy data object.


        $logo = Logo::first();

        // Sharing is caring
        View::share('logo', $logo);
    }
}
