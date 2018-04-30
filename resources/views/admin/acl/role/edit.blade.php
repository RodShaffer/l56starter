@extends('admin.layouts.app')

@section('title')
    <title>{{ config('admin.title') }} Admin | Edit Role</title>
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

                    <div class="card-header">Admin - Edit Role</div>

                    <div class="card-body">

                        @if(isset($role) && isset($permissions) && count($permissions) > 0)

                            <form method="POST" action="{{ route('admin.role.update', $role) }}">

                                {!! csrf_field() !!}
                                {{ method_field('PUT') }}

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label cgadmin-field-required text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               name="name" value="{{ $role->name }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="form-text cgadmin-form-text-error">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="permissions"
                                           class="col-md-4 col-form-label form-field-required text-md-right">{{ __('Permissions') }}</label>

                                    <div class="col-md-6">

                                        <select class="form-control" id="permissions" name="permissions[]"
                                                multiple required>

                                            @foreach($permissions as $permission)

                                                @if($role->hasPermissionTo($permission))

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
                                            <i class="far fa-save"></i> {{ __('Save') }}
                                        </button>
                                    </div>
                                </div>

                            </form>

                        @else

                            <div class="col-12">
                                Whoops! There was a problem retrieving the role or permissions.
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
    @include('admin.acl.role.scripts._edit')
@endsection
