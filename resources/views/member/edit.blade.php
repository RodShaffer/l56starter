@extends('layouts.app')

@section('meta')
    <meta name="author" content="{{ config('site.owner') }}">
    @if(isset($user))
        <meta name="description" content="{{ config('site.title') }}, edit {{ $user->first_name }}'s profile.">
    @else
        <meta name="description" content="{{ config('site.title') }}, edit user profile.">
    @endif
@stop

@section('title')
    @if(isset($user))
        <title>{{ config('site.title') }} | Edit {{ $user->first_name }}'s Profile</title>
    @else
        <title>{{ config('site.title') }} | Edit User Profile</title>
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

                        @if(isset($user) && isset($states) && count($states) > 0)

                            <h4 class="cgbg-heading">Edit {{ $user->first_name }}'s Profile</h4>

                            <div class="mt-4"></div>

                            <form class="form-horizontal" role="form" method="POST"
                                  action="{{ route('user.update', $user ) }}">

                                {!! csrf_field() !!}
                                {{ method_field('PUT') }}

                                <div class="row">

                                    <div class="form-group col-lg-12">
                                        <div class="row">
                                            <label for="name"
                                                   class="col-lg-4 col-form-label cgbg-field-required text-lg-right">Name</label>
                                            <div class="col-lg-7">
                                                <input class="form-control" id="name" name="name" type="text"
                                                       value="{{ old('name', $user->name) }}" required>

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
                                            <label for="address_one"
                                                   class="col-lg-4 col-form-label text-lg-right">Address 1</label>
                                            <div class="col-lg-7">
                                                <input class="form-control" id="address_one" name="address_one"
                                                       type="text"
                                                       maxlength="60"
                                                       value="{{ old('address_one', $user->address_one) }}">

                                                @if ($errors->has('address_one'))
                                                    <span class="form-text cgbg-form-text-error">
                                                        <strong>{{ $errors->first('address_one') }}</strong>
                                                    </span>
                                                @endif

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <div class="row">
                                            <label for="address_two"
                                                   class="col-lg-4 col-form-label text-lg-right">Address 2</label>
                                            <div class="col-lg-7">
                                                <input class="form-control" id="address_two" name="address_two"
                                                       type="text"
                                                       maxlength="60"
                                                       value="{{ old('address_two', $user->address_two) }}">

                                                @if ($errors->has('address_two'))
                                                    <span class="form-text cgbg-form-text-error">
                                                        <strong>{{ $errors->first('address_two') }}</strong>
                                                    </span>
                                                @endif

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <div class="row">
                                            <label for="city" class="col-lg-4 col-form-label text-lg-right">City</label>
                                            <div class="col-lg-7">
                                                <input class="form-control" id="city" name="city" type="text"
                                                       maxlength="30" value="{{ old('city', $user->city) }}">

                                                @if ($errors->has('city'))
                                                    <span class="form-text cgbg-form-text-error">
                                                        <strong>{{ $errors->first('city') }}</strong>
                                                    </span>
                                                @endif

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <div class="row">
                                            <label for="state" class="col-lg-4 col-form-label text-lg-right">State</label>
                                            <div class="col-lg-7">

                                                <select class="form-control" name="state" id="state">

                                                    @foreach($states as $state)

                                                        @if(old('state'))

                                                            @if(old('state') == $state->abbreviation)

                                                                <option value="{{ $state->abbreviation }}"
                                                                        selected>{{ $state->name }}</option>

                                                            @else

                                                                <option value="{{ $state->abbreviation }}">{{ $state->name }}</option>

                                                            @endif

                                                        @else

                                                            @if(isset($user->state))

                                                                @if($user->state == $state->abbreviation)

                                                                    <option value="{{ $state->abbreviation }}"
                                                                            selected>{{ $state->name }}</option>

                                                                @else

                                                                    <option value="{{ $state->abbreviation }}">{{ $state->name }}</option>

                                                                @endif

                                                            @else

                                                                <option value="{{ $state->abbreviation }}">{{ $state->name }}</option>

                                                            @endif

                                                        @endif

                                                    @endforeach

                                                </select>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <div class="row">
                                            <label for="postal_code"
                                                   class="col-lg-4 col-form-label text-lg-right">Postal Code</label>
                                            <div class="col-lg-7">
                                                <input class="form-control" id="postal_code" name="postal_code"
                                                       type="text"
                                                       maxlength="10"
                                                       value="{{ old('postal_code', $user->postal_code) }}">

                                                @if ($errors->has('postal_code'))
                                                    <span class="form-text cgbg-form-text-error">
                                                        <strong>{{ $errors->first('postal_code') }}</strong>
                                                    </span>
                                                @endif

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <div class="row justify-content-start">
                                            <label for="phone_number" class="col-lg-4 col-form-label text-lg-right">Phone
                                                Number</label>
                                            <div class="col-lg-3">
                                                <input class="form-control" id="phone_number" name="phone_number"
                                                       type="text"
                                                       value="{{ old('phone_number', $user->phone_number) }}"
                                                       maxlength="14">

                                                @if ($errors->has('phone_number'))
                                                    <span class="form-text cgbg-form-text-error">
                                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                                    </span>
                                                @endif

                                            </div>
                                            <label for="phone_ext"
                                                   class="col-lg-auto col-form-label text-lg-right">Phone
                                                Ext.</label>
                                            <div class="col-lg-2">
                                                <input class="form-control" id="phone_ext" name="phone_ext"
                                                       type="text" value="{{ old('phone_ext', $user->phone_ext) }}"
                                                       maxlength="5">

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
                                            <label for="email"
                                                   class="col-lg-4 col-form-label cgbg-field-required text-lg-right">Email
                                                Address</label>
                                            <div class="col-lg-7">
                                                <input type="email" class="form-control" name="email"
                                                       value="{{ old('email', $user->email) }}" required>

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
                                            <div class="col-lg-4"></div>
                                            <div class="col-lg-7">

                                                <button type="submit" class="btn btn-outline-primary">
                                                    <i class="far fa-save"></i> Save Profile
                                                </button>

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