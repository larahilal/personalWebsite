<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use Illuminate\Support\Facades\Mail;

use App\Mail\UserSignedUp;

use Validator;




class UserController extends BaseController
{

    public function signUp(){

        return view('signUp');

    }


/*
 * add if email already exists returns sign up form with flash message asking to use a unique email.
 */


    public function register(Request $request){

        $messages = [
            'email.required' => 'Please enter a valid email',
            'email.unique' => 'This email has already been taken',
            'password.required' => 'Please enter a valid password',
        ];

        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users|max:255',
            'password' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->route('signUp')
                ->withErrors($validator);
        }


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

        $messages = [
            'email.required' => 'Please enter a valid email',
            'password.required' => 'Please enter a valid password',
        ];

        $validator = Validator::make($request->all(), [
            'email' => 'required|max:255',
            'password' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->route('loginForm')
                ->withErrors($validator);
        }


        if (Auth::attempt(array('email' => $request->email, 'password' => $request->password))) {

            if ($request->email == 'lara.mustardino@gmail.com') {

                return redirect()->route('cmsHome');

            } else {

                return redirect()->route('home')->with('status', 'You are logged in');

            }

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
