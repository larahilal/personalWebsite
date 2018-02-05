@extends('layout')

@section('backButton')

    <a href="{{ route('home') }}">Go Back</a>

@stop

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }} <br><br>
        <a href="{{ route('loginForm') }}">Log in</a>
    </div>
@endif


@section('content')

    <img src="{{ config('app.images_url') . $article->imagePath }}" style="width:50px;height:33px"><br>


    <h1>{{ $article->title }}</h1>

    <br>

    Author:<br>

    <a href="{{ route('displayAuthorPage', array('user_id' =>$article->user->id)) }}">Author: {{ $article->user->first_name . ' ' . $article->user->last_name }} </a>

    <br>

    <img src="{{ config('app.images_url') . $article->User->imagePath }}" style="width:50px;height:33px"><br>

    <br>

    {{ $article->created_at->format('d m Y') }}

    <br>

    {!! nl2br($article->body) !!}

    <br><br>

    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

    <br><br>

    @foreach($comments as $comment)

        <img src="{{ config('app.images_url') . $comment->User->imagePath }}" style="width:50px;height:33px"><br>

        {{ $comment->User->first_name . ' ' . $comment->User->last_name}}<br>

        {{ $comment->body }} <br><br>

    @endforeach

    <br><br>

    <form action={{ route('saveComment') }} method="POST">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <textarea rows="4" cols="50" name="body">Comment here...</textarea>

        <input type="hidden" name="articleId" value="{{ $article->id }}">

        Submit:
        <input type="submit" value="Submit">

    </form>

@stop