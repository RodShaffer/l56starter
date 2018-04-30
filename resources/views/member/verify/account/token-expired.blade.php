@extends('layouts.app')

@section('meta')
<meta name="description" content="{{ config('site.title') }} account verification email has expired page..">
@stop

@section('title')
    <title>{{ config('site.title') }} | Account Verification Email Expired</title>
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

            <div class="col-12">

                <div class="mt-3"></div>

                <div class="card">

                    <div class="card-body">

                        <div class="col-12">

                            <h4 class="cgbg-heading">Account Verification Email Expired</h4>

                            <p>
                                The account verification email expired.
                            </p>

                            <p>
                                You must <a href="{{ config('app.url') }}/login">login</a> to your account, click on
                                your username to view your profile, and then click the "Resend Verification Email" link
                                to resend the verification email. The account verification email is valid for 3 days.
                                You must click the "Verify" link in the email within 3 days to successfully verify your
                                account.
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