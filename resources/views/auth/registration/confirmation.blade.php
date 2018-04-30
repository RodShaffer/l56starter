@extends('layouts.app')

@section('meta')
    <meta name="author" content="{{ config('site.owner') }}">
    <meta name="description" content="{{ config('site.title') }} New Account Verification Email Confirmation Page.">
@stop

@section('title')
    <title>{{ config('site.title') }} | Account Verification Email Sent</title>
@stop

@section('header')
    @include('partials._header')
@stop

@section('navbar')
    @include('partials._navbar')
@stop

@section('content')

    <div class="container-fluid">



        <div class="row">

            <div class="col-12">

                <div class="row>">
                    <div class="mt-3"></div>
                </div>

                <div class="card">

                    <div class="card-body">

                        <div class="col-12">

                            <h4 class="cgbg-heading">You have successfully registered on {{ config('site.title') }}</h4>

                            <p>
                                An email will be sent to the email address entered during registration for account
                                verification, after a few minutes if you haven't received the email please
                                <strong>check your spam folder.</strong>
                            </p>
                            <p>
                                <strong>Please note:</strong> You will be able to log into your account but will have
                                limited access until your account is verified.
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