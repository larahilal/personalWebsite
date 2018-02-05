@extends('layout')

@section('content')

    @foreach($articles as $article)

        <h1>{{ $article->title }}</h1>
        <br>
        {{ $article->abbreviation }}
        <br>
        <a href="{{ route('displayFullArticle', array('articleId' => $article->id)) }}">...read more</a>

        <br>
        <br>

    @endforeach




@stop