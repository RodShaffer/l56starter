@extends('layouts.app')

@section('meta')
    <meta name="author" content="{{ config('site.owner') }}">
    <meta name="description" content="{{ config('site.title') }} {{ config('site.slogan') }} account login.">
@endsection

@section('title')
    <title>{{ config('site.title') }} | Account Login</title>
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

            <div class="col-md-12 col-lg-10 col-xl-9">

                <div class="card">

                    <div class="card-body">

                        <h4 class="cgbg-heading">Login</h4>

                        <div class="mt-3"></div>

                        <form method="POST" action="{{ route('login') }}">

                            {!! csrf_field() !!}

                            <div class="form-group row">
                                <label for="email" class="col-lg-4 col-form-label text-lg-right">E-Mail
                                    Address</label>

                                <div class="col-lg-7">
                                    <input id="email" type="email"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-lg-4 col-form-label text-lg-right">Password</label>

                                <div class="col-lg-7">
                                    <input id="password" type="password"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-lg-7 offset-lg-4">

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="remember"
                                               id="remember" value="1" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="remember">&nbsp;Remember Me</label>
                                    </div>

                                </div>

                            </div>

                            <div class="form-group row">
                                <div class="col-lg-7 offset-lg-4">
                                    <button type="submit" class="btn btn-outline-primary">
                                        <i class="fas fa-sign-in-alt"></i> Login
                                    </button>

                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Forgot Your Password?
                                    </a>
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
