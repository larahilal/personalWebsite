@extends('layout')

@section('content')



    <form action={{ route('updateArticle') }} method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        Title:
        <input type="text" name="title" value="{{ $article->title }}"></br></br>

        <textarea name="body" rows="20" cols="100" >{{ $article->body }}</textarea></br></br>

        <input type="hidden" name="id" value="{{ $article->id }}">

        Submit:
        <input type="submit" value="Submit">

    </form>


@stop