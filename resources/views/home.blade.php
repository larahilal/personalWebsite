@extends('layout')

@section('content')

    This is Lara's personal blog.

    @guest

        <br>
        <br>
        <a href="{{ route('signUp') }}">Sign Up</a> or <a href="{{ route('loginForm') }}">Log in</a> to leave comments
        <br>
        <br>

        @foreach($allArticles as $article)

            {{ $article->title }}
            <br>
            {{ $article->abbreviation }}
            <br>
            <a href="{{ route('displayFullArticle', array('articleId' => $article->id)) }}">...read more</a>

            <br>
            <br>

        @endforeach

    @endguest

    @auth

        @if(Auth::user()->email == 'lara.mustardino@gmail.com')

@section('user')

        You are signed in as:

        <br>

        {{ Auth::user()->email }}

@stop

        <br>

        <a href="{{ route('cmsHome') }}">Go back to the CMS</a>

        <br>
        <br>

        @foreach($allArticles as $article)

            {{ $article->title }}
            <br>
            {{ $article->body }}

            <br>
            <br>

        @endforeach

        @else

            @foreach($allArticles as $article)

                {{ $article->title }}
                <br>
                {{ $article->body }}

                <br>
                <br>

            @endforeach

        @endif

    @endauth


@stop