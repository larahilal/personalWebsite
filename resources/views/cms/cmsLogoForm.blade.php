@extends('cms/cmsLayout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Logo</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>



    <div class="row">
        <div class="col-lg-12">

            <table width="100%" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>Add a logo</th>
                </tr>
                </thead>

                <tbody>
                <form action={{ route('saveLogo') }} method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <tr>
                        <td> <input type="file" name="image"> </td>
                    </tr>
                    <tr>
                        <td>Submit: <input type="submit" value="Submit"></td>
                    </tr>
                </form>
                </tbody>
            </table>

        </div>
    </div>

@stop
