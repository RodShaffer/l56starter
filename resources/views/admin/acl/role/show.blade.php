@extends('admin.layouts.app')

@section('title')
    <title>{{ config('admin.title') }} Admin | View Role</title>
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

                    <div class="card-header">Admin - View Role</div>

                    <div class="card-body">

                        @if(isset($role))

                            <form class="form-horizontal" role="presentation" action="">

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control"
                                               name="name" value="{{ $role->name }}" disabled>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="permissions"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Permissions') }}</label>

                                    <div class="col-md-6 mt-2 ml-3">

                                        @foreach($role->permissions as $permission)

                                            @if($loop->last)

                                                {{ $permission->name }}

                                            @else

                                                {{ $permission->name }},&nbsp;

                                            @endif

                                        @endforeach

                                    </div>
                                </div>

                                <div class="form-group row">


                                    <div class="col-md-6 offset-md-4">

                                        @if(auth()->user()->can('role_edit'))

                                            <a href="{{ route('admin.role.edit', $role ) }}">
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
                                Whoops! We couldn't find any role.
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
