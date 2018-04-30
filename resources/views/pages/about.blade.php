@extends('layouts.app')

@section('meta')
    <meta name="author" content="{{ config('site.owner') }}">
    <meta name="description" content="{{ config('site.title') }}, about page.">
@stop

@section('title')
    <title>{{ config('site.title') }} | About</title>
@stop

@section('header')
    @include('partials._header')
@stop

@section('navbar')
    @include('partials._navbar')
@stop

@section('content')

    <div class="container-fluid">

        <div class="row mt-3">

            <div class="col-12">

                <div class="card">

                    <div class="card-body">

                        <h4 class="cgbg-heading">About</h4>

                        <div class="mt-3"></div>

                        <div class="col-12">

                            <p>
                                L56Starter is a Laravel 5.6.* starter project. The project aims to make it quicker to
                                scaffold out a new project that requires an ACL (access control list). The project has
                                a basic admin panel with the bare necessities installed to manage users, roles, and
                                permissions using the spatie/laravel-permission package.
                            </p>

                            <p>
                                L56Starter project also uses the Laravel auth scaffolding so everything is already in
                                place for user registration and login.
                            </p>

                            <p>
                                An account verification system is also in place to verify account users email address on
                                new account registration or email address change.
                            </p>

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