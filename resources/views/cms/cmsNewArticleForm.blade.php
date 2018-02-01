@extends('cms/cmsLayout')

@section('content')

    @if ($errors->any())
        {{ implode('', $errors->all('Please make sure all the fields are filled properly')) }}
    @endif


    <form action={{ route('saveNewArticle') }} method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        Title:
        @if('title')

            <input type="text" name="title" value="{{ old('title') }}"></br></br>

        @else

            <input type="text" name="title"></br></br>

        @endif

        <input type="file" name="image"></br></br>

        @if('body')

            <textarea name="body" rows="20" cols="100">{{ old('body') }}</textarea></br></br>

        @else

            <textarea name="body" rows="20" cols="100">Enter content...</textarea></br></br>

        @endif

        Submit:
        <input type="submit" value="Submit">

    </form>


@stop


