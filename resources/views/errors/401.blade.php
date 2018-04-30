@extends('layouts.app')

@section('title')
    <title>{{ config('site.title') }} | 401 Unauthorized</title>
@stop

@section('header')
    @include('partials._header')
@stop

@section('navbar')
    @include('partials._navbar')
@stop

@section('content')

    <div class="container-fluid">

        <div class="mt-3"></div>

        <div class="row">

            <div class="col-md-12">

                <div class="card">

                    <div class="card-body">

                        <h4 class="cgbg-heading">401 Unauthorized</h4>

                        <div class="mt-3"></div>

                        <div class="col-md-12">
                            <p>You do not have the proper permissions to view or modify the selected resource.</p>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@stop

@section('page_footer')
    @include('partials._footer')
@stop