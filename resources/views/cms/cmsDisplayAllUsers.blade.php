@extends('cms/cmsLayout')

@section('content')

    <br>
    <br>

    @foreach( $allUsers as $user )

        <br>

        <a href="{{ route('cmsEditUserProfile', array('userId' => $user->id)) }}">Edit </a>

        {{ $user->id . ' ' . $user->first_name . ' ' . $user->last_name . ' ' . $user->userGroup->name}}

        <br>

    @endforeach

@stop