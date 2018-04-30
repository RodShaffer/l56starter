@extends('admin.layouts.app')

@section('title')
    <title>{{ config('admin.title') }} Admin | View Permission</title>
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

                    <div class="card-header">Admin - View Permission</div>

                    <div class="card-body">

                        @if(isset($permission))

                            <form class="form-horizontal" role="presentation" action="">

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control"
                                               name="name" value="{{ $permission->name }}" disabled>
                                    </div>
                                </div>

                                <div class="form-group row">


                                    <div class="col-md-6 offset-md-4">

                                        @if(auth()->user()->can('permission_edit'))

                                            <a href="{{ route('admin.permission.edit', $permission ) }}">
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
