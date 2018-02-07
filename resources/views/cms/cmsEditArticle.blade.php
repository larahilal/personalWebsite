@extends('cms/cmsLayout')

@section('content')

    @if ($errors->any())
        {{ implode('', $errors->all('Please make sure all the fields are filled properly')) }}
    @endif



    <form action={{ route('updateArticle') }} method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">




        @if(old('title') or (old('body')) or (old('id')))

            Title:

            <input type="text" name="title" value="{{ old('title') }}"></br></br>

            <input type="file" name="image"></br></br>

            <img src="{{ config('app.images_url') . $article->imagePath }}" style="width:50px;height:33px">

            Body:

            <textarea name="body" rows="20" cols="100" >{{ old('body') }}</textarea></br></br>

            <input type="hidden" name="id" value="{{ old('id') }}">

            Submit:
            <input type="submit" value="Submit">

        @else

            <input type="text" name="title" value="{{ $article->title }}"></br></br>

            <input type="file" name="image"></br></br>

            <img src="{{ config('app.images_url') . $article->imagePath }}" style="width:50px;height:33px">

            <textarea name="body" rows="20" cols="100" >{{ $article->body }}</textarea></br></br>

            <input type="hidden" name="id" value="{{ $article->id }}">

            Submit:
            <input type="submit" value="Submit">

        @endif

    </form>


@stop