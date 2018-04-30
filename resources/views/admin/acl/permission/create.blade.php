@extends('admin.layouts.app')

@section('title')
    <title>{{ config('admin.title') }} Admin | Create Permission</title>
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

                    <div class="card-header">Admin - Create Permission</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('admin.permission.store') }}">

                            {!! csrf_field() !!}

                            <div class="form-group row">
                                <label for="name"
                                       class="col-md-4 col-form-label cgadmin-field-required text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control"
                                           name="name" value="{{ old('name') }}" required>

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
                                        <i class="fas fa-lock"></i> {{ __('Create') }}
                                    </button>
                                </div>
                            </div>

                        </form>

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
    @include('admin.acl.permission.scripts._create')
@endsection
