@extends('layouts.app')

@section('meta')
<meta name="description" content="{{ config('site.title') }} account verification confirmation page.">
@stop

@section('title')
    <title>{{ config('site.title') }} | Account Verification Confirmation</title>
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

                        <div class="col-12">

                            <h4 class="cgbg-heading">Account Verification Confirmation</h4>

                            <p><strong>Thank you</strong>, your account has been successfully verified.</p>

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