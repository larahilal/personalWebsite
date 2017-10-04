@extends('layout')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <br>
    <br>

    <a href="{{ route('cmsHome') }}"> My home </a>

    <br>
    <br>

    @foreach($allArticles as $article)

        {{ $article->title }}
        <a href="{{ route('editArticle', array('articleId' => $article->id)) }}"> edit </a>
        <a href="{{ route('deleteArticle', array('articleId' => $article->id)) }}"> delete </a>

        <br>

        {{ $article->body }}

        <br>
        <br>


    @endforeach



@stop