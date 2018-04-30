@extends('admin.layouts.app')

@section('title')
    <title>{{ config('admin.title') }} Admin | Create User</title>
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

                    <div class="card-header">Admin - Create User</div>

                    <div class="card-body">

                        @if(isset($roles) && count($roles) > 0)

                        <form method="POST" action="{{ route('admin.user.store') }}">
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label cgadmin-field-required text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="form-text cgadmin-form-text-error">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label cgadmin-field-required text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="form-text cgadmin-form-text-error">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label cgadmin-field-required text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="form-text cgadmin-form-text-error">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label cgadmin-field-required text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="roles"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Roles') }}</label>

                                <div class="col-md-6">

                                    <select class="form-control" id="roles" name="roles[]" multiple>

                                        @foreach($roles as $role)

                                            @if(old('roles') && in_array($role->name, old('roles')))

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

                            <div class="form-group row">
                                <label for="permissions"
                                       class="col-md-4 col-form-label text-md-right">Direct Permissions</label>

                                <div class="col-md-6">

                                    <select class="form-control" id="permissions" name="permissions[]" multiple>

                                        @foreach($permissions as $permission)

                                            @if(old('permissions') && in_array($permission->name, old('permissions')))

                                                <option value="{{ $permission->name }}" selected>{{ $permission->name }}</option>

                                            @else

                                                <option value="{{ $permission->name }}">{{ $permission->name }}</option>

                                            @endif

                                        @endforeach

                                    </select>

                                    @if ($errors->has('permissions'))
                                        <span class="form-text cgadmin-form-text-error">
                                        <strong>{{ $errors->first('permissions') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-outline-primary">
                                        <i class="fas fa-user-plus"></i> {{ __('Create') }}
                                    </button>
                                </div>
                            </div>

                        </form>

                        @else

                            <div class="col-12">
                                Whoops! We couldn't find any roles.
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
    @include('admin.acl.user.scripts._create')
@endsection
