@extends('layouts.app')
{{--@section('title', 'Taylor Properties | Buying and Selling Real Estate in DC, MD, VA and PA')--}}
@section('content')
<style>
.input-group.md-form.form-sm.form-2 input.white-border  {
    border: 1px solid #ffffff;
    background-color: #ffffff;
}
.input-group.md-form.form-sm.form-2 input {
    border: 1px solid #bdbdbd;
    border-top-left-radius: 0.25rem;
    border-bottom-left-radius: 0.25rem;
}
.intro-text {
    text-align: center;
    width: 70%;
    margin: 0 auto;
}

@media (max-width: 992px) {
.intro-text {
    width: 100%;
}
}
</style>

<main role="main">
    <!-- Jumbotron -->
    <div class="card card-image" style="background-image: url(/images/taylorprops-hero.jpeg);">
        <div class="text-white text-center rgba-stylish-light py-5 px-4" style="border-radius: 0;">
            <div class="py-5" style="max-width: 50em;margin: 0 auto;">
                <!-- Content -->
                <h2 class="h2 my-4 py-2">LOVE YOUR HOME</h2>
                <p class="mb-4 pb-2 px-md-5 mx-md-5">We’ll help you find a place you’ll love.</p>
                <div class="input-group md-form form-sm form-2 pl-0">
                  <input class="form-control my-0 py-1 white-border" type="text" placeholder="Enter an address, neighborhood, city, or ZIP code" aria-label="Search">
                  <div class="input-group-append">
                    <span class="input-group-text orange" id="basic-text1"><i class="fas fa-search text-white" aria-hidden="true"></i></span>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jumbotron -->
    <div class="container" style="margin-top: 75px;">
        <div class="row-fluid">
            <div class="intro-text">
                <p class="intro-open" style="font-size: 1.2rem;">They say "home is where the heart is" and we know that finding the perfect home can be a daunting task. You need an experienced partner who knows the neighborhoods, the market and the process. At Taylor Properties, we understand that we are not only selling or buying your home. It is much more than that.</p>
                <p class="intro-close text-primary" style="font-size: 1.4rem;font-family: 'Merriweather', serif;font-weight: 700;">Taylor&nbsp;Properties. Love&nbsp;your&nbsp;home.</p>
            </div>
        </div>
    </div>

    <div style="background-color: #e7ecef;">
        <div class="container" style="padding-top: 1.5rem;">
            <div class="row">
                <section>

                    <!-- Grid row -->
                    <div class="row mx-1">

                      <!-- Grid column -->
                      <div class="col-md-6 mb-4">

                        <!-- Card -->
                        <div class="card card-image" style="background-image: url(/images/find-home.jpg);">

                          <!-- Content -->
                          <div class="text-white text-center d-flex align-items-center rgba-blue-strong py-5 px-4">
                            <div>
                              <h3 class="pt-2 text-white"><strong>Find Your New Home</strong></h3>
                              <p>Search for your perfect home today. Browse all the current real estate listings. Filter your search by price, bedrooms, bathrooms, square footage and more! No matter what your requirements, we will find the right home for you!</p>
                              <a class="btn btn-deep-orange waves-effect waves-light"><i class="fas fa-search left"></i> Search Homes</a>
                            </div>
                          </div>

                        </div>
                        <!-- Card -->

                      </div>
                      <!-- Grid column -->

                      <!-- Grid column -->
                      <div class="col-md-6 mb-4">

                        <!-- Card -->
                        <div class="card card-image" style="background-image: url(/images/find-agent.jpg);">

                          <!-- Content -->
                          <div class="text-white text-center d-flex align-items-center rgba-blue-strong py-5 px-4">
                            <div>
                              <h3 class="pt-2 text-white"><strong>Search Local Agents</strong></h3>
                              <p>Having the right agent makes all the difference in finding that perfect home. Taylor Properties has over 800 local agents serving the Washington D.C., Maryland, Virginia and Pennsylvania regions.</p>
                              <a class="btn btn-deep-orange waves-effect waves-light"><i class="fas fa-search left"></i> Search Agents</a>
                            </div>
                          </div>

                        </div>
                        <!-- Card -->

                      </div>
                      <!-- Grid column -->

                    </div>
                    <!-- Grid row -->

                  </section>
            </div>
        </div>
    </div>
    @include('includes.featured_listings')
</main>
@endsection
@section('js')
@endsection