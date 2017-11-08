@extends('layout')

@section('content')

    @foreach($articles as $article)

        {{ $article->title }}
        <br>
        {{ $article->abbreviation }}
        <br>
        <a href="{{ route('displayFullArticle', array('articleId' => $article->id)) }}">...read more</a>

        <br>
        <br>

    @endforeach




@stop