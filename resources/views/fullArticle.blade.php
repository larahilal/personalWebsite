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

    <img src="{{ config('app.images_url') . $article->imagePath }}" style="width:50px;height:33px">


    {{ $article->title }}

    <br>

    {{ $article->created_at->format('d m Y') }}

    <br>

    {{ $article->body }}

    <br><br>

    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

    <br><br>

    @foreach($comments as $comment)

        {{ $comment->user->first_name . ' ' . $comment->user->last_name}}<br>

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