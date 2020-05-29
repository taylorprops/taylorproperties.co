@extends('layouts.landingpage')
@section('title', 'Top REALTORs Near Me | REALTOR Match Program | Taylor Properties')
@section('meta-description')
Get matched with a top REALTOR&reg; that specializes in your local area with training and experience tailored to your specific needs. Fill out the form to get started with our personalized Realtor Match Program!
@endsection
@section('meta-keywords')
best real estate agent near me, realtors near me, real estate agents near me
@endsection
@section('css')
<style type="text/css">
    /* Required for full background image */
    html,
    body,
    header,
    .view {
        height: 100%;
    }
    h6 {
        line-height: 1.7;
    }
    nav {
        display: none !important;
    }
    p {
      font-size: 20px;
    }
    .btn {
      font-size: 1rem;
      font-weight: bold;
    }
    #intro {
        background-image: url('https://www.taylorproperties.co/images/taylorprops-hero.jpeg'),linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,.5));
        background-repeat: no-repeat;
        background-size: cover;
        background-blend-mode: overlay;
    }
    @media (max-width: 740px) {
        html,
        body,
        header,
        .view {
            height: 1100px;
        }
        body {
            padding: 0 !important;
        }
    }
    @media (min-width: 800px) and (max-width: 850px) {
        html,
        body,
        header,
        .view {
            height: 700px;
        }
    }
