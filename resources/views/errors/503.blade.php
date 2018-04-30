@extends('layouts.app')

@section('title')
    <title>{{ config('site.title') }} | Down for Maintenance</title>
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

                        <h4 class="cgbg-heading">Down for Maintenance</h4>

                        <div class="mt-3"></div>

                        <div class="col-md-12">
                            <p>We are currently offline for routine maintenance. Be right back.</p>
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