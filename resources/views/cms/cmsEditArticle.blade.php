@extends('cms/cmsLayout')

@section('content')



    <form action={{ route('updateArticle') }} method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        Title:
        <input type="text" name="title" value="{{ $article->title }}"></br></br>

        <input type="file" name="image"></br></br>

        <img src="{{ config('app.images_url') . $article->imagePath }}" style="width:50px;height:33px">

        <textarea name="body" rows="20" cols="100" >{{ $article->body }}</textarea></br></br>

        <input type="hidden" name="id" value="{{ $article->id }}">

        Submit:
        <input type="submit" value="Submit">

    </form>


@stop