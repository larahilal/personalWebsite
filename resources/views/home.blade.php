@extends('layout')

@section('content')


    @if (Auth::check('laravel_session'))


        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }} <br>
            </div>
        @endif

    @endif

    This is Lara's personal blog.<br><br>
    Click <a href="{{ route('searchForm') }}">here</a> to search for a specific article.<br>

    @guest
        <br><br>
        <a href="{{ route('signUp') }}">Sign Up</a> or <a href="{{ route('loginForm') }}">Log in</a> to leave comments
        <br><br>
    @endguest

    @auth

        @if(Auth::user()->email == 'lara.mustardino@gmail.com')

            @section('user')
                You are signed in as:
                <br>
                {{ Auth::user()->email }}
                <br>
                <a href="{{ route('displayUserProfile', array('userId'=>$userId)) }}">View profile</a><br>
                <a href="{{ route('cmsHome') }}">Go back to the CMS</a>

            @stop

        @else
            @section('user')
                You are signed in as:<br>
                {{ Auth::user()->email }}<br>
                <a href="{{ route('displayUserProfile', array('userId'=>$userId)) }}">View profile</a><br>
                <a href="{{ route('logout') }}">LogOut</a>
            @stop
        @endif

    @endauth


    @foreach($allArticles as $article)

        <h4>{{ $article->title }}</h4>

        <a href="{{ route('displayAuthorPage', array('user_id' =>$article->user->id)) }}">Author: {{ $article->user->email }} </a>

        <p>{!! $article->abbreviation !!}</p>

        <a href="{{ route('displayFullArticle', array('articleId' => $article->id)) }}">...read more</a>

        <hr />

    @endforeach

    {{ $allArticles->links() }}


@stop

