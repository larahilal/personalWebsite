@extends('layout')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <p>My profile</p>

                <form action={{ route('updateProfile') }} method="POST" enctype="multipart/form-data">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <input type="hidden" name="userId" value="{{ $user->id }}">

                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>First name</label>
                            <input type="text" class="form-control" placeholder="First Name" name="first_name" value="{{ $user->first_name }}">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Last name</label>
                            <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{ $user->last_name }}">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Email Address</label>
                            <input type="email" class="form-control" placeholder="Email Address" name="email" value="{{ $user->email }}">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password" value="{{ $user->password }}">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>

                    <img src="{{ config('app.images_url') . $user->imagePath }}" style="width:50px;height:33px">

                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Image</label>
                            <input type="file" class="form-control" name="image" value="{{ $user->last_name }}">
                            <p class="help-block text-danger"></p>
                        </div>
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














