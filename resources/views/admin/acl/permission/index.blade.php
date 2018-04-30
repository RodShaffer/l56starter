@extends('admin.layouts.app')

@section('meta')
    <meta name="description" content="{{ config('admin.title') }} Admin index of all permissions.">
@endsection

@section('title')
    <title>{{ config('admin.title') }} | Admin - All Permissions</title>
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

                    <div class="card-header">Admin - All permissions</div>

                    <div class="card-body divTableCardBody">

                        @include('flash::message')

                        @if(isset($permissions) && count($permissions) > 0)

                            <form class="form-horizontal" role="form" method="POST"
                                  action="{{ route('admin.permission.destroy.mass') }}">


                                {{ csrf_field() }}


                                <div class="divTable">

                                    <div class="divTableBody">

                                        <div class="divTableRow">
                                            <div class="divTableHeading">Select</div>
                                            <div class="divTableHeading">ID</div>
                                            <div class="divTableHeading">Permission Name</div>
                                            <div class="divTableHeading">Roles</div>
                                            <div class="divTableHeading">Users</div>
                                            <div class="divTableHeading">Created</div>
                                            <div class="divTableHeading">Modify</div>
                                        </div>

                                        @for($i = 0; $i < count($permissions); $i++)

                                            @if($i % 2 == 1)

                                                <div class="divTableRow divTableRowStriped">

                                                    @else

                                                        <div class="divTableRow">

                                                            @endif

                                                            <div class="divTableCellCheckbox">

                                                                @if(auth()->user()->can('permission_destroy'))

                                                                    @if($permissions[$i]->id < 15)

                                                                        <div class="form-check">
                                                                            <input class="form-check-input position-static"
                                                                                   type="checkbox"
                                                                                   name="selected_permissions[]"
                                                                                   id="selected_permissions"
                                                                                   value="{{ $permissions[$i]->id }}"
                                                                                   aria-label="The id of the permission to be deleted" disabled>
                                                                        </div>

                                                                    @else

                                                                        <div class="form-check">
                                                                            <input class="form-check-input position-static"
                                                                                   type="checkbox"
                                                                                   name="selected_permissions[]"
                                                                                   id="selected_permissions"
                                                                                   value="{{ $permissions[$i]->id }}"
                                                                                   aria-label="The id of the permission to be deleted">
                                                                        </div>

                                                                    @endif

                                                                @endif

                                                            </div>

                                                            <div class="divTableCell">
                                                                <p>
                                                                    {{ $permissions[$i]->id }}
                                                                </p>
                                                            </div>

                                                            <div class="divTableCell">
                                                                <p>
                                                                    {{ $permissions[$i]->name }}
                                                                </p>
                                                            </div>

                                                            <div class="divTableCell">
                                                                @if(count($permissions[$i]->roles) > 0)

                                                                    <p>
                                                                        <a href="{{ route('admin.role.search.permission', $permissions[$i]) }}">
                                                                            assigned to {{ count($permissions[$i]->roles) }} roles</a>
                                                                    </p>

                                                                @else

                                                                    <p>
                                                                        assigned to {{ count($permissions[$i]->roles) }} roles
                                                                    </p>

                                                                @endif
                                                            </div>

                                                            <div class="divTableCell">

                                                                @if(count($permissions[$i]->users) > 0)

                                                                    <p>
                                                                        <a href="{{ route('admin.user.search.permission', $permissions[$i]) }}">
                                                                            assigned to {{ count($permissions[$i]->users) }} users</a>
                                                                    </p>

                                                                @else

                                                                    <p>
                                                                        assigned to {{ count($permissions[$i]->users) }} users
                                                                    </p>

                                                                @endif

                                                            </div>

                                                            <div class="divTableCell">
                                                                <p>
                                                                    {{ \Carbon\Carbon::parse($permissions[$i]->created_at)->diffForHumans() }}
                                                                </p>
                                                            </div>

                                                            <div class="divTableCell">

                                                                <div class="row justify-content-start">

                                                                    @if(auth()->user()->can('permission_show'))

                                                                        <div class="mt-1 mr-3 mb-2 ml-3 ml-sm-3 mr-sm-3 mb-sm-1 ml-lg-3">

                                                                            <a href="{{ route('admin.permission.show', $permissions[$i] ) }}">
                                                                                <button type="button"
                                                                                        class="btn btn-sm btn-outline-primary">
                                                                                    <i class="fas fa-eye"></i> View
                                                                                </button>
                                                                            </a>

                                                                        </div>

                                                                    @endif

                                                                    @if(auth()->user()->can('permission_edit'))

                                                                        <div class="mr-3 mb-2 ml-3 mt-sm-1 ml-sm-3 mr-sm-3 mb-sm-2 ml-md-3 ml-lg-3 ml-xl-0">

                                                                            <a href="{{ route('admin.permission.edit', $permissions[$i] ) }}">
                                                                                <button type="button"
                                                                                        class="btn btn-sm btn-outline-primary">
                                                                                    <i class="fas fa-edit"></i> Edit
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
                                                    data-toggle="delete-permissions"
                                                    data-btn-ok-label="OK"
                                                    data-btn-ok-class="btn btn-outline-success"
                                                    data-btn-cancel-label="Cancel"
                                                    data-btn-cancel-class="btn ml-2 btn-outline-danger"
                                                    data-title="Permanently delete selected permissions?"
                                                    data-content="Cannot be reversed!">
                                                <i class="fas fa-trash-alt"></i>
                                                Delete Selected
                                            </button>

                                        </div>

                                    </div>

                                </div>

                            </form>

                            <div class="row justify-content-center">
                                <p>{{ $permissions->links() }}</p>
                            </div>

                    </div>

                    @else

                        <p>Whoops! We couldn't find any permissions to display.</p>

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
    @include('admin.acl.permission.scripts._index')
@endsection
