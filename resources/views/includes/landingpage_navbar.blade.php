<style type="text/css">
    li.nav-item:hover {
        background-color: $primary-color;
    }

    li.nav-item:hover a {
        color: #ffffff !important;
    }

    li.nav-item:hover a.dropdown-item {
        color: inherit !important;
    }

    .navbar.navbar-light .breadcrumb .nav-item.active>.nav-link,
    .navbar.navbar-light .navbar-nav .nav-item.active>.nav-link {
        background: transparent;
    }

    .dropdown .dropdown-menu .dropdown-item:hover,
    .dropdown .dropdown-menu .dropdown-item:active,
    .dropup .dropdown-menu .dropdown-item:hover,
    .dropup .dropdown-menu .dropdown-item:active,
    .dropleft .dropdown-menu .dropdown-item:hover,
    .dropleft .dropdown-menu .dropdown-item:active,
    .dropright .dropdown-menu .dropdown-item:hover,
    .dropright .dropdown-menu .dropdown-item:active {
        background-color: $primary-color !important;
    }
</style>
<!--Navbar -->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container" style="margin-bottom: 0;">
        <a class="navbar-brand" href="/100-commission-real-estate-broker">
            <img id="logo" src="{{ asset('images/logos/TaylorProperties-blackblue.png') }}" alt="Taylor Properties" style="max-width: 125px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
            <ul class="navbar-nav ml-auto">
                <!--li class="nav-item active">
          <a class="nav-link" href="#">Home
            <span class="sr-only">(current)</span>
          </a>
        </li-->
                <li class="nav-item">
                    <a class="nav-link" href="/100-commission-real-estate-broker#plans">Plans</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/100-commission-real-estate-broker/real-estate-classes">Education</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="/about" target="_blank">About Us</a>
                        <a class="dropdown-item" href="/100-commission-real-estate-broker/commission-calculator">Commission Calculator</a>
                        <a class="dropdown-item" href="/100-commission-real-estate-broker/faqs">FAQs</a>
                        <a class="dropdown-item" href="/100-commission-real-estate-broker/testimonials">Testimonials</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-4" href="/join" style="background-color: #e7bd70;color: #ffffff !important;font-weight: bold;border-radius: 0.125rem;letter-spacing: 2px;">JOIN</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--/.Navbar -->