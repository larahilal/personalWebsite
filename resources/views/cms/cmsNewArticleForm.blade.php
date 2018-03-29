@extends('cms/cmsLayout')

@section('content')


    @if ($errors->any())
        {{ implode('', $errors->all('Please make sure all the fields are filled properly')) }}
    @endif

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create New Article</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12">

            <form action={{ route('saveNewArticle') }} method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">


                    @if('title')
                    <div class="form-group">
                        <label>Title:</label>
                        <input type="text" name="title" value="{{ old('title') }}" class="form-control"></br></br>
                    </div>

                    @else

                    <div class="form-group">
                        <label>Title:</label>
                        <input type="text" name="title" class="form-control"></br></br>
                    </div>

                    @endif

                    <div class="form-group">
                        <label>Image:</label>
                        <input type="file" name="image" class="form-control-file" >
                    </div>

                    </br></br>

                    @if('body')

                    <div class="form-group">
                        <label>Body:</label>
                        <textarea name="body" class="form-control" rows="20" cols="100" >{{ old('body') }}</textarea></br></br>
                    </div>

                    @else

                        <div class="form-group">
                            <label>Body:</label>
                            <textarea name="body" class="form-control" rows="20" cols="100" >Enter content...</textarea></br></br>
                        </div>

                    @endif

                    <br /><br />

                    <button type="submit" class="btn btn-primary">Submit</button>

            </form>


@stop






