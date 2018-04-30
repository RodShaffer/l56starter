@extends('admin.layouts.app')

@section('meta')
    <meta name="description" content="{{ config('admin.title') }} Admin dashboard.">
@endsection

@section('title')
    <title>{{ config('admin.title') }} | Admin - Dashboard</title>
@endsection

@section('header')
    @include('admin.partials._header')
@endsection

@section('navbar')
    @include('admin.partials._navbar')
@endsection

@section('content')

    <div class="container-fluid">

        <div class="row mt-3">

            <div class="col-12">

                <div class="card">

                    <div class="card-header">Admin - Dashboard</div>

                    @if(isset($user_count) &&isset($role_count) && isset($permission_count))

                        <div class="card-body">

                            <div class="row cgadmin-stats-container">

                                <div class="col-12">

                                    <div class="row">

                                        <div class="col-md-6 col-xl-4">

                                            <div class="cgadmin-user-stats-container">

                                                <div class="cgadmin-user-stats cgadmin-image">

                                                    <div class="col-12 mt-4 cgadmin-db-heading">
                                                        <span class="cgadmin-count">{{ $user_count }}</span> Total Users
                                                    </div>

                                                    <div class="col-12 mt-4 cgadmin-stats-text">
                                                        View <a href="{{ route('admin.user.index') }}">all users</a>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-md-6 col-xl-4">

                                            <div class="cgadmin-role-stats-container">

                                                <div class="cgadmin-role-stats cgadmin-image">

                                                    <div class="col-12 mt-4 cgadmin-db-heading">
                                                        <span class="cgadmin-count">{{ $role_count }}</span> Total Roles
                                                    </div>

                                                    <div class="col-12 mt-4 cgadmin-stats-text">
                                                        View <a href="{{ route('admin.role.index') }}">all roles</a>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-md-6 col-xl-4">

                                            <div class="cgadmin-permission-stats-container">

                                                <div class="cgadmin-permission-stats cgadmin-image">

                                                    <div class="col-12 mt-4 cgadmin-db-heading">
                                                        <span class="cgadmin-count">{{ $permission_count }}</span> Total
                                                        Permissions
                                                    </div>

                                                    <div class="col-12 mt-4 cgadmin-stats-text">
                                                        View <a href="{{ route('admin.permission.index') }}">all permissions</a>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            @else

                                <div class="col-12">
                                    <p>Whoops! We couldn't find any stats to display.</p>
                                </div>

                            @endif

                        </div>

                </div>

            </div>

        </div>

    </div>

@endsection

@section('footer')
    @include('admin.partials._footer')
@endsection
