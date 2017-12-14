@extends('layout')

@section('backButton')

    <a href="{{ route('home') }}">Go Back</a>

@stop


@section('content')

    <img src="{{ config('app.images_url') . $article->imagePath }}" style="width:50px;height:33px">

    <br>

    {{ $article->title }}

    <br>

    {{ $article->body }}

    <form action={{ route('saveComment') }} method="POST">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <textarea rows="4" cols="50" name="comment">Comment here...</textarea>

    </form>



@stop