</style>
@endsection
@section('content')
<!--Main layout-->
<main>
    <div id="intro" class="container-full mb-0">
        <!--Grid row-->
                <div class="row wow fadeIn" style="margin: 0 15px; align-items: center; padding: 15px 0;">
                    <!--Grid column-->
                    <div id="hero" class="col-md-6 mb-4 white-text text-center text-md-left">
                        <h1 class="font-weight-bold">REALTOR&reg; Match Program</h1>
                        <hr class="hr-light">
                        <p>
                            <strong>Thinking of buying, selling or renting a home soon? Find the perfect agent for your Real Estate needs.</strong>
                        </p>
                        <p>
                            <strong>Get matched with a top REALTOR&reg; that specializes in your local area with training and experience tailored to your specific needs. Fill out the form to get started with our personalized Realtor Match Program!</strong>
                        </p>
                    </div>
                    <!--Grid column-->
                    <!--Grid column-->
                    <div class="col-md-6 mb-4">
                        <!--Card-->
                        <div class="card">
                            <!--Card content-->
                            <div class="card-body">
                                <!-- Form -->
                                <form id="contact_form">

                                    <!-- Heading -->
                                    <p style="text-align: center;"><img src="https://www.taylorproperties.co/images/logos/TaylorProperties-blackblue.png" alt="Taylor Properties" style="max-width: 125px; margin: 0 auto; text-align: center;"></p>
                                    <hr>
                                    <div class="md-form">
                                        <i class="fas fa-user prefix grey-text"></i>
                                        <input type="text" id="name" name="name" class="form-control" required="required">
                                        <label for="name">Your name *</label>
                                    </div>
                                    <div class="md-form">
                                        <i class="fas fa-envelope prefix grey-text"></i>
                                        <input type="email" id="email" name="email" class="form-control" required="required">
                                        <label for="email">Your email *</label>
                                    </div>
                                    <div class="md-form">
                                        <i class="fas fa-phone prefix grey-text"></i>
                                        <input type="tel" id="phone" name="phone" class="form-control phone" required="required">
                                        <label for="phone">Your phone *</label>
                                    </div>
                                    <!--Textarea with icon prefix-->
                                    <div class="md-form">
                                        <i class="fas fa-pencil prefix grey-text"></i>
                                        <textarea type="text" id="message" name="message" class="md-textarea form-control" rows="3" required></textarea>
                                        <label for="message">Your message *</label>
                                    </div>
                                    <div class="text-center mt-3">
                                        <button id="contact_form_submit" class="btn btn-secondary waves-effect waves-light" type="submit">Get Started</button>
                                    </div>
                                    <input type="hidden" id="type" name="type" value="realtor_match">

                                </form>
                                <!-- Form -->
                            </div>
                        </div>
                        <!--/.Card-->
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
    </div>
    <div class="container">
        <!--Section: Main info-->
        <section class="wow fadeIn">
            <!--Grid row-->
            <div class="row">
                <!-- Section: Testimonials v.3 -->
                <section class="team-section text-center px-3">
                    <!-- Section heading -->
                    <h2 class="h1-responsive font-weight-bold my-5">WHAT OUR CLIENTS THINK</h2>
                    <!-- Section description -->
                    <p class="dark-grey-text w-responsive mx-auto mb-4">After working with a Realtor Match recommended real estate agent, we ask our clients for feedback on their experience so we can better serve future homebuyers and sellers by ensuring we make the best connections. Here’s what they have to say:</p>
                    <!--Grid row-->
                    <div class="row text-center">
                        <!--Grid column-->
                        <div class="col-md-4 mb-md-0 mb-5">
                            <div class="testimonial">
                                <!--Content-->
                                <h4 class="font-weight-bold dark-grey-text mt-4">Gina Moore</h4>
                                <p class="font-weight-normal dark-grey-text">
                                    <i class="fas fa-quote-left pr-2"></i>I worked with 4 agents but they did not work in my best interest. I then went to Taylor to work with Glenda and she took excellent care of me! I closed on a beautiful condo 5/9/17. She was patient and understanding of my needs, she took me out to see the unit, she was very thorough and walked me through every step of the way with the home buying process. I am so glad that God lead me to this AWSOME WOMAN!</p>
                                <!--Review-->
                                <div class="orange-text">
                                    <i class="fas fa-star"> </i>
                                    <i class="fas fa-star"> </i>
                                    <i class="fas fa-star"> </i>
                                    <i class="fas fa-star"> </i>
                                    <i class="fas fa-star"> </i>
                                </div>
                            </div>
                        </div>
                        <!--Grid column-->
                        <!--Grid column-->
                        <div class="col-md-4 mb-md-0 mb-5">
                            <div class="testimonial">
                                <!--Content-->
                                <h4 class="font-weight-bold dark-grey-text mt-4">Chris Barnes</h4>
                                <p class="font-weight-normal dark-grey-text">
                                    <i class="fas fa-quote-left pr-2"></i>My endless thanks to Taylor Properties and agent Kimberly Morse for how well the recent sale of my Piney Orchard condo went. Kim truly went above and beyond for me. I'm so lucky to have had her as my agent! Thanks again Kim!!</p>
                                <!--Review-->
                                <div class="orange-text">
                                    <i class="fas fa-star"> </i>
                                    <i class="fas fa-star"> </i>
                                    <i class="fas fa-star"> </i>
                                    <i class="fas fa-star"> </i>
                                    <i class="fas fa-star"> </i>
                                </div>
                            </div>
                        </div>
                        <!--Grid column-->
                        <!--Grid column-->
                        <div class="col-md-4">
                            <div class="testimonial">
                                <!--Content-->
                                <h4 class="font-weight-bold dark-grey-text mt-4">Wanda Wheeler</h4>
                                <p class="font-weight-normal dark-grey-text">
                                    <i class="fas fa-quote-left pr-2"></i>Being first time buyers can be overwhelming but Phil and Blake has been great realtors. They were always available always able to answer any questions and explained everything step by step. They always kept in touch and let us know exactly what was going on. Never rushed us or try to force us into any house. We were very comfortable working with them definitely took the edge off and made this a great experience!!!</p>
                                <!--Review-->
                                <div class="orange-text">
                                    <i class="fas fa-star"> </i>
                                    <i class="fas fa-star"> </i>
                                    <i class="fas fa-star"> </i>
                                    <i class="fas fa-star"> </i>
                                    <i class="fas fa-star"> </i>
                                </div>
                            </div>
                        </div>
                        <!--Grid column-->
                    </div>
                    <!--Grid row-->
                    <div class="row mt-4">
                        <a href="#" class="btn btn-secondary" style="margin: 0 auto;">Find An Agent</a>
                    </div>
                </section>
                <!-- Section: Testimonials v.3 -->
            </div>
            <!--Grid row-->
        </section>
        <!--Section: Main info-->
        <hr class="my-5">
        <!--Section: Main features & Quick Start-->
        <section>
            <h2 class="h1-responsive font-weight-bold mt-5 mb-3 text-center">HOW OUR MATCH PROGRAM WORKS</h2>
            <p class="text-center mb-5">Our REALTOR Match Program will match you with one of Taylor Properties' 800+ in-house professionals in Maryland, Washington D.C. or Virginia, ready to help you buy, sell, or rent a home. Our real estate agents are thoroughly vetted and are chosen to help our clients based on experience.</p>
            <!--Grid row-->
            <!--div class="row wow fadeIn">
 
                <div class="col-12">
                    <h5 class="feature-title">All you have to do to get started is to fill out our quick form. We take care of the rest.</h5>
                    <p class="">Our REALTOR Match Program will match you with one of Taylor Properties' 800+ in-house professionals in Maryland, Washington D.C. or Virginia, ready to help you buy, sell, or rent a home. Our real estate agents are thoroughly vetted and are chosen to help our clients based on experience.</p>
                    <p class="">The biggest concern working with a real estate agent is not knowing which one to trust, which one will look out for your best interests, and which one knows your area inside and out. We’re committed to finding you the best agent who knows exactly how to help you with your specific real estate needs.
                    </p>
                    <p>Taylor Properties provides this service to buyers, sellers, and renters entirely for FREE. We want to make sure that everyone has access to top-notch real estate advice from a local professional so that your decisions are informed and your best interests are looked after. We will never send your information to a third party.</p>
                </div>
                <div class="col-md-12" style="margin: 0 auto; text-align: center;">
                    <a href="#" class="btn btn-secondary" style="margin: 0 auto;">Match With An Agent</a>
                </div>
            </div-->
            <!--/Grid row-->
            <div class="row text-center d-flex justify-content-center">
                  <div class="col-lg-3 col-md-6 mb-lg-0 mb-5">
                    <i class="fas fa-search-location fa-3x mb-4" style="color: #084972 !important;"></i>
                    <h4 class="font-weight-bold mb-4">Tell us what you're looking for</h4>
                    <p class="text-muted px-2 mb-lg-0">
                      Share a few details about your home buying or selling scenario. You'll be done in a minute and we'll get started immediately.
                    </p>
                  </div>
                  <div class="col-lg-3 col-md-6 mb-lg-0 mb-5">
                    <i class="fas fa-comments-alt fa-3x mb-4" style="color: #084972 !important;"></i>
                    <h4 class="font-weight-bold mb-4">Talk with an expert matchmaker</h4>
                    <p class="text-muted px-2 mb-lg-0">
                      First-time buyer? Selling a home? Moving to a new city? Investing? An experienced Taylor Properties concierge will build your profile via phone or text at your convenience.
                    </p>
                  </div>
                  <div class="col-lg-3 col-md-6 mb-md-0 mb-5">
                    <i class="far fa-chart-network fa-3x mb-4" style="color: #084972 !important;"></i>
                    <h4 class="font-weight-bold mb-4">Let us do the legwork</h4>
                    <p class="text-muted px-2 mb-md-0">
                      Don't sift through or interview 20 agents to see who's qualified. We'll provide a local agent that best suits your needs. If you'd like to interview multiple agents, just let us know!
                    </p>
                  </div>
                  <div class="col-lg-3 col-md-6 mb-md-0 mb-5">
                    <i class="fas fa-handshake fa-3x mb-4" style="color: #084972 !important;"></i>
                    <h4 class="font-weight-bold mb-4">You meet your match</h4>
                    <p class="text-muted px-2 mb-md-0">
                      We'll set up a conversation with your licensed agent so you can get your home listed or go see that new drewam home in-person. It's that easy! And the best part, it's free!
                    </p>
                  </div>
            </div>
        </section>
        <!--Section: Main features & Quick Start-->
    </div>

    <!-- Jumbotron -->
    <div class="card card-image">
      <div class="text-white text-center rgba-stylish-strong py-5 px-4" style="border-radius: 0px; background-color: #f1945c;}">
        <div class="col-md-8 py-5" style="margin: 0 auto;">

          <!-- Content -->
          <h2 class="h1-responsive font-weight-bold mb-4" style="color: #fff; text-align: center; font-size: 3rem;">We'll match you with the perfect agent. Ready to go?</h2>
          <!--h2 class="card-title h2 my-4 py-2">Jumbotron with image overlay</h2-->
          <a class="btn btn-white waves-effect waves-light" style="color: #e76632; font-weight: bold;" href="#">Get Started</a>

        </div>
      </div>
    </div>
    <!-- Jumbotron -->

</main>
<!--Main layout-->
@endsection