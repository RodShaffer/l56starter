<nav class="navbar navbar-light bg-light fixed-top navbar-expand-xl">

    <a class="navbar-brand" href="/">{{ config('site.domain') }}</a>

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#rsMainNavbar" aria-controls="rsMainNavbar" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="rsMainNavbar">
        <ul class="navbar-nav mr-auto">

            @if(Request::is('/'))
                <li class="nav-item active">
                    <a class="nav-link" href="/"><i class="fas fa-home"></i> Home<span
                                class="sr-only">(current)</span></a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="/"><i class="fas fa-home"></i> Home</a>
                </li>
@endif


@yield('help_drop_down')


        </ul>



        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">



        @yield('user_drop_down')



        </ul>
        <!-- End of Right Side Of Navbar -->



    </div>

</nav>