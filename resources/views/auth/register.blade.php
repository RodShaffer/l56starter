@extends('layouts.app')

@section('meta')
    <meta name="author" content="{{ config('site.owner') }}">
    <meta name="description" content="{{ config('site.title') }} {{ config('site.slogan') }} account registration.">
@stop

@section('title')
    <title>{{ config('site.title') }} | Register</title>
@endsection

@section('navbar')
    @include('partials._navbar')
@endsection

@section('header')
    @include('partials._header')
@endsection

@section('content')

    <div class="container-fluid">

        <div class="row justify-content-lg-center mt-3">

            <div class="col-lg-10">

                <div class="card">

                    <div class="card-body">

                        <h4 class="cgbg-heading">Register</h4>

                        <div class="mt-3"></div>

                        <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">

                            {!! csrf_field() !!}

                            <div class="row">

                                <div class="form-group col-lg-12">
                                    <div class="row">
                                        <label for="name"
                                               class="col-lg-4 col-form-label cgbg-field-required text-lg-right">Name</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="name"
                                                   value="{{ old('name') }}" required>

                                            @if ($errors->has('name'))
                                                <span class="form-text cgbg-form-text-error">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                            @endif

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-lg-12">
                                    <div class="row">
                                        <label for="email"
                                               class="col-lg-4 col-form-label cgbg-field-required text-lg-right">Email
                                            Address</label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" name="email"
                                                   value="{{ old('email') }}"
                                                   required>

                                            @if ($errors->has('email'))
                                                <span class="form-text cgbg-form-text-error">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-lg-12">
                                    <div class="row">
                                        <label for="password"
                                               class="col-lg-4 col-form-label cgbg-field-required text-lg-right">Password</label>
                                        <div class="col-lg-8">

                                            <input type="password" class="form-control" name="password" minlength="8"
                                                   maxlength="60" required>

                                            @if ($errors->has('password'))
                                                <span class="form-text cgbg-form-text-error">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                            @endif

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-lg-12">
                                    <div class="row">
                                        <label for="password_confirmation"
                                               class="col-lg-4 col-form-label cgbg-field-required text-lg-right">Confirm
                                            Password</label>
                                        <div class="col-lg-8">

                                            <input type="password" class="form-control" name="password_confirmation"
                                                   minlength="8" maxlength="60" required>

                                            @if ($errors->has('password_confirmation'))
                                                <span class="form-text cgbg-form-text-error">
                                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                        </span>
                                            @endif

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-lg-12">

                                    <div class="row">

                                        <div class="col-lg-4 cgbg-field-required text-lg-right"></div>

                                        <div class="col-lg-8">

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="pptou"
                                                       value="1" id="pptou" required>
                                                <label class="custom-control-label" for="pptou">&nbsp;I agree to
                                                    {{ config('site.title') }}'s terms.</label>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="form-group col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-8">

                                            <button type="submit" class="btn btn-outline-primary">
                                                <i class="fas fa-btn fa-user-plus"></i> Register
                                            </button>

                                        </div>
                                    </div>
                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection

@section('page_footer')
    @include('partials._footer')
@endsection
