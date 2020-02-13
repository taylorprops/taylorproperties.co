<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title','Taylor Properties | Buying and Selling Real Estate in DC, MD, VA and PA')</title>
    <meta name="Description" content="@yield('meta-description','Taylor Properties offers residential and commercial Real Estate services throughout Maryland, DC and Virginia. As one of the fastest growing Brokerages we have agents to cover any of you home buying needs from foreclosures to water front.')">
    <meta name="Keywords" content="@yield('meta-keywords','taylor properties, Real Estate Agents maryland, real estate company maryland, real estate agents maryland')">


    @yield('schema', View::make('includes.schema'))

    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">

    @yield('css')
</head>
<body>

    @include('includes.landingpage_navbar')
    @yield('content')
    @include('includes.footer')

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    @yield('map_js')

    @yield('js')

</body>
</html>
