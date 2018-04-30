<div class="container-fluid">

    <div class="row">

        <div class="col-12 cgadmin-site-header-container">

            <div class="card cgadmin-site-header">

                <div class="row justify-content-between">

                    <div class="col-xs-12 col-sm-7 col-md-6 col-lg-5 col-xl-4">

                        <div class="d-flex flex-nowrap">

                            <div>
                                <a href="/" target="_blank">
                                    <h1 class="cgadmin-company-name">{{ config('admin.title') }}</h1>
                                </a>
                            </div>

                        </div>

                        <div>
                            <div class="w-100">
                                <span class="cgadmin-slogan">{{ config('admin.slogan') }}</span>
                            </div>
                            <div class="w-100">
                                <img src="/images/admin/logo.png" alt="{{ config('admin.title') }} Logo Image">
                            </div>
                        </div>

                    </div>

                    <div class="d-none d-md-block cgadmin-header-info-container">

                        <div class="card">

                            <div class="card-body cgadmin-header-info-card-body">

                                {{-- Gravatar --}}
                                @if(Auth::user())
                                    <img src="https://www.gravatar.com/avatar/{{ Auth::user()->gravatar }}"
                                         class="cgadmin-header-info-gravatar" width="80px"
                                         alt="{{ Auth::user()->first_name }}'s Gravatar">
                                @else
                                    <img src="https://www.gravatar.com/avatar" class="cgadmin-header-info-gravatar"
                                         width="80px" alt="{{ config('admin.title') }} Default Gravatar">
                                @endif
                                {{-- END - Gravatar --}}

                                {{-- Date --}}
                                <span class="cgadmin-header-info-date">
                                    {{ date('l M j, Y') }}<br>
                                </span>
                                {{-- END - Date --}}

                                {{-- User logged in? --}}
                                @if(Auth::user())

                                    <div class="cgadmin-header-info-user-status">
                                        Logged in as:
                                        <a href="/admin/user/{{ Auth::user()->id }}" class="card-link cgadmin-header-info-links"> {{ Auth::user()->first_name }}</a>
                                    </div>

                                @endif
                                {{-- END - User logged in? --}}

                                {{-- Logout --}}
                                <div class="cgadmin-header-info-user-status">
                                    @if(Auth::user())
                                        <a href="{{ route('logout') }}" class="card-link" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt"></i> Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    @endif
                                </div>
                                {{-- END - Logout --}}

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>