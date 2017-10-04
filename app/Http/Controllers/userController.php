<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

use App\User;

use App\article;

class userController extends Controller
{

    public function displayHome(){

        $allArticles = article::all();

        return view ('home', array('allArticles'=>$allArticles));

    }

    public function signUp(){

        return view('signUp');

    }


/*
 * add if email already exists returns sign up form with flash message asking to use a unique email.
 */


    public function register(Request $request){

        $user = new User();

        $user->email = $request->email;

        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->route('signedInHome')->with('status', 'Congrats! Comment Away!');


    }

    public function loginForm(){

        return view('loginForm');

    }


    public function login(Request $request){

        if (Auth::attempt(array('email' => $request->email, 'password' => $request->password))) {

            if($request->email == 'lara.mustardino@gmail.com'){

                return redirect()->route('cmsHome');

            } else {

                return redirect()->route('signedInHome')->with('status', 'You are logged in');

            }

        } else {

            echo "didnt work";

        }

    }

    public function signedInHome(){

        $allArticles = article::all();

        return view('signedInHome', array('allArticles'=>$allArticles));

    }



}