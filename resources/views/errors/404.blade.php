@extends('layouts.app')

@section('title')
    <title>{{ config('site.title') }} | 404 Page Not Found</title>
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

                        <h4 class="cgbg-heading">404 Page Not Found</h4>

                        <div class="mt-3"></div>

                        <div class="col-md-12">
                            <p>The page you requested was not found. The resource may have been moved or deleted.</p>
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