@extends('layouts.app')
@section('title', 'Buying a Home | Taylor Properties | Buying and Selling Real Estate in DC, MD, VA and PA')
@section('content')

<div class="page-container page-buy">
    <div class="container-fluid header">
        <div class="row">
            <div class="header-text">
                <h1>Home Buying Tips</h1>
                <p>When you imagine your dream home, what do you see? Size, location, lifestyle are all factors when envisioning your perfect home and all of those are important in how you feel once you walk through that front door. Having the right agent
                    makes all the difference in finding that perfect home. Taylor Properties has over 800 local agents serving the Maryland, Washington DC, Virginia and Pennsylvania regions.</p>
            </div>
        </div>
    </div>
    <section class="section mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <img alt="Do Your Research" class="img-fluid" src="{{ asset('images/research.jpg') }}" />
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 ml-auto d-flex align-items-center mt-4 mt-md-0">
                    <div>
                        <h2>Do Your Research</h2>
                        <p class="">Look online, at magazines and newspapers for houses you might be interested in. Make a note of those homes you see and how long they stay on the market. Also, note any changes in asking prices. This will give you a sense of the
                            housing trends in specific areas.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6 ml-auto d-flex align-items-center mt-4 mt-md-0 order2">
                    <div>
                        <h2>Find the Right Agent</h2>
                        <p class="">Real estate agents can provide you with helpful information on homes and neighborhoods that isn’t easily accessible to the public. Their knowledge of the home buying process, negotiating skills, and familiarity with the area you
                            want to live in can be extremely valuable. And best of all, it doesn’t cost you anything to use an agent – they’re compensated from the commission paid by the seller of the house. <a href="/realtors-near-me">Learn about our REALTOR&reg; Match Program and find the best agent for your needs!</a></p>
                    </div>
                </div>
                <div class="col-md-6 order1">
                    <div>
                        <img alt="Find the Right Agent" class="img-fluid" src="{{ asset('images/find-agent.jpg') }}" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <img alt="Qualify for a Mortgage" class="img-fluid" src="{{ asset('images/secure-financing.jpg') }}" />
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 ml-auto d-flex align-items-center mt-4 mt-md-0">
                    <div>
                        <h2>Secure Financing</h2>
                        <p class="">One of the most important steps in buying a home is getting financing. Before you even start searching for your dream home, talk to our in-house lender, <a href="https://heritagefinancial.com/" target="_blank">Heritage Financial</a>, to determine what you can afford and learn about what types of loans are available.
                            <!--a href="https://usmortgagecalculator.org/" target="_blank">See how much you can afford by using this mortage calculator.</a-->
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6 ml-auto d-flex align-items-center mt-4 mt-md-0 order2">
                    <div>
                        <h2>Shop and Make an Offer</h2>
                        <p class="">Start touring homes in your price range. Take notes on all the homes you visit. You will likely see a lot of houses! It can be hard to remember everything about them, so you might want to take pictures or video to help you remember
                            each home.</p>
                    </div>
                </div>
                <div class="col-md-6 order1">
                    <div>
                        <img alt="Shop and Make an Offer" class="img-fluid" src="{{ asset('images/house-showing.jpg') }}" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <img alt="Qualify for a Mortgage" class="img-fluid" src="{{ asset('images/home-inspection.jpg') }}" />
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 ml-auto d-flex align-items-center mt-4 mt-md-0">
                    <div>
                        <h2>Perform Due Diligence</h2>
                        <p class="">Upon a home inspection, your agent will provide you with improvements needed within your home (if any). This way you'll know what you are getting into before you complete the purchase. Knowing what work has and has not been done
                            to your home is important information to have in the buying process. Your main concern is the possibility of structural damage, which can come from water, shifting ground or poor construction.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6 ml-auto d-flex align-items-center mt-4 mt-md-0 order2">
                    <div>
                        <h2>Close and Celebrate</h2>

                        <p class="">You’ve found your dream home, your offer has been accepted, the financing is in place, and the inspection is complete. Now, there’s just one more key step in the process — closing! Prior to the closing date, expect to review the
                            list of fees and the terms and conditions of the contract. In addition, you'll need to know the amount that you'll need to bring to closing. Need help? Have questions? Contact our in-house title company, <a href="https://heritagetitlemd.com" target="_blank">Heritage Title</a>, today.</p>
                    </div>
                </div>
                <div class="col-md-6 order1">
                    <div>
                        <img alt="Close and Celebrate" class="img-fluid" src="{{ asset('images/signing-docs.jpg') }}" />
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