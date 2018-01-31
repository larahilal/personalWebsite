@extends('cms/cmsLayout')

@section('content')

    <a href="{{ route('logoForm') }}">Add a logo</a>.

    <a href="{{ route('searchForm') }}">Search</a> for a specific article.

    <a href="{{ route('newArticleForm') }}">Create</a> or

    <a href="{{ route('allArticles') }}">View</a> all articles.

    <a href="{{ route('logout') }}">Logout</a>.


@stop