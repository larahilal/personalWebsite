@extends('cms/cmsLayout')

@section('content')

    <a href="{{ route('logoForm') }}">Add a logo</a>

    <a href="{{ route('searchForm') }}">Search</a>

    <a href="{{ route('newArticleForm') }}">Create</a>

    <a href="{{ route('allArticles') }}">View</a>

    <a href="{{ route('logout') }}">Logout</a>


@stop