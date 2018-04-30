@extends('admin.layouts.app')

@section('title')
    <title>{{ config('app.name') }} Admin | Down for Maintenance</title>
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

                    <div class="card-header">Down for Maintenance</div>

                    <div class="card-body">

                        <p>
                            We are currently offline for routine maintenance. Be right back.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
