@extends('admin.layouts.app')

@section('title')
    <title>{{ config('admin.title') }} Admin | Edit User</title>
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

                    <div class="card-header">Admin - Edit User</div>

                    <div class="card-body">

                        @include('flash::message')

                        @if(isset($user) && isset($roles) && count($roles) > 0)

                            <form method="POST" action="{{ route('admin.user.update', $user) }}">

                                {!! csrf_field() !!}
                                {{ method_field('PUT') }}

                                <div class="row">

                                    <div class="form-group col-lg-12">
                                        <div class="row">
                                            <label for="name" class="col-lg-3 col-form-label cgadmin-field-required text-lg-right">Name</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" id="name" name="name" type="text"
                                                       value="{{ old('name', $user->name) }}" required>

                                                @if ($errors->has('name'))
                                                    <span class="form-text cgadmin-form-text-error">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <div class="row">
                                            <label for="address_one" class="col-lg-3 col-form-label text-lg-right">Address 1</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" id="address_one" name="address_one"
                                                       type="text"
                                                       maxlength="60"
                                                       value="{{ old('address_one', $user->address_one) }}">

                                                @if ($errors->has('address_one'))
                                                    <span class="form-text cgadmin-form-text-error">
                                                        <strong>{{ $errors->first('address_one') }}</strong>
                                                    </span>
                                                @endif

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <div class="row">
                                            <label for="address_two" class="col-lg-3 col-form-label text-lg-right">Address 2</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" id="address_two" name="address_two"
                                                       type="text"
                                                       maxlength="60"
                                                       value="{{ old('address_two', $user->address_two) }}">

                                                @if ($errors->has('address_two'))
                                                    <span class="form-text cgadmin-form-text-error">
                                                        <strong>{{ $errors->first('address_two') }}</strong>
                                                    </span>
                                                @endif

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <div class="row">
                                            <label for="city" class="col-lg-3 col-form-label text-lg-right">City</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" id="city" name="city" type="text"
                                                       maxlength="30" value="{{ old('city', $user->city) }}">

                                                @if ($errors->has('city'))
                                                    <span class="form-text cgadmin-form-text-error">
                                                        <strong>{{ $errors->first('city') }}</strong>
                                                    </span>
                                                @endif

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <div class="row">
                                            <label for="state" class="col-lg-3 col-form-label text-lg-right">State</label>
                                            <div class="col-lg-8">

                                                <select class="form-control" name="state" id="state">

                                                    @foreach($states as $state)

                                                        @if(old('state'))

                                                            @if(old('state') == $state->abbreviation)

                                                                <option value="{{ $state->abbreviation }}"
                                                                        selected>{{ $state->name }}</option>

                                                            @else

                                                                <option value="{{ $state->abbreviation }}">{{ $state->name }}</option>

                                                            @endif

                                                        @else

                                                            @if(isset($user->state))

                                                                @if($user->state == $state->abbreviation)

                                                                    <option value="{{ $state->abbreviation }}"
                                                                            selected>{{ $state->name }}</option>

                                                                @else

                                                                    <option value="{{ $state->abbreviation }}">{{ $state->name }}</option>

                                                                @endif

                                                            @else

                                                                <option value="{{ $state->abbreviation }}">{{ $state->name }}</option>

                                                            @endif

                                                        @endif

                                                    @endforeach

                                                </select>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <div class="row">
                                            <label for="postal_code" class="col-lg-3 col-form-label text-lg-right">Postal
                                                Code</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" id="postal_code" name="postal_code"
                                                       type="text"
                                                       maxlength="10"
                                                       value="{{ old('postal_code', $user->postal_code) }}">

                                                @if ($errors->has('postal_code'))
                                                    <span class="form-text cgadmin-form-text-error">
                                                        <strong>{{ $errors->first('postal_code') }}</strong>
                                                    </span>
                                                @endif

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <div class="row justify-content-start">
                                            <label for="phone_number" class="col-lg-3 col-form-label text-lg-right">Phone
                                                Number</label>
                                            <div class="col-lg-3">
                                                <input class="form-control" id="phone_number" name="phone_number"
                                                       type="text"
                                                       value="{{ old('phone_number', $user->phone_number) }}"
                                                       maxlength="14">

                                                @if ($errors->has('phone_number'))
                                                    <span class="form-text cgadmin-form-text-error">
                                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                                    </span>
                                                @endif

                                            </div>
                                            <label for="phone_ext" class="col-lg-auto col-form-label text-lg-right">Phone
                                                Ext.</label>
                                            <div class="col-lg-2">
                                                <input class="form-control" id="phone_ext" name="phone_ext"
                                                       type="text" value="{{ old('phone_ext', $user->phone_ext) }}"
                                                       maxlength="5">

                                                @if ($errors->has('phone_ext'))
                                                    <span class="form-text cgadmin-form-text-error">
                                                        <strong>{{ $errors->first('phone_ext') }}</strong>
                                                    </span>
                                                @endif

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <div class="row">
                                            <label for="email"
                                                   class="col-lg-3 col-form-label cgadmin-field-required text-lg-right">Email
                                                Address</label>
                                            <div class="col-lg-8">
                                                <input type="email" class="form-control" name="email"
                                                       value="{{ old('email', $user->email) }}" required>

                                                @if ($errors->has('email'))
                                                    <span class="form-text cgbg-form-text-error">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <div class="row">
                                            <label for="roles" class="col-lg-3 col-form-label text-lg-right">Roles</label>
                                            <div class="col-lg-8">

                                                @if($user->hasRole('admin'))

                                                    <select class="form-control" id="roles" name="roles[]" multiple disabled>

                                                @else

                                                    <select class="form-control" id="roles" name="roles[]" multiple>

                                                @endif

                                                    @foreach($roles as $role)

                                                        @if($user->hasRole($role->name))

                                                            <option value="{{ $role->name }}" selected>{{ $role->name }}</option>

                                                        @else

                                                            <option value="{{ $role->name }}">{{ $role->name }}</option>

                                                        @endif

                                                    @endforeach

                                                </select>

                                                @if ($errors->has('roles'))
                                                    <span class="form-text cgadmin-form-text-error">
                                                        <strong>{{ $errors->first('roles') }}</strong>
                                                    </span>
                                                @endif
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
                                                   class="col-lg-3 col-form-label text-lg-right">Direct Permissions</label>

                                            <div class="col-lg-8">

                                                <select class="form-control" id="direct_permissions" name="direct_permissions[]" multiple>

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

                                                <button type="submit" class="btn btn-outline-primary">
                                                    <i class="far fa-save"></i> Save
                                                </button>

                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </form>

                        @else

                            <div class="col-12">
                                Whoops! There was a problem retrieving the user or roles.
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
    @include('admin.acl.user.scripts._edit')
@endsection
