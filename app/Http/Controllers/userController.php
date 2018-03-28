<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use Illuminate\Support\Facades\Mail;

use App\Mail\UserSignedUp;




class userController extends BaseController
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

        $user->user_group_id = '2';

        $user->password = Hash::make($request->password);

        $user->save();

        Mail::to($user)->send(new UserSignedUp($user));

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

    public function displayAuthorPage($userId){

        $author = User::where('id', $userId)->with('articles')->first();

        return view('authorPage', array('author' => $author));
    }

    public function displayUserProfile(){

        if (Auth::check()) {

            $user = User::where('id', Auth::user()->id)->first();

            return view('userProfile', array('user' => $user));

        }else{

            return redirect()->route('loginForm');

        }

    }

    public function updateProfile(Request $request){

        $user = User::where('id', $request->userId)->first();

        $user->first_name = $request->first_name;

        $user->last_name = $request->last_name;

        $user->email = $request->email;

        $user->password = $request->password;

            if($request->hasFile('image')) {

                $imagePath = request()->file('image')->store('images', 's3');

                $user->imagePath = $imagePath;

                $user->save();

                $thumbnailName = resizeImageToThumbnail($user->imagePath);

                $user->thumbnailPath = $thumbnailName;

                $user->save();

            }

        $user->save();

        return redirect()->route('home');

    }


}
