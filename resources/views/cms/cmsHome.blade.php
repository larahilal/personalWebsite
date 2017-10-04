@extends('layout')

@section('content')

    <a href="{{ route('newArticleForm') }}">Create</a> a new article.

    <a href="{{ route('allArticles') }}">View</a> all articles.


@stop