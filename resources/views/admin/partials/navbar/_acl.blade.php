
<!--############################################## ACL Dropdown #####################################################-->

@if(Auth::user() && Auth::user()->hasRole('admin'))


    @if(Request::is('admin/user*') || Request::is('admin/role*') || Request::is('admin/permission*'))

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="aclDropdown" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false"><i class="fas fa-lock"></i> ACL</a>
            <div class="dropdown-menu" aria-labelledby="aclDropdown">

    @else

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="aclDropdown" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false"><i class="fas fa-lock"></i> ACL</a>
            <div class="dropdown-menu" aria-labelledby="aclDropdown">

            @endif


                <span class="dropdown-header"><i class="fas fa-users"></i> Users</span>


                {{-- All Users --}}
                @if(Request::is('admin/user'))

                    <a class="dropdown-item active" href="{{ route('admin.user.index') }}">
                        <i class="fas fa-users"></i> All Users</a>

                @else

                    <a class="dropdown-item" href="{{ route('admin.user.index') }}">
                        <i class="fas fa-users"></i> All Users</a>

                @endif
                {{-- End All Users --}}


                {{-- Create User --}}
                @if(Request::is('admin/user/create'))

                    <a class="dropdown-item active" href="{{ route('admin.user.create') }}"><i
                                class="fas fa-user-plus"></i> Create User</a>

                @else

                    <a class="dropdown-item" href="{{ route('admin.user.create') }}"><i
                                class="fas fa-user-plus"></i> Create User</a>

                @endif
                {{-- End Create User --}}


                <div class="dropdown-divider"></div>
                <span class="dropdown-header"><i class="fab fa-black-tie"></i> Roles</span>


                {{-- All Roles --}}
                @if(Request::is('admin/role'))

                    <a class="dropdown-item active" href="{{ route('admin.role.index') }}">
                        <i class="fab fa-black-tie"></i> All Roles</a>

                @else

                    <a class="dropdown-item" href="{{ route('admin.role.index') }}">
                        <i class="fab fa-black-tie"></i> All Roles</a>

                @endif
                {{-- End All Roles --}}


                {{-- Create Role --}}
                @if(Request::is('admin/role/create'))

                    <a class="dropdown-item active" href="{{ route('admin.role.create') }}"><i class="fab fa-black-tie"></i>
                        Create Role</a>

                @else

                    <a class="dropdown-item" href="{{ route('admin.role.create') }}"><i class="fab fa-black-tie"></i>
                        Create Role</a>

                @endif
                {{-- End Create Role --}}


                <div class="dropdown-divider"></div>
                <span class="dropdown-header"><i class="fas fa-key"></i> Permissions</span>


                {{-- All Permissions --}}
                @if(Request::is('admin/permission'))

                    <a class="dropdown-item active" href="{{ route('admin.permission.index') }}">
                        <i class="fas fa-key"></i> All Permissions</a>

                @else

                    <a class="dropdown-item" href="{{ route('admin.permission.index') }}">
                        <i class="fas fa-key"></i> All Permissions</a>

                @endif
                {{-- End All Permissions --}}


                {{-- Create Permission --}}
                @if(Request::is('admin/permission/create'))

                    <a class="dropdown-item active" href="{{ route('admin.permission.create') }}">
                        <i class="fas fa-key"></i> Create Permission</a>

                @else

                    <a class="dropdown-item" href="{{ route('admin.permission.create') }}">
                        <i class="fas fa-key"></i> Create Permission</a>

                @endif
                {{-- End Create Permission --}}


            </div>
        </li>

@endif

<!--############################################## End of ACL Dropdown ##############################################-->
