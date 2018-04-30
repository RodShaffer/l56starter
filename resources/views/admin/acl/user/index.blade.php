@extends('admin.layouts.app')

@section('meta')
    <meta name="description" content="{{ config('admin.title') }} Admin index of all users.">
@endsection

@section('title')
    <title>{{ config('admin.title') }} | Admin - All Users</title>
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

                    <div class="card-header">Admin - All users</div>

                    <div class="card-body divTableCardBody">

                        @include('flash::message')

                        @if(isset($users) && count($users) > 0)


                            <form class="form-horizontal" role="form" method="POST"
                                  action="{{ route('admin.user.destroy.mass') }}">


                                {{ csrf_field() }}


                                <div class="divTable">

                                    <div class="divTableBody">

                                        <div class="divTableRow">
                                            <div class="divTableHeading">Select</div>
                                            <div class="divTableHeading">ID</div>
                                            <div class="divTableHeading">Name</div>
                                            <div class="divTableHeading">Email</div>
                                            <div class="divTableHeading">Verified</div>
                                            <div class="divTableHeading">Roles</div>
                                            <div class="divTableHeading">Direct Permissions</div>
                                            <div class="divTableHeading">Created</div>
                                            <div class="divTableHeading">Modify</div>
                                        </div>

                                        @for($i = 0; $i < count($users); $i++)

                                            @if($i % 2 == 1)

                                                <div class="divTableRow divTableRowStriped">

                                                    @else

                                                        <div class="divTableRow">

                                                            @endif

                                                            <div class="divTableCellCheckbox">

                                                                @if(auth()->user()->can('user_destroy'))

                                                                    @if($users[$i]->id !== 1)

                                                                        <div class="form-check">
                                                                            <input class="form-check-input position-static"
                                                                                   type="checkbox" name="selected_users[]"
                                                                                   id="selected_users"
                                                                                   value="{{ $users[$i]->id }}"
                                                                                   aria-label="The id of the user to be deleted">
                                                                        </div>

                                                                    @else

                                                                        <div class="form-check">
                                                                            <input class="form-check-input position-static"
                                                                                   type="checkbox" name="selected_users[]"
                                                                                   id="selected_users"
                                                                                   value="{{ $users[$i]->id }}"
                                                                                   aria-label="The id of the user to be deleted" disabled>
                                                                        </div>

                                                                    @endif

                                                                @endif

                                                            </div>

                                                            <div class="divTableCell">
                                                                <p>
                                                                    {{ $users[$i]->id }}
                                                                </p>
                                                            </div>

                                                            <div class="divTableCell">

                                                                <p>
                                                                    {{ $users[$i]->name }}
                                                                </p>

                                                            </div>

                                                            <div class="divTableCell">
                                                                <p>
                                                                    {{ $users[$i]->email }}
                                                                </p>
                                                            </div>

                                                            <div class="divTableCell">
                                                                @if($users[$i]->verified)
                                                                    <p>
                                                                        True
                                                                    </p>
                                                                @else
                                                                    <p>
                                                                        False
                                                                    </p>
                                                                @endif
                                                            </div>

                                                            <div class="divTableCell">

                                                                @foreach($users[$i]->roles as $role)

                                                                    <p>{{ $role->name }}</p>

                                                                @endforeach

                                                            </div>

                                                            <div class="divTableCell">

                                                                @foreach($users[$i]->permissions as $permission)

                                                                    <p>{{ $permission->name }}</p>

                                                                @endforeach

                                                            </div>

                                                            <div class="divTableCell">

                                                                <p>
                                                                    {{ $users[$i]->created_at }}
                                                                </p>

                                                            </div>

                                                            <div class="divTableCell">

                                                                <div class="row justify-content-start">

                                                                    @if(auth()->user()->can('user_show'))

                                                                        <div class="mt-1 mr-3 mb-2 ml-3 ml-sm-3 mr-sm-3 mb-sm-1 ml-lg-3">

                                                                            <a href="{{ route('admin.user.show', $users[$i] ) }}">
                                                                                <button type="button"
                                                                                        class="btn btn-sm btn-outline-primary">
                                                                                    <i class="fas fa-eye"></i> View
                                                                                </button>
                                                                            </a>

                                                                        </div>

                                                                    @endif

                                                                    @if(auth()->user()->can('user_edit'))

                                                                        <div class="mr-3 mb-2 ml-3 mt-sm-1 ml-sm-3 mr-sm-3 mb-sm-2 ml-md-3 ml-lg-3 ml-xl-0">

                                                                            <a href="{{ route('admin.user.edit', $users[$i] ) }}">
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
                                                    data-toggle="delete-users"
                                                    data-btn-ok-label="OK"
                                                    data-btn-ok-class="btn btn-outline-success"
                                                    data-btn-cancel-label="Cancel"
                                                    data-btn-cancel-class="btn ml-2 btn-outline-danger"
                                                    data-title="Permanently delete selected users?"
                                                    data-content="Cannot be reversed!">
                                                <i class="fas fa-trash-alt"></i>
                                                Delete Selected
                                            </button>

                                        </div>

                                    </div>

                                </div>

                            </form>

                            <div class="row justify-content-center">
                                <p>{{ $users->links() }}</p>
                            </div>

                    </div>

                    @else

                        <div class="col-12">

                            <p>Whoops! We couldn't find any users to display.</p>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

@endsection

@section('footer')
    @include('admin.partials._footer')
@endsection

@section('script')
    @include('admin.acl.user.scripts._index')
@endsection
