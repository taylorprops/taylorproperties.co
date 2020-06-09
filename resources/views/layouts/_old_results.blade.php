<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <meta name="Description" content="Taylor Properties offers residential and commercial Real Estate services throughout Maryland, DC and Virginia. As one of the fastest growing Brokerages we have agents to cover any of you home buying needs from foreclosures to water front.">



    <meta name="Keywords" content="taylor properties, Real Estate Agents maryland, real estate company maryland, real estate agents maryland">

    @yield('schema', View::make('includes.schema'))

    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('addons/slider/css/lightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('addons/cluster/MarkerCluster.css') }}">
    <link rel="stylesheet" href="{{ asset('addons/cluster/MarkerCluster.Default.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.css">


</head>
<body class="results-body" >

    @include('includes.navbar')
    @yield('content')

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('addons/slider/js/lightbox.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js"></script>



    @yield('map_js')

    @yield('js')

</body>
</html>
