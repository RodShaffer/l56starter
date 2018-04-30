@extends('admin.layouts.app')

@section('meta')
    <meta name="description" content="{{ config('admin.title') }} Admin index of all roles.">
@endsection

@section('title')
    <title>{{ config('admin.title') }} | Admin - All Roles</title>
@endsection

@section('header')
    @include('admin.partials._header')
@endsection

@section('navbar')
    @include('admin.partials._navbar')
@endsection

@section('content')

    <div class="container-fluid">

        <div class="row mt-3">

            <div class="col-12">

                <div class="card">

                    <div class="card-header">Admin - All roles</div>

                    <div class="card-body divTableCardBody">

                        @include('flash::message')

                        @if(isset($roles) && count($roles) > 0)

                            <form class="form-horizontal" role="form" method="POST"
                                  action="{{ route('admin.role.destroy.mass') }}">


                                {{ csrf_field() }}

                                <div class="divTable">

                                    <div class="divTableBody">

                                        <div class="divTableRow">
                                            <div class="divTableHeading">Select</div>
                                            <div class="divTableHeading">ID</div>
                                            <div class="divTableHeading">Role Name</div>
                                            <div class="divTableHeading">Users</div>
                                            <div class="divTableHeading">Permissions</div>
                                            <div class="divTableHeading">Created</div>
                                            <div class="divTableHeading">Modify</div>
                                        </div>

                                        @for($i = 0; $i < count($roles); $i++)

                                            @if($i % 2 == 1)

                                                <div class="divTableRow divTableRowStriped">

                                                    @else

                                                        <div class="divTableRow">

                                                            @endif

                                                            <div class="divTableCellCheckbox">

                                                                @if(auth()->user()->can('role_destroy'))

                                                                    @if($roles[$i]->name != 'admin')

                                                                        <div class="form-check">
                                                                            <input class="form-check-input position-static"
                                                                                   type="checkbox"
                                                                                   name="selected_roles[]"
                                                                                   id="selected_roles"
                                                                                   value="{{ $roles[$i]->id }}"
                                                                                   aria-label="The id of the role to be deleted">
                                                                        </div>

                                                                    @else

                                                                        <div class="form-check">
                                                                            <input class="form-check-input position-static"
                                                                                   type="checkbox"
                                                                                   name="selected_roles[]"
                                                                                   id="selected_roles"
                                                                                   value="{{ $roles[$i]->id }}"
                                                                                   aria-label="The id of the role to be deleted" disabled>
                                                                        </div>

                                                                    @endif

                                                                @endif

                                                                        </div>

                                                                        <div class="divTableCell">
                                                                            <p>
                                                                                {{ $roles[$i]->id }}
                                                                            </p>
                                                                        </div>

                                                                        <div class="divTableCell">
                                                                            <p>
                                                                                {{ $roles[$i]->name }}
                                                                            </p>
                                                                        </div>

                                                                        <div class="divTableCell">
                                                                            @if(count($roles[$i]->users) > 0)

                                                                                <p>
                                                                                    <a href="{{ route('admin.user.search.role', $roles[$i]) }}">
                                                                                        {{ count($roles[$i]->users) }}
                                                                                        users assigned to
                                                                                        role</a>
                                                                                </p>

                                                                            @else

                                                                                <p>
                                                                                    {{ count($roles[$i]->users) }} users
                                                                                    assigned to
                                                                                    role
                                                                                </p>

                                                                            @endif
                                                                        </div>

                                                                        <div class="divTableCell">

                                                                            @if(count($roles[$i]->permissions) > 0)

                                                                                <p>
                                                                                    <a href="{{ route('admin.permission.search.role', $roles[$i]) }}">
                                                                                        {{ count($roles[$i]->permissions) }}
                                                                                        permissions
                                                                                        assigned to role</a>
                                                                                </p>

                                                                            @else

                                                                                <p>
                                                                                    {{ count($roles[$i]->permissions) }}
                                                                                    permissions
                                                                                    assigned to role
                                                                                </p>

                                                                            @endif

                                                                        </div>

                                                                        <div class="divTableCell">
                                                                            <p>
                                                                                {{ \Carbon\Carbon::parse($roles[$i]->created_at)->diffForHumans() }}
                                                                            </p>
                                                                        </div>

                                                                        <div class="divTableCell">

                                                                            <div class="row justify-content-start">

                                                                                @if(auth()->user()->can('role_show'))

                                                                                    <div class="mt-1 mr-3 mb-2 ml-3 ml-sm-3 mr-sm-3 mb-sm-1 ml-lg-3">

                                                                                        <a href="{{ route('admin.role.show', $roles[$i] ) }}">
                                                                                            <button type="button"
                                                                                                    class="btn btn-sm btn-outline-primary">
                                                                                                <i class="fas fa-eye"></i>
                                                                                                View
                                                                                            </button>
                                                                                        </a>

                                                                                    </div>

                                                                                @endif

                                                                                @if(auth()->user()->can('role_edit'))

                                                                                    <div class="mr-3 mb-2 ml-3 mt-sm-1 ml-sm-3 mr-sm-3 mb-sm-2 ml-md-3 ml-lg-3 ml-xl-0">

                                                                                        <a href="{{ route('admin.role.edit', $roles[$i] ) }}">
                                                                                            <button type="button"
                                                                                                    class="btn btn-sm btn-outline-primary">
                                                                                                <i class="fas fa-edit"></i>
                                                                                                Edit
                                                                                            </button>
                                                                                        </a>

                                                                                    </div>

                                                                                @endif

                                                                            </div>

                                                                        </div>

                                                            </div>

                                                            @endfor

                                                        </div>

                                                </div>

                                    </div>

                                    <div class="form-group">

                                        <div class="row mt-2 ml-1">

                                            <div class="col-lg-12">

                                                <button type="submit"
                                                        class="btn btn-sm btn-outline-primary"
                                                        data-toggle="delete-roles"
                                                        data-btn-ok-label="OK"
                                                        data-btn-ok-class="btn btn-outline-success"
                                                        data-btn-cancel-label="Cancel"
                                                        data-btn-cancel-class="btn ml-2 btn-outline-danger"
                                                        data-title="Permanently delete selected roles?"
                                                        data-content="Cannot be reversed!">
                                                    <i class="fas fa-trash-alt"></i>
                                                    Delete Selected
                                                </button>

                                            </div>

                                        </div>

                                    </div>

                            </form>

                            <div class="row justify-content-center">
                                <p>{{ $roles->links() }}</p>
                            </div>

                        @else

                            <p>Whoops! We couldn't find any roles to display.</p>

                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    @include('admin.partials._footer')
@endsection

@section('script')
    @include('admin.acl.role.scripts._index')
@endsection
