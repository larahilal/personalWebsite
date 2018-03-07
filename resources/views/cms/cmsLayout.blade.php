<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lara's Blog</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <div class="header" id="myHeader">

        @if($logo)

            <img src="{{ config('app.images_url') . $logo->imagePath }}" style="width:50px;height:33px">
        @endif

        <h2>Lara's blog CMS</h2>

    </div>

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: left;
        }

        .title {
            font-size: 54px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .pagination li {
            display: inline;
        }

        .header {
            padding: 10px 16px;
            background: #555;
            color: #f1f1f1;
        }


    </style>
</head>
<body>

<div class="top-right">

    @yield('user')

</div>

<div class="position-ref full-height">




    <div class="content">
        <div class="title m-b-md">

        </div>

        <div class="links">

            <a href="{{ route('logoForm') }}">Add a logo</a>

            <a href="{{ route('searchForm') }}">Search</a>

            <a href="{{ route('newArticleForm') }}">Create</a>

            <a href="{{ route('allArticles') }}">View</a>

            <a href="{{ route('allUsers') }}">View all users</a>

            <a href="{{ route('logout') }}">Logout</a>

            @yield('content')


        </div>
    </div>
</div>
</body>
</html>


