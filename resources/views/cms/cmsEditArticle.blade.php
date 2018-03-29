@extends('cms/cmsLayout')

@section('content')

    @if ($errors->any())
        {{ implode('', $errors->all('Please make sure all the fields are filled properly')) }}
    @endif

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Article</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12">

            <form action={{ route('updateArticle') }} method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="{{ old('id') }}">

                @if(old('title') or (old('body')) or (old('id')))

                <div class="form-group">
                    <label>Title:</label>
                    <input type="text" name="title" value="{{ old('title') }}" type="text" class="form-control"></br></br>
                </div>

                <div class="form-group">
                    <label>Image:</label>
                    <input type="file" name="image" class="form-control-file" >
                </div>

                    <img src="{{ config('app.images_url') . $article->imagePath }}" style="width:50px;height:33px"></br></br>

                <div class="form-group">
                    <label>Body:</label>
                    <textarea name="body" class="form-control" rows="20" cols="100" >{{ old('body') }}</textarea></br></br>
                </div>

                <br /><br />

                <button type="submit" class="btn btn-primary">Submit</button>

               @else

                    <div class="form-group">
                        <label>Title:</label>
                        <input type="text" name="title" value="{{ $article->title }}" type="text" class="form-control"></br></br>
                    </div>

                    <div class="form-group">
                        <label>Image:</label>
                        <input type="file" name="image" class="form-control-file" >
                    </div>

                    <img src="{{ config('app.images_url') . $article->imagePath }}" style="width:50px;height:33px"></br></br>

                    <div class="form-group">
                        <label>Body:</label>
                        <textarea name="body" class="form-control" rows="20" cols="100" >{{ $article->body }}</textarea></br></br>
                    </div>

                    <br /><br />

                    <button type="submit" class="btn btn-primary">Submit</button>

               @endif

            </form>

        </div>
    </div>


@stop










