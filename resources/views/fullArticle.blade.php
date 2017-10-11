@extends('layout')

@section('backButton')

    <a href="{{ route('home') }}">Go Back</a>

@stop


@section('content')



    {{ $article->title }}

    <br>

    {{ $article->body }}





@stop