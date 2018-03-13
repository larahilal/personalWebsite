@extends('cms/cmsLayout')

@section('content')


    <form action={{ route('updateUserProfile') }} method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="userId" value="{{ $user->id }}">

        First Name:

        <input type="text" name="first_name" value="{{ $user->first_name }}"></br></br>

        Last Name:

        <input type="text" name="last_name" value="{{ $user->last_name }}"></br></br>

        Email:

        <input type="text" name="email" value="{{ $user->email }}"></br></br>

        Select new Group:
        <select name="new_user_group_id">

            @foreach($allUserGroups as $userGroup)

                @if($userGroup->id == $user->user_group_id)

                    <option value={{ $userGroup->id }} selected>{{ $userGroup->name }}</option>

                @else

                    <option value={{ $userGroup->id }}>{{ $userGroup->name }}</option>

                @endif

            @endforeach

        </select>

        </br></br>

        Image:<br>

        <img src="{{ config('app.images_url') . $user->imagePath }}" style="width:50px;height:33px">

        <input type="file" name="image"></br></br>

        Submit:
        <input type="submit" value="Submit">

    </form>


@stop