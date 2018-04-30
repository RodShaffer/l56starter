@extends('admin.layouts.app')

@section('title')
    <title>{{ config('app.name') }} Admin | 404 Page Not Found</title>
@endsection

@section('navbar')
    @include('admin.partials._navbar')
@endsection

@section('header')
    @include('admin.partials._header')
@endsection

@section('content')

    <div class="container-fluid">

        <div class="row mt-3 justify-content-center">

            <div class="col-md-12">

                <div class="card">

                    <div class="card-header">404 Page Not Found</div>

                    <div class="card-body">

                        <p>
                            The page you requested was not found. The resource may have been moved or deleted.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
