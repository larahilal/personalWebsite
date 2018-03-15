<header class="masthead" style="background-image: url('/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">

                    @if($logo)

                        <img src="{{ config('app.images_url') . $logo->imagePath }}" style="width:50px;height:33px">

                    @endif

                    <h1>Lara's blog</h1>
                    <span class="subheading">A Blog about code</span>
                </div>
            </div>
        </div>
    </div>
</header>