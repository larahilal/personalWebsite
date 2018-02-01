@extends('cms/cmsLayout')

@section('content')



    <form action={{ route('updateArticle') }} method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        Title:

        @if(old('title'))

            <input type="text" name="title" value="{{ old('title') }}"></br></br>

        @else

            <input type="text" name="title" value="{{ $article->title }}"></br></br>

        @endif

        <input type="file" name="image"></br></br>

        <img src="{{ config('app.images_url') . $article->imagePath }}" style="width:50px;height:33px">

        @if(old('body'))

            <textarea name="body" rows="20" cols="100" >{{ old('body') }}</textarea></br></br>

        @else

            <textarea name="body" rows="20" cols="100" >{{ $article->body }}</textarea></br></br>

        @endif

        @if(old('id'))

            <input type="hidden" name="id" value="{{ old('id') }}">

        @else

            <input type="hidden" name="id" value="{{ $article->id }}">

        @endif

        Submit:
        <input type="submit" value="Submit">

    </form>


@stop