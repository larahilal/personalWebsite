@extends('cms/cmsLayout')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif


    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Searched Articles</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12">

            <table width="100%" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>

                <tbody>
                @foreach( $articles as $article )
                    <tr>
                        <td>{{ $article->title }} </td>
                        <td> <a href="{{ route('editArticle', array('articleId' => $article->id)) }}"> edit </a> </td>
                        <td> <a href="{{ route('deleteArticle', array('articleId' => $article->id)) }}"> delete </a> </td>
                    </tr>
                @endforeach
                </tbody>
            </table>


        </div>
    </div>

@stop