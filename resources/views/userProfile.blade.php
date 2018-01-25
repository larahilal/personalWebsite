@extends('layout')

@section('content')


    <form action={{ route('updateProfile') }} method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        First Name:

        <input type="text" name="first_name" value="{{ $user->first_name }}"></br></br>

        Last Name:

        <input type="text" name="last_name" value="{{ $user->last_name }}"></br></br>

        Email:

        <input type="text" name="email" value="{{ $user->email }}"></br></br>

        Password:

        <input type="password" name="password" value="{{ $user->password }}"></br></br>

        <input type="hidden" name="userId" value="{{ $user->id }}">

        Image:<br>

        <img src="{{ config('app.images_url') . $user->imagePath }}" style="width:50px;height:33px">

        <input type="file" name="image"></br></br>

        Submit:
        <input type="submit" value="Submit">

    </form>


@stop