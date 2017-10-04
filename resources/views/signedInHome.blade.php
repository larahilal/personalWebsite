@extends('layout')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <br><br>


    @foreach($allArticles as $article)

        {{ $article->title }}

        <br>

        {{ $article->body }}

        <br>
        <br>

    @endforeach




@stop