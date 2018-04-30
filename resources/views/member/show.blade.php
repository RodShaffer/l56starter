@extends('layouts.app')

@section('meta')
    <meta name="author" content="{{ config('site.owner') }}">
@if(isset($user))
    <meta name="description" content="{{ config('site.title') }} - show the details of {{ $user->first_name }}'s profile.">
@else
    <meta name="description" content="{{ config('site.title') }} - show user profile.">
@endif
@stop

@section('title')

    @if(isset($user))

        <title>{{ config('site.title') }} | {{ $user->first_name }}'s User Profile</title>

    @else

        <title>{{ config('site.title') }} | Show User Profile</title>

    @endif

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

            <div class="col-lg-12">

                <div class="mt-3"></div>

                <div class="card">

                    <div class="card-body">

                        @include('flash::message')

                        @if(isset($user))

                            <h4 class="cgbg-heading">{{ $user->first_name }}'s Profile</h4>

                            <div class="mt-4"></div>

                            <form class="form-horizontal" role="presentation" method="" action="">

                                <div class="row">

                                    <div class="form-group col-lg-12">
                                        <div class="row">
                                            <label for="name" class="col-lg-4 col-form-label text-lg-right">Name</label>
                                            <div class="col-lg-7">
                                                <input class="form-control" id="name" name="name"
                                                       type="text" value="{{ $user->name }}" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <div class="row">
                                            <label for="address_one" class="col-lg-4 col-form-label text-lg-right">Address
                                                1</label>
                                            <div class="col-lg-7">
                                                <input class="form-control" id="address_one" name="address_one"
                                                       type="text" value="{{ $user->address_one }}" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <div class="row">
                                            <label for="address_two" class="col-lg-4 col-form-label text-lg-right">Address
                                                2</label>
                                            <div class="col-lg-7">
                                                <input class="form-control" id="address_two" name="address_two"
                                                       type="text" value="{{ $user->address_two }}" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <div class="row">
                                            <label for="city"
                                                   class="col-lg-4 col-form-label text-lg-right">City</label>
                                            <div class="col-lg-7">
                                                <input class="form-control" id="city" name="city" type="text"
                                                       value="{{ $user->city }}" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <div class="row">
                                            <label for="state"
                                                   class="col-lg-4 col-form-label text-lg-right">State</label>
                                            <div class="col-lg-7">
                                                @if(isset($user->state) && $user->state == 'SS')
                                                    <input class="form-control" id="state" name="state" type="text"
                                                           value="" disabled>
                                                @else

                                                    <input class="form-control" id="state" name="state" type="text"
                                                           value="{{ $user->state }}" disabled>

                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <div class="row">
                                            <label for="postal_code" class="col-lg-4 col-form-label text-lg-right">Postal
                                                Code</label>
                                            <div class="col-lg-7">
                                                <input class="form-control" id="postal_code" name="postal_code"
                                                       type="text" value="{{ $user->postal_code }}" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <div class="row justify-content-start">
                                            <label for="phone_number" class="col-lg-4 col-form-label text-lg-right">Phone Number</label>
                                            <div class="col-lg-3">
                                                <input class="form-control" id="phone_number" name="phone_number"
                                                       type="text" value="{{ $user->phone_number }}" disabled>

                                                @if ($errors->has('phone_number'))
                                                    <span class="form-text cgbg-form-text-error">
                                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                                    </span>
                                                @endif

                                            </div>
                                            <label for="phone_ext" class="col-lg-auto col-form-label text-lg-right">Phone Ext.</label>
                                            <div class="col-lg-2">
                                                <input class="form-control" id="phone_ext" name="phone_ext"
                                                       type="text" value="{{ $user->phone_ext }}" disabled>

                                                @if ($errors->has('phone_ext'))
                                                    <span class="form-text cgbg-form-text-error">
                                                        <strong>{{ $errors->first('phone_ext') }}</strong>
                                                    </span>
                                                @endif

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-4 col-form-label text-lg-right">
                                                <label for="email" class="form-label">Email Address</label>
                                                <span>
                                                @if($user->verified)
                                                        <span class="cgbg-form-text-verified">( verified )</span>
                                                    @else
                                                        <span class="cgbg-form-text-unverified">( unverified )</span>
                                                    @endif
                                        </span>
                                            </div>
                                            <div class="col-lg-7">
                                                <input class="form-control" id="email" name="email" type="text"
                                                       value="{{ $user->email }}" disabled>

                                                @if(!$user->verified)

                                                    <span>
                                                <a href="{{ url('/verifyemail/resend/' . $user->id) }}">Resend Verification Email</a>
                                            </span>

                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group form-group-sm col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-4"></div>
                                            <div class="col-lg-7">
                                                <a href="{{ route('user.edit', $user) }}">
                                                    <button type="button" class="btn btn-outline-primary">
                                                        <i class="fas fa-pencil-alt"></i> Edit Profile
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </form>

                        @else

                            <div class="col-12">
                                <p>Whoops! We couldn't find any user to display.</p>
                            </div>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

@stop

@section('page_footer')
    @include('partials._footer')
@stop