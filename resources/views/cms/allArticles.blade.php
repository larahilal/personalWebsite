@extends('cms/cmsLayout')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <a href="{{ route('cmsHome') }}"> My home </a>

    <table style="width:100%">

        <tr>
            <th> Title</th>
            <th> Edit</th>
            <th> Delete</th>
        </tr>

        @foreach($allArticles as $article)

            <tr>
                <td>{{ $article->title }} </td>
                <td> <a href="{{ route('editArticle', array('articleId' => $article->id)) }}"> edit </a> </td>
                <td> <a href="{{ route('deleteArticle', array('articleId' => $article->id)) }}"> delete </a> </td>
            </tr>
            {{--   {!! str_replace("\n", '<br>', $article->body) !!}

            --}}

           <br>

        @endforeach

    </table>


@stop