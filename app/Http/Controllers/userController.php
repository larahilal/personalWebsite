<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

use App\User;



class userController extends Controller
{

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

        Auth::login($user); //This line makes sure user gets logged in after registering.

        return redirect()->route('home')->with('status', 'Congrats! Comment Away!');


    }

    public function loginForm(){

        return view('loginForm');

    }


    public function login(Request $request){

        if (Auth::attempt(array('email' => $request->email, 'password' => $request->password))) {

            if($request->email == 'lara.mustardino@gmail.com'){

                return redirect()->route('cmsHome');

            } else {

                return redirect()->route('home')->with('status', 'You are logged in');

            }

        } else {

            echo "didnt work";

        }

    }

    public function logout(){

        Auth::logout();

        return redirect()->route('home');

    }


}
