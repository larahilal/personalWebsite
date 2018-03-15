@extends('layout')


@section('content')

    <img src="{{ config('app.images_url') . $author->imagePath }}" style="width:50px;height:33px"><br>

    {{ $author->first_name . ' ' . $author->last_name }}

    {{ $author->email }}

    <br>
    <br>

    @foreach( $author->articles as $article)


       <a href="{{ route('displayFullArticle', array('articleId' =>$article->id)) }}"> <h4>{{ $article->title }} </h4></a>

       <br>

    @endforeach

@stop