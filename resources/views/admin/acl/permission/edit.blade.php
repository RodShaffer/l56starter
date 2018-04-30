@extends('admin.layouts.app')

@section('title')
    <title>{{ config('admin.title') }} Admin | Edit Permission</title>
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

                    <div class="card-header">Admin - Edit Permission</div>

                    <div class="card-body">

                        @if(isset($permission))

                            <form method="POST" action="{{ route('admin.permission.update', $permission) }}">

                                {!! csrf_field() !!}
                                {{ method_field('PUT') }}

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label cgadmin-field-required text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control"
                                               name="name" value="{{ $permission->name }}" required>

                                        @if ($errors->has('name'))
                                            <span class="form-text cgadmin-form-text-error">
                                        <strong>{{ $errors->first('name') }}</strong>
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
                                Whoops! We couldn't find any permission.
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
    @include('admin.acl.permission.scripts._edit')
@endsection
