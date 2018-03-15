<!DOCTYPE html>
<html lang="en">

<!-- Head -->
@include('partials.head')

<!-- Page Header -->
@include('partials.header')

<!-- Navigation -->
@include('partials.nav')

<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-preview">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('partials.footer')

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="/js/clean-blog.min.js"></script>

</body>
</html>


