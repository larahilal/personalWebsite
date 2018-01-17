@extends('layout')

@section('articles')

    {{ $author->email }}

    <br>
    <br>
    
    @foreach( $author->articles as $article)


       <a href="{{ route('displayFullArticle', array('articleId' =>$article->id)) }}"> {{ $article->title }} </a>

       <br>

    @endforeach

@stop