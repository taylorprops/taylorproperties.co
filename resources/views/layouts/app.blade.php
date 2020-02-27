<!doctype html>
<html lang="{{ str_replace('_', '-', app() -> getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title','Taylor Properties | Buying and Selling Real Estate in DC, MD, VA and PA')</title>
        <meta name="Description" content="@yield('meta-description','Taylor Properties offers residential and commercial Real Estate services throughout Maryland, DC and Virginia. As one of the fastest growing Brokerages we have agents to cover any of you home buying needs from foreclosures to water front.')">
        <meta name="Keywords" content="@yield('meta-keywords','taylor properties, Real Estate Agents maryland, real estate company maryland, real estate agents maryland')">


        @yield('schema', View::make('includes.schema'))

        <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
        <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.1/css/all.css" integrity="sha384-TxKWSXbsweFt0o2WqfkfJRRNVaPdzXJ/YLqgStggBVRREXkwU7OKz+xXtqOU4u8+" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('addons/slider/css/lightbox.css') }}">
        <link rel="stylesheet" href="{{ asset('addons/cluster/MarkerCluster.css') }}">
        <link rel="stylesheet" href="{{ asset('addons/cluster/MarkerCluster.Default.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.css">

        @yield('css')

    </head>

    <body <?php if(stristr($_SERVER['REQUEST_URI'], 'listing_results')) { ?>style="overflow: hidden !important"
        <?php } ?>>

        <?php if(stristr($_SERVER['REQUEST_URI'], 'listing_results')) { ?>
            @include('includes.navbar-gp-search')
        <?php } else { ?>
            @include('includes.navbar-gp')
        <?php } ?>

        @yield('content')

        <?php if(!stristr($_SERVER['REQUEST_URI'], 'listing_results')) { ?>
        @include('includes.footer')
        <?php } ?>

        @include('includes.login_register_forms')
        @include('includes.share_form')

        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('addons/slider/js/lightbox.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js"></script>
        <script src="https://cdn.tiny.cloud/1/t3u7alod16y8nsqt07h4m5kwfw8ob9sxbvy2rlmrqo94zrui/tinymce/5/tinymce.min.js"></script>


        @yield('map_js')

        @yield('js')

    </body>

</html>