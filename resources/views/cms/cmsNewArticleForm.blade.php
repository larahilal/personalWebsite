@extends('cms/cmsLayout')

@section('content')



    <form action={{ route('saveNewArticle') }} method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        Title:
        <input type="text" name="title"></br></br>

        <input type="file" name="image"></br></br>

        <textarea name="body" rows="20" cols="100">Enter text here...</textarea></br></br>

        Submit:
        <input type="submit" value="Submit">

    </form>


@stop


