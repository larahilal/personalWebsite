<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserGroup;
use App\Http\Controllers\BaseController;

class UserController extends BaseController
{

    public function editUserProfile($userId){

        $user = User::where('id', $userId)->first();

        $allUserGroups = UserGroup::all();

        return view('cms/cmsEditUserProfileForm', array('user'=> $user, 'allUserGroups'=> $allUserGroups));

    }


    public function updateUserProfile(Request $request){

        $user = User::where('id', $request->userId)->first();

        $user->first_name = $request->first_name;

        $user->last_name = $request->last_name;

        $user->email = $request->email;

        $user->user_group_id = $request->new_user_group_id;

        if($request->hasFile('image')) {

            $imagePath = request()->file('image')->store('images', 's3');

            $user->imagePath = $imagePath;

            $user->save();

            $thumbnailName = resizeImageToThumbnail($user->imagePath);

            $user->thumbnailPath = $thumbnailName;

            $user->save();

        }

        $user->save();

        return redirect()->route('allUsers');

    }








}