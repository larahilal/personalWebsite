@extends('layout')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <br><br>


    @foreach($allArticles as $article)

        {{ $article->title }}

        <br>

        {{ $article->abbreviation }}
        <br>
        <a href="{{ route('displayFullArticle', array('articleId' => $article->id)) }}">...read more</a>

        <br>
        <br>

    @endforeach




@stop