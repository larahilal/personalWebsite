<!DOCTYPE html>
<html>

<!-- Head -->
@include('cms.partials.head')

<body>

    <div id="wrapper">
        <!-- Navigation -->
        @include('cms.partials.nav')

        <div id="page-wrapper">

            @yield('content')

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="/cms-frontend/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/cms-frontend/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/cms-frontend/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="/cms-frontend/vendor/raphael/raphael.min.js"></script>
    <script src="/cms-frontend/vendor/morrisjs/morris.min.js"></script>
    <script src="/cms-frontend/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/cms-frontend/dist/js/sb-admin-2.js"></script>

</body>
</html>


