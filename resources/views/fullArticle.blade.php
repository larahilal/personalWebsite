@extends('layout')

@section('backButton')

    <a href="{{ route('home') }}">Go Back</a>

@stop


@section('articles')

    <img src="{{ config('app.images_url') . $article->imagePath }}" style="width:50px;height:33px">


    {{ $article->title }}

    <br>

    {{ $article->created_at->format('d m Y') }}

    <br>

    {{ $article->body }}

    <br><br>

    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

    <br><br>

    <form action={{ route('saveComment') }} method="POST">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <textarea rows="4" cols="50" name="comment">Comment here...</textarea>

    </form>

@stop