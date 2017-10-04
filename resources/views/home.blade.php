@extends('layout')

@section('content')

  Welcome to bla bla bla bla

  <br>
  <br>
  <a href="{{ route('signUp') }}">Sign Up</a> or <a href="{{ route('loginForm') }}">Log in</a> to leave comments
  <br>
  <br>

  @foreach($allArticles as $article)

    {{ $article->title }}
    <br>
    {{ $article->body }}

    <br>
    <br>

  @endforeach




@stop