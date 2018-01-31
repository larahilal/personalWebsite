@extends('cms/cmsLayout')

@section('content')



    <form action={{ route('saveLogo') }} method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        Add a logo:<br>

        <input type="file" name="image"></br></br>

        Submit:
        <input type="submit" value="Submit">

    </form>


@stop


