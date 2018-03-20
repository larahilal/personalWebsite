<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form action={{ route('cmsSearch') }} method="POST" novalidate>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <input type="text" class="form-control" placeholder="Keyword" name="keyword">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search">
                                    <input type="submit" value="Submit">
                                    </i>
                                </button>
                            </span>
                        </form>
                </div>
                <!-- /input-group -->
            </li>

            <li>
                <a href="{{ route('newArticleForm') }}"><i class="fa fa-table fa-fw"></i>Create Article</a>
            </li>

            <li>
                <a href="{{ route('allArticles') }}"><i class="fa fa-table fa-fw"></i>View Articles</a>
            </li>

            <li>
                <a href="{{ route('allUsers') }}"><i class="fa fa-table fa-fw"></i>View Users</a>
            </li>

            <li>
                <a href="{{ route('logoForm') }}"><i class="fa fa-table fa-fw"></i>Add a logo</a>
            </li>

        </ul>
    </div>

</div>