@extends('layout')

@section('backButton')

    <a href="{{ route('home') }}">Go Back</a>

@stop

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <br>
    <br>

    Enter a keyword from the title of the article you are looking for:

    <br>
    <br>

    <form action={{ route('searchArticle') }} method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">


        Keyword:

        <input type="keyword" name="keyword"></br></br>

        Submit:
        <input type="submit" value="Submit">

    </form>


@stop