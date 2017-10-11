@extends('cms/cmsLayout')

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

        {{ $article->abbreviation }}
        <br>
        <a href="{{ route('displayFullArticle', array('articleId' => $article->id)) }}">...read more</a>

        {{--   {!! str_replace("\n", '<br>', $article->body) !!}

        --}}

           <br>
           <br>


       @endforeach



   @stop