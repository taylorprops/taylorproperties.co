@extends('layouts.app')
@section('title', 'Selling Your Home | Taylor Properties | Buying and Selling Real Estate in DC, MD, VA and PA')
@section('content')
<div class="page-container page-sell">
    <div class="container-fluid header">
        <div class="row">
            <div class="header-text">
                <h1>Sell Your Home</h1>
                <p>Selling your home will likely be one of the biggest transactions of your life. Hiring the right agent will ensure a smooth process and relieve the stress selling your home can cause. Agents can create a broader exposure for your property, help you negotiate a better deal, utilize their knowledge in specialty situations and use their experience to ensure you are fully informed at all times.</p>
                <p>Real estate is an intensely-localized commodity. Taylor Properties is the largest independent real estate brokerage in Maryland and continues to grow with new agents joining from Maryland, DC, Virginia and Pennsylvania each day. <a href="/realtors-near-me">Let one of our agents take the stress of selling your home off your shoulders.</a></p>
            </div>
        </div>
    </div>
    <section class="section mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <img alt="Know your comps" class="img-fluid" src="{{ asset('images/neighborhood.jpg') }}" />
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 ml-auto d-flex align-items-center mt-4 mt-md-0">
                    <div>
                        <h2>Know your comps</h2>
                        <p class="">"Comps" or Comparables, are homes of similar size, condition, age, and style that recently sold in a certain neighborhood. Evaluating comparable homes and their prices can help determine a fair market value for a home. </p>
                        <p>Our real estate agents can help recommend home improvement options to have your new listing be more competitve and attractive to potential buyers. When you are ready to list, your agent might suggest the best time to put your home
                            on the market, price, or even contractors to help with painting, staging, and other ways to get your home sold at the best price.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6 ml-auto d-flex align-items-center mt-4 mt-md-0 order2">
                    <div>
                        <h2>Marketing</h2>
                        <p class="">Getting your home ready to sell in only half the battle. Getting your home in-front of many qualified buyers as possible is the other half. To ensure your home is viewed by as many Home Buyers as possible, Taylor Properties' listings are advertised on all Real Estate websites. No matter if a Buyer is on Zillow or the website of a small brokerage, your home will be displayed for all to see. <a href="/realtors-near-me">Let our agents market and find buyers to get your home sold today.</a></p>
                    </div>
                </div>
                <div class="col-md-6 order1">
                    <div>
                        <img alt="Marketing" class="img-fluid" src="{{ asset('images/curb-appeal.jpg') }}" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <img alt="Prioritize what's important" class="img-fluid" src="{{ asset('images/clean-house-interior.jpg') }}" />
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 ml-auto d-flex align-items-center mt-4 mt-md-0">
                    <div>
                        <h2>Prioritize what's important</h2>
                        <p class="">There are many simultaneous moving parts during the selling of your home. From staging and cleaning your house, to listing, marketing and scheduling open houses, you likely can't do it all. And if you try to, you will most likely be overwhelmed with everything going on. Working with an agent let's you concentrate on the things that are important and in your control such as cleaning your house and searching for your next home.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6 ml-auto d-flex align-items-center mt-4 mt-md-0 order2">
                    <div>
                        <h2>Get the best deal</h2>
                        <p class="">Our <a href="/about/partners">in-house title and financial consultants</a> can give you the best deal on any fees associated with the sale of your home (and the purchase of your next). Utilize our contacts to save you time, money and stress.</p>
                    </div>
                </div>
                <div class="col-md-6 order1">
                    <div>
                        <img alt="Shop and Make an Offer" class="img-fluid" src="{{ asset('images/happy-family-computer.jpg') }}" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    {{-- @include('flash::message') --}}
                    <h2 class="section-heading text-uppercase">Questions?</h2>
                    <h3 class="section-subheading text-muted">We are here to help, send us a message today!</h3>
                </div>
            </div>
            @include('includes.contactform_general')
        </div>
    </section>
</div>
@endsection