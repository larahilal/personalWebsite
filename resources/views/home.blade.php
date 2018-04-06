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

        @if($article->comments->count()<2 and $article->comments->count()>0)
        <h4>{{ $article->comments->count() }} Comment</h4>
        @else
            <h4>{{ $article->comments->count() }} Comments</h4>
        @endif
        <a href="{{ route('displayFullArticle', array('articleId' => $article->id)) }}">...read more</a>

        <hr />



    @endforeach

    {{ $allArticles->links() }}


@stop

