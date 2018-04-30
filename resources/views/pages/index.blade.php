@extends('layouts.app')

@section('meta')
    <meta name="author" content="{{ config('site.owner') }}">
    <meta name="description" content="{{ config('site.title') }} {{ config('site.slogan') }} Laravel 5.5 starter project with ACL(Access Control List)">
@endsection

@section('title')
    <title>{{ config('site.title') }} | Home</title>
@endsection

@section('header')
    @include('partials._header')
@endsection

@section('navbar')
    @include('partials._navbar')
@endsection

@section('content')

    <div class="container-fluid">

        <div class="row mt-3">

            <div class="col-12">

                <div class="card">

                    <div class="card-body">

                        <h1 class="cgbg-heading">{{ config('site.title') }}</h1>

                        <div class="mt-4"></div>

                        <div class="col-12">

                            <p>
                                L56Starter is a Laravel 5.6.* starter project. The project aims to make it quicker to
                                scaffold out a new project that requires an ACL (access control list). The project has
                                a basic admin panel with the bare necessities installed to manage users, roles, and
                                permissions using the spatie/laravel-permission package.
                            </p>

                            <p>
                                L56Starter project also uses the Laravel auth scaffolding so everything is already in
                                place for user registration and login.
                            </p>

                            <p>
                                An account verification system is also in place to verify account users email address on
                                new account registration or email address change.
                            </p>

                            <p>
                                The project consists of Laravel 5.6 scaffold with
                                <a href="https://getbootstrap.com/">Twitter Bootstrap 4</a> for styling,
                                <a href="https://fontawesome.com/">FontAwesome 5</a> for font icons,
                                <a href="https://github.com/laracasts/flash">laracasts/flash</a> for flash messaging,
                                <a href="https://github.com/select2/select2">Select2</a> for multiple select form
                                fields,
                                <a href="https://github.com/mistic100/Bootstrap-Confirmation">mistic100/Bootstrap-Confirmation</a>
                                for confirm dialogs, and
                                <a href="https://github.com/spatie/laravel-permission">spatie/laravel-permission</a>
                                package for the roles and permissions management. The project uses css div tables for
                                the data layout NOT data tables. I tried to keep the project as small and as basic as
                                possible to give freedom of choosing how the web app will be structured and styled.
                            </p>

                            <p>
                                The project was setup to use Apache 2 web server with a document root of "public_html"
                                NOT "public" because I host all my web applications on a WHM / cPanel VPS. I am sure
                                with some minor tweaks the starter application could be used with other setups. Like
                                NGINX server for example.
                            </p>

                            <p>
                                To install clone the github project using git
                            </p>

                            <p class="text-success">
                                git clone git@github.com:RodShaffer/l56starter.git
                            </p>

                            <p>
                                Change to the l56starter directory and run
                            </p>

                            <p class="text-success">
                                composer install
                            </p>

                            <p>
                                Change permissions on the "bootstrap" and "storage" directories to make them write able.
                            </p>

                            <p class="text-success">
                                sudo chmod -R 777 ./bootstrap
                            </p>

                            <p class="text-success">
                                sudo chmod -R 777 ./storage
                            </p>

                            <p>
                                Set up a database and user, copy the ".env.example" file to ".env" and enter the database
                                connection info into the copied ".env" config file.
                            </p>

                            <p>
                                Change everything else in the ".env" config file that is appropriate.
                            </p>

                            <p class="text-warning">
                                Make sure to also update all appropriate "MAIL_" variables with your "mailtrap.io"
                                account settings in your applications ".env" config file if you would like to test the
                                account verification system.
                            </p>

                            <p class="text-warning">
                                Modify the appropriate information in "config/site.php" and "config/admin.php"
                            </p>

                            <p>
                                Then run
                            </p>

                            <p class="text-success">
                                php artisan key:generate
                            </p>

                            <p class="text-success">
                                Migrate the database ( php artisan migrate )
                            </p>

                            <p class="text-success">
                                Seed the database ( php artisan db:seed )
                            </p>

                            <p>
                                The database seeding will create three roles, one (admin) which is the main
                                administrator account for the site and therefore cannot be deleted through the admin
                                panel GUI, two (user) this is the normal user account role, and three (unverified)
                                which is the unverified user account role.
                            </p>

                            <p class="text-warning">
                                Please note: Both the "user" and "unverified" roles are required for the account
                                verification system to work correctly. When a new user registers on the site, or an
                                existing user changes their email address, the verification system, if need be, removes
                                the "user" role from the user, and assigns the "unverified" role to the user. When the
                                user successfully verifies their account the "unverified" role is removed and the "user"
                                role is re-assigned.
                            </p>

                            <p>
                                The seeding will also setup the base permissions that are required to manage users,
                                roles, permissions, and will create the main administrator account and also assign the
                                admin role to the newly created account. The admin user can then be used to create more
                                users, roles, and permissions.
                            </p>

                            <p class="text-success">
                                Default admin login email is
                            </p>

                            <p>
                                admin@domain.com
                            </p>

                            <p class="text-success">
                                Default admin password is
                            </p>

                            <p>
                                secret
                            </p>

                            <p class="text-success">
                                Run npm install OR yarn install
                            </p>

                            <p class="text-warning">
                                Add a .htaccess to the "public_html" folder so routes get rewritten properly if needed.
                                For an example look at "public_html\.htaccess.example" and replace "yourdomain.com" with
                                the domain name your using for your web application. The example .htaccess also
                                redirects all requests to "https" so if your not using https for what ever reason make
                                sure to also change the "https" to "http" right before "yourdomain.com"
                            </p>

                            <p>
                                Browse to
                            </p>

                            <p class="text-success">
                                http://yourappdomain/admin
                            </p>

                            <p>
                                OR
                            </p>

                            <p class="text-success">
                                https://yourappdomain/admin
                            </p>

                            <p>
                                to log into the admin panel
                            </p>

                            <p class="text-success">
                                Customizing the JavaScript and Styles
                            </p>

                            <p>
                                <u>For the normal site</u>
                            </p>

                            <p>
                                JavaScript and styles see "webpack.mix.site.js"<br>
                                Layout file used "resources/views/layouts/app.blade.php"
                            </p>

                            <p>
                                <u>For the admin panel</u>
                            </p>

                            <p>
                                JavaScript and styles see "webpack.mix.admin.js"<br>
                                Layout file used "resources/views/admin/layouts/app.blade.php"
                            </p>

                            <h3>Enjoy!</h3>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection

@section('page_footer')
    @include('partials._footer')
@endsection
