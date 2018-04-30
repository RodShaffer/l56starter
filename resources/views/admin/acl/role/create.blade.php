@extends('admin.layouts.app')

@section('title')
    <title>{{ config('admin.title') }} Admin | Create Role</title>
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

                    <div class="card-header">Admin - Create Role</div>

                    <div class="card-body">

                        @if(isset($permissions) && count($permissions) > 0)

                        <form method="POST" action="{{ route('admin.role.store') }}">
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
                                <label for="permissions"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Permissions') }}</label>

                                <div class="col-md-6">

                                    <select class="form-control" id="permissions" name="permissions[]"
                                            multiple>

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
                                        <i class="fas fa-key"></i> {{ __('Create') }}
                                    </button>
                                </div>
                            </div>

                        </form>

                        @else

                            <div class="col-12">
                                Whoops! We couldn't find any permissions.
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
    @include('admin.acl.role.scripts._create')
@endsection
