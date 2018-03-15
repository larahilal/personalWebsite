@extends('layout')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }} <br>
        </div>
    @endif


    @foreach($allArticles as $article)

        <a href="{{ route('displayFullArticle', array('articleId' => $article->id)) }}">
        <h2>{{ $article->title }}</h2>
        </a>

        <p class="post-meta">Posted by
            <a href="{{ route('displayAuthorPage', array('user_id' =>$article->user->id)) }}">
                {{ $article->user->first_name . ' ' . $article->user->last_name }}
            </a> on {{$article->created_at}}
        </p>

        <h4>{!! $article->abbreviation !!}</h4>

        <a href="{{ route('displayFullArticle', array('articleId' => $article->id)) }}">...read more</a>

        <hr />



    @endforeach

    {{ $allArticles->links() }}


@stop

