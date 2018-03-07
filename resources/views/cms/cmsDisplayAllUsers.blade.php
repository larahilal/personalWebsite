@extends('cms/cmsLayout')

@section('content')

    <br>
    <br>

    @foreach( $allUsers as $user )

        <br>

        {{ $user->id . ' ' . $user->first_name . ' ' . $user->last_name . ' ' . $user->userGroup->name}}

        <br>

    @endforeach

@stop