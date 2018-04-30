@extends('admin.layouts.app')

@section('title')
    <title>{{ config('app.name') }} Admin | 401 Unauthorized</title>
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

                    <div class="card-header">401 Unauthorized</div>

                    <div class="card-body">

                        <p>
                            You do not have the proper permissions to view or modify the selected resource.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
