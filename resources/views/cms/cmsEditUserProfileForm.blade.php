@extends('cms/cmsLayout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit User</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12">

            <form action={{ route('updateUserProfile') }} method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="userId" value="{{ $user->id }}">

                <div class="form-group">
                    <label>First Name:</label>
                    <input name="first_name" value="{{ $user->first_name }}" type="text" class="form-control">
                </div>

                <div class="form-group">
                    <label>Last Name:</label>
                    <input name="last_name" value="{{ $user->last_name }}" type="text" class="form-control">
                </div>

                <div class="form-group">
                    <label>Email:</label>
                    <input name="email" value="{{ $user->email }}" type="text" class="form-control">
                </div>

                <div class="form-group">
                    <label>Select new Group:</label>
                    <select name="new_user_group_id" class="form-control">
                        @foreach($allUserGroups as $userGroup)

                            @if($userGroup->id == $user->user_group_id)

                                <option value={{ $userGroup->id }} selected>{{ $userGroup->name }}</option>

                            @else

                                <option value={{ $userGroup->id }}>{{ $userGroup->name }}</option>

                            @endif

                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Profile Picture:</label>
                    <input type="file" class="form-control-file" name="image">
                </div>

                <img src="{{ config('app.images_url') . $user->imagePath }}" style="width:50px;height:33px">

                <br /><br />

                <button type="submit" class="btn btn-primary">Submit</button>

            </form>

        </div>
    </div>


@stop