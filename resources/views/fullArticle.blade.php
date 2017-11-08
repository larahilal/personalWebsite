@extends('layout')

@section('backButton')

    <a href="{{ route('home') }}">Go Back</a>

@stop


@section('content')



    {{ $article->title }}

    <br>

    {{ $article->body }}

    <form action={{ route('saveComment') }} method="POST">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <textarea rows="4" cols="50" name="comment">Enter text here...</textarea>

    </form>



@stop