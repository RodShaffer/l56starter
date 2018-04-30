@extends('admin.layouts.app')

@section('title')
    <title>{{ config('admin.title') }} Admin | View User</title>
@endsection

@section('navbar')
    @include('admin.partials._navbar')
@endsection

@section('header')
    @include('admin.partials._header')
@endsection

@section('content')

    <div class="container-fluid">

        <div class="row mt-3">

            <div class="col-12">

                <div class="card">
                    <div class="card-header">Admin - View User</div>

                    <div class="card-body">

                        @if(isset($user))

                            <form class="form-horizontal" role="presentation" action="">

                                <div class="row">

                                    <div class="form-group col-lg-12">
                                        <div class="row">
                                            <label for="name" class="col-lg-3 col-form-label text-lg-right">Name</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" id="name" name="name" type="text"
                                                       value="{{ $user->name }}" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <div class="row">
                                            <label for="address_one" class="col-lg-3 col-form-label text-lg-right">Address
                                                1</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" id="address_one" name="address_one"
                                                       type="text" value="{{ $user->address_one }}" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <div class="row">
                                            <label for="address_two" class="col-lg-3 col-form-label text-lg-right">Address
                                                2</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" id="address_two" name="address_two"
                                                       type="text" value="{{ $user->address_two}}" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <div class="row">
                                            <label for="city" class="col-lg-3 col-form-label text-lg-right">City</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" id="city" name="city" type="text"
                                                       value="{{ $user->city }}" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <div class="row">
                                            <label for="state"
                                                   class="col-lg-3 col-form-label text-lg-right">State</label>
                                            <div class="col-lg-8">
                                                @if(isset($user->state) && $user->state == 'SS')
                                                    <input class="form-control" id="state" name="state" type="text"
                                                           value="" disabled>
                                                @else

                                                    <input class="form-control" id="state" name="state" type="text"
                                                           value="{{ $user->state }}" disabled>

                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <div class="row">
                                            <label for="postal_code" class="col-lg-3 col-form-label text-lg-right">Postal
                                                Code</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" id="postal_code" name="postal_code"
                                                       type="text" value="{{ $user->postal_code }}" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <div class="row justify-content-start">
                                            <label for="phone_number" class="col-lg-3 col-form-label text-lg-right">Phone
                                                Number</label>
                                            <div class="col-lg-3">
                                                <input class="form-control" id="phone_number" name="phone_number"
                                                       type="text" value="{{ $user->phone_number }}" disabled>
                                            </div>
                                            <label for="phone_ext" class="col-lg-auto col-form-label text-lg-right">Phone
                                                Ext.</label>
                                            <div class="col-lg-2">
                                                <input class="form-control" id="phone_ext" name="phone_ext"
                                                       type="text" value="{{ $user->phone_ext }}" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <div class="row">
                                            <label for="email"
                                                   class="col-lg-3 col-form-label text-lg-right">Email
                                                Address</label>
                                            <div class="col-lg-8">
                                                <input type="email" class="form-control" name="email"
                                                       value="{{ $user->email }}" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <div class="row">
                                            <label for="roles"
                                                   class="col-lg-3 col-form-label text-lg-right">Roles</label>
                                            <div class="col-lg-8">

                                                <select class="form-control" id="roles" name="roles[]" multiple
                                                        disabled>

                                                    @foreach($user->roles as $role)

                                                        <option value="{{ $role->name }}"
                                                                selected>{{ $role->name }}</option>

                                                    @endforeach

                                                </select>

                                            </div>
                                        </div>
                                    </div>


                                    @foreach($user->roles as $role)

                                    <div class="form-group col-lg-12">
                                        <div class="row">

                                            <label class="col-lg-3 col-form-label text-lg-right">"<a href="{{ route('admin.role.show', $role) }}">{{ $role->name }}</a>"</label>

                                            <div class="col-lg-8">



                                                <div class="w-100"></div>

                                                <div class="col-12">
                                                    permissions
                                                </div>

                                                <div class="col-12 cgadmin-form-input-disabled">

                                                    @if(count($role->permissions) > 0)

                                                        @foreach($role->permissions as $permission)

                                                            @if($loop->last)

                                                                {{ $permission->name }}

                                                            @else

                                                                {{ $permission->name }},&nbsp;

                                                            @endif

                                                        @endforeach



                                                    @else

                                                        No role permissions assigned

                                                    @endif

                                                </div>

                                                <div class="col-12">
                                                    <hr>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    @endforeach


                                    <div class="form-group col-lg-12">

                                        <div class="row">

                                            <label for="permissions"
                                                   class="col-lg-3 col-form-label text-md-right">Direct Permissions</label>

                                            <div class="col-lg-8">

                                                <select class="form-control" id="direct_permissions" name="permissions[]" multiple
                                                        disabled>

                                                    @foreach($permissions as $permission)

                                                        @if($user->hasDirectPermission($permission))

                                                            <option value="{{ $permission->name }}"
                                                                    selected>{{ $permission->name }}</option>

                                                        @else

                                                            <option value="{{ $permission->name }}">{{ $permission->name }}</option>&nbsp;

                                                        @endif

                                                    @endforeach

                                                </select>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-3"></div>
                                            <div class="col-lg-8">
                                                @if(auth()->user()->can('user_edit'))

                                                    <a href="{{ route('admin.user.edit', $user ) }}">
                                                        <button type="button" class="btn btn-outline-primary">
                                                            <i class="fas fa-edit"></i> {{ __('Edit') }}
                                                        </button>
                                                    </a>

                                                @else

                                                    <a href="#">
                                                        <button type="button" class="btn btn-outline-primary" disabled>
                                                            <i class="fas fa-edit"></i> {{ __('Edit') }}
                                                        </button>
                                                    </a>

                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </form>

                        @else

                            <div class="col-12">
                                Whoops! We couldn't find any user.
                            </div>

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
    @include('admin.acl.user.scripts._show')
@endsection
