@extends('layouts.app')

@section('meta')
<meta name="description" content="{{ config('site.title') }} account already verified page.">
@stop

@section('title')
    <title>{{ config('site.title') }} | Account Already Verified</title>
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

                            <h4 class="cgbg-heading">Account Already Verified</h4>

                            <p>
                                Your account is already verified.
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