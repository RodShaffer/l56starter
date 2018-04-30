@extends('layouts.app')

@section('meta')
    <meta name="author" content="{{ config('site.owner') }}">
    <meta name="description" content="{{ config('site.title') }}, frequently asked questions.
    Here is where you will find help with questions most asked by our site users.">
@stop

@section('title')
    <title>{{ config('site.title') }} | Frequently Asked Questions</title>
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

                        <h4 class="cgbg-heading">Frequently Asked Questions</h4>

                        <div class="mt-4"></div>

                        <div class="col-12">

                            <p class="text-primary">
                                Question: How do I verify my account?
                            </p>

                            <p class="text-info">
                                Answer: When you registered your account on {{ config('site.title') }} a verify your
                                account
                                email was sent to the email address that was submitted when registering. Simply open
                                your email
                                we sent you and click the "verify" link within the email!
                            </p>

                            <hr/>

                            <p class="text-primary">
                                Question: When I try to verify my account the response received is the token has
                                expired. How do
                                I send a new verification email?
                            </p>

                            <p class="text-info">
                                Answer: On the navigation menu at the top of every page mouse click on your "name" and
                                then
                                mouse click on "user profile" and then scroll down until you see your email address.
                                Then simply
                                mouse click on the "Resend Verification Email" link.
                            </p>

                            <hr/>

                            <p class="text-primary">
                                Question: When I register or try to resend the verification email I don't receive the
                                email. Why
                                does the email not get to me?
                            </p>

                            <p class="text-info">
                                Answer: Please check your "spam" folder for the email. Also make sure you whitelist
                                "{{ config('site.user_reg_email') }}"
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