@extends('layout')


@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif



    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <p>Enter a keyword from the title of the article you are looking for:</p>

                <form action={{ route('searchArticle') }} method="POST" novalidate>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Keyword</label>
                            <input type="keyword" class="form-control" placeholder="Keyword" name="keyword" required data-validation-required-message="Please enter your email address.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>

                    <br>

                    <div id="success"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="sendMessageButton">Look up</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


@stop