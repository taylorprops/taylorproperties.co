<!doctype html>
<html lang="{{ str_replace('_', '-', app() -> getLocale()) }}">
<head>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-W45BXL7');</script>
    <!-- End Google Tag Manager -->

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
<body style="padding-left: 0 !important; padding-right: 0 !important">

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W45BXL7" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

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
