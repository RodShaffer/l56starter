<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Meta Tag Marker - extra meta tags if needed like meta description for example. -->
@yield('meta')

<!-- Page Title Marker - since every page will have a different page title. -->
@yield('title')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700" rel="stylesheet" type="text/css">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="/favicon/admin/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/favicon/admin/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/favicon/admin/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/favicon/admin/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/favicon/admin/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/favicon/admin/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/favicon/admin/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/favicon/admin/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/admin/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/favicon/admin/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/admin/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon/admin/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/admin/favicon-16x16.png">
    <link rel="manifest" href="/favicon/admin/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/favicon/admin/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

<!-- Admin specific css -->
    <link href="{{ asset('css/admin/admin.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<!-- Page Header Marker - header at the top of every page -->
@yield('header')

<!-- Nav Bar Marker - the site navigation bar -->
@yield('navbar')

<!-- Page Content Marker - the page content goes here -->
@yield('content')

<!-- Page Footer Marker - footer at the bottom of every page -->
@yield('footer')

<!-- Admin Panel Scripts -->
<script src="{{ asset('js/admin/admin.js') }}"></script>

<!-- Script (extra scripts if needed) -->
@yield('script')

<script>

    /* Set the delay and animation for our flash messages */
    $('div.alert').not('.alert-danger').delay(4000).fadeOut(350);

</script>

</body>
</html>