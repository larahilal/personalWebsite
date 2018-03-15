@extends('cms/cmsLayout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Users</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12">

            <table width="100%" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Edit</th>
                        <th>User ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>User Group</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $allUsers as $user )
                        <tr>
                            <td><a href="{{ route('cmsEditUserProfile', array('userId' => $user->id)) }}">Edit</a></td>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->userGroup->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

@stop