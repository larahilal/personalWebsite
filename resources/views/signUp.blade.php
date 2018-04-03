@extends('layout')

@section('content')






    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">

                @if(count($errors))
                    {{ ' ' }}
                @else
                <p>Please sign up</p>
                @endif

                <form action={{ route('register') }} method="POST" novalidate>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Email Address</label>
                            <input type="email" class="form-control" placeholder="Email Address" name="email" required data-validation-required-message="Please enter your email address.">
                            <p class="help-block text-danger"></p>
                        </div>
                        @if ($errors->has('email'))
                            <div class="error">{{ $errors->first('email') }}</div>
                        @endif
                    </div>

                    <div class="control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password" required data-validation-required-message="Please enter your password.">
                            <p class="help-block text-danger"></p>
                        </div>
                        @if ($errors->has('password'))
                            <div class="error">{{ $errors->first('password') }}</div>
                        @endif
                    </div>

                    <br>

                    <div id="success"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="sendMessageButton">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <hr>

@stop





