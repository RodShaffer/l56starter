
<!--############################################# User Dropdown #####################################################-->

@guest

    @if(Request::path() == 'login')
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('login') }}">
                <i class="fas fa-sign-in-alt"></i> Login<span
                        class="sr-only">(current)</span>
            </a>
        </li>
    @else
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">
                <i class="fas fa-sign-in-alt"></i> Login
            </a>
        </li>
    @endif

    @if(Request::path() == 'register')
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('register') }}">
                <i class="fa fa-user-plus"></i> Register<span
                        class="sr-only">(current)</span>
            </a>
        </li>
    @else
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">
                <i class="fa fa-user-plus"></i> Register
            </a>
        </li>
    @endif

@else

    @if(Request::is('user*'))

        <li class="nav-item dropdown active">

            <a class="nav-link dropdown-toggle" href="#" id="userdropdown"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i> {{ Auth::user()->name }}<b
                        class="caret"></b><span
                        class="sr-only">(current)</span></a>

    @else

        <li class="nav-item dropdown">

            <a class="nav-link dropdown-toggle" href="#" id="userdropdown"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i> {{ Auth::user()->name }}<b
                        class="caret"></b></a>

            @endif

            <div class="dropdown-menu" aria-labelledby="userdropdown">

                @if(Request::path() == 'user/' . Auth::user()->id)
                    <a class="dropdown-item active" href="#">
                        <i class="far fa-user"></i> Profile<span
                                class="sr-only">(current)</span>
                    </a>
                @else
                    <a class="dropdown-item" href="{{ route('user.show', Auth::user()->id) }}">
                        <i class="far fa-user"></i> Profile
                    </a>
                @endif

                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                               document.getElementById('nav-logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form id="nav-logout-form" action="{{ route('logout') }}" method="POST"
                      style="display: none;">
                    {{ csrf_field() }}
                </form>

            </div>

        </li>

    @endguest

<!--############################################# End of User Dropdown ##############################################-->