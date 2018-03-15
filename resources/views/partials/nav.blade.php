<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Home</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('searchForm') }}">Search</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('signUp') }}">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('loginForm') }}">Log in</a>
                    </li>
                @endguest

                @auth

                    @if(Auth::user()->user_group_id == '1')

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('displayUserProfile', array('userId'=>Auth::user()->id)) }}">View my profile</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cmsHome') }}">Go back to the CMS</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">LogOut</a>
                        </li>

                    @else

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('displayUserProfile', array('userId'=>Auth::user()->id)) }}">View my profile</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">LogOut</a>
                        </li>

                    @endif

                @endauth

            </ul>

        </div>
    </div>
</nav>