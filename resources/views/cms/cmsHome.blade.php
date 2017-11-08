@extends('cms/cmsLayout')

@section('content')

    Click <a href="{{ route('searchForm') }}">here</a> to search for a specific article.

    <a href="{{ route('newArticleForm') }}">Create</a> a new article.

    <a href="{{ route('allArticles') }}">View</a> all articles.

    <a href="{{ route('logout') }}">Logout</a>.


@stop