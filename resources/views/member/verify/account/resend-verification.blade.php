@extends('layouts.app')

@section('meta')
<meta name="description" content="{{ config('site.title') }} account verification email resent confirmation page.">
@stop

@section('title')
    <title>{{ config('site.title') }} | Verification Email Resent</title>
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

                <div class="mt-3"></div>

                <div class="card">

                    <div class="card-body">

                        @include('flash::message')

                        <div class="col-12">

                            <h4 class="cgbg-heading">Verification Email Resent</h4>

                            <p>
                                A verification email will be sent to the email address on file for your account, after a
                                few minutes if you haven't received the email please <strong>check your spam folder.</strong>
                            </p>
                            <p>
                                <strong>Please note:</strong> You will have limited access until your account is verified.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection

@section('page_footer')
    @include('partials._footer')
@stop