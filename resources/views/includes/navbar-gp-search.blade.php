<style>
.nav-item{
    padding: 0 2px;
}
@media only screen and (max-width: 767px) {
    #logo {
        content: url('/images/logos/logo-horizantal-white.png') !important;
    }
}
</style>

<div class="container">
    <div class="row">
    <!--Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top scrolling-navbar main-nav p-0 p-lg-4">
        <a class="navbar-brand" href="/">
            <img id="logo" src="{{ asset('images/logos/logo-horizantal-white.png') }}" alt="Taylor Properties" width="150">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_collapse" aria-controls="navbar_collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar_collapse">
            <ul class="navbar-nav ml-auto p-4 p-lg-2">
                <li class="nav-item {{ (Request::is('')) ? 'active' : '' }}">
                    <a class="nav-link text-white" href="/">Home Search</a>
                </li>
                <li class="nav-item {{ (Request::is('buying-a-home')) ? 'active' : '' }}">
                    <a class="nav-link text-white" href="/buying-a-home">Buying</a>
                </li>
                <li class="nav-item {{ (Request::is('sell-my-house')) ? 'active' : '' }}">
                    <a class="nav-link text-white" href="/sell-my-house">Selling</a>
                </li>
                <li class="nav-item {{ (Request::is('agents')) ? 'active' : '' }}">
                    <a class="nav-link text-white" href="/agents">Find an Agent</a>
                </li>

                <li class="nav-item {{ (Request::is('careers')) ? 'active' : '' }}">
                    <a class="nav-link text-white" href="/careers">Careers</a>
				</li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/about/partners">Title</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/about/partners#mortgage">Mortgage</a>
                </li>
				<li class="nav-item dropdown {{ (Request::is('about*')) ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle text-white" href="/about" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="/about">About Us</a>
                        <a class="dropdown-item" href="/about/our-staff">Our Staff</a>
                        <a class="dropdown-item" href="/about/offices">Offices</a>
                        <a class="dropdown-item" href="/about/partners">Partners</a>
                        <a class="dropdown-item" href="/contact-us">Contact</a>
                        <a class="dropdown-item" href="/what-is-my-home-worth">Home Value Estimator</a>
                        <a class="dropdown-item" href="/realtors-near-me">Realtor Match Program</a>
                    </div>
                </li>
                <!--li class="nav-item">
                    <a  class="nav-link text-white" href="tel:8005900925"><i class="fas fa-phone"></i> 800-590-0925</a>
                </li-->
                <li>
                    <div class="nav-login mt-2 ml-3" id="nav_logged">
                        @if(Auth::check())
                        <div id="nav_logged_in">
                            <a href="/dashboard" class="mb-n2 text-white"><i class="fal fa-user-circle mr-2"></i> My Account</a><br>
                            <a href="{{ url('/logout') }}" class="yellow-text"><small><i class="fal fa-sign-out mr-2"></i> Logout </small></a>
                        </div>
                        @else
                        <div id="nav_not_logged_in">
                            <a href="javascript: void(0)" class="open-login text-white">Log In | My Account</a>
                        </div>
                        @endif
                    </div>
                </li>
            </ul>

        </div>
    </nav>
</div>
</div>
<!--/.Navbar -->

<script>
document.addEventListener("DOMContentLoaded", function(){

    if ($(window).width() > 767){
        $(window).scroll(function() {
            var value = $(this).scrollTop();
            if (value > 100)
                $("#logo").attr("src", '/images/logos/logo-horizantal-white.png');
            else if (value < 100)
                $("#logo").attr("src", '/images/logos/TaylorProperties-white.png');
        });
    }

    if ($(window).width() < 767){
        $("#logo").attr("src", '/images/logos/logo-horizantal-white.png');
    }

});
</script>