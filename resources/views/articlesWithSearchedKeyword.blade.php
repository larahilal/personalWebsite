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

        <p class="post-meta">Posted by
            <a href="{{ route('displayAuthorPage', array('user_id' =>$article->user->id)) }}">
                {{ $article->user->first_name . ' ' . $article->user->last_name }}
            </a> on {{$article->created_at}}
        </p>

        <br>
        <br>

    @endforeach




@stop