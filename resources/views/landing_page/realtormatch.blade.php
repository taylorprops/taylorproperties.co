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
#hero {
  padding-top: 3em;
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
h6 {
line-height: 1.7;
}
nav {
  display: none !important;
}
</style>
@endsection
@section('content')

  <!-- Full Page Intro -->
  <div class="view full-page-intro" style="background-image: url('https://www.taylorproperties.co/images/taylorprops-hero.jpeg'); background-repeat: no-repeat; background-size: cover;">

    <!-- Mask & flexbox options-->
    <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

      <!-- Content -->
      <div class="container">

        <!--Grid row-->
        <div class="row wow fadeIn">

          <!--Grid column-->
          <div id="hero" class="col-md-6 mb-4 white-text text-center text-md-left">
            
            <h1 class="display-4 font-weight-bold">REALTOR&reg; Match Program</h1>

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
          <div class="col-md-6 col-xl-5 mb-4">

            <!--Card-->
            <div class="card">

              <!--Card content-->
              <div class="card-body">

                <!-- Form -->
                <form name="">
                  <!-- Heading -->
                  <img id="logo" src="https://www.taylorproperties.co/images/logos/TaylorProperties-blackblue.png" alt="Taylor Properties" style="max-width: 125px; margin: 0 auto; text-align: center;">
                  <hr>

                  <form id="contact_form">
                        @csrf
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
                          <button id="contact_form_submit" class="btn btn-secondary waves-effect waves-light" type="submit">Send <i class="fal fa-share"></i></button>
                              </div>
                              <input type="hidden" id="type" value="buy_sell">
                      </form>

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
      <!-- Content -->

    </div>
    <!-- Mask & flexbox options-->

  </div>
  <!-- Full Page Intro -->

  <!--Main layout-->
  <main>
    <div class="container">

      <!--Section: Main info-->
      <section class="wow fadeIn">

        <!--Grid row-->
        <div class="row">

          <!-- Section: Testimonials v.3 -->
<section class="team-section text-center my-5">

  <!-- Section heading -->
  <h2 class="h1-responsive font-weight-bold my-5">WHAT OUR CLIENTS THINK</h2>
  <!-- Section description -->
  <p class="dark-grey-text w-responsive mx-auto mb-5">After working with a Realtor Match recommended real estate agent, we ask our clients for feedback on their experience so we can better serve future homebuyers and sellers by ensuring we make the best connections. Here’s what they have to say:</p>

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

        <h3 class="h3 text-center mb-5">HOW OUR MATCH PROGRAM WORKS</h3>

        <!--Grid row-->
        <div class="row wow fadeIn">


            <!--First row-->
              <div class="col-12">
                <h5 class="feature-title">All you have to do to get started is to fill out our quick form. We take care of the rest.</h5>
                <p class="">Our REALTOR Match Program will match you with one of Taylor Properties' 800+ in-house professionals in Maryland, Washington D.C. or Virginia, ready to help you buy, sell, or rent a home. Our real estate agents are thoroughly vetted and are chosen to help our clients based on experience.</p>
                <p class="">The biggest concern working with a real estate agent is not knowing which one to trust, which one will look out for your best interests, and which one knows your area inside and out. We’re committed to finding you the best agent who knows exactly how to help you with your specific real estate needs.
                </p>
                <p>Taylor Properties provides this service to buyers, sellers, and renters entirely for FREE. We want to make sure that everyone has access to top-notch real estate advice from a local professional so that your decisions are informed and your best interests are looked after. We will never send your information to a third party.</p>
              </div>
            <!--/First row-->          
          
          <div class="col-md-12" style="margin: 0 auto; text-align: center;">
    
            <a href="#" class="btn btn-secondary" style="margin: 0 auto;">Match With An Agent</a>
          </div>

        </div>
        <!--/Grid row-->

      </section>
      <!--Section: Main features & Quick Start-->   

    </div>

    <section id="contact" style="background: #efefef;">
        <div class="container mt-4 mb-0 pb-5">
            <div class="row">
                <div class="col-lg-12 text-center pt-5">
                    {{-- @include('flash::message') --}}
                    <h2 class="section-heading text-uppercase">Questions?</h2>

                    <h3 class="section-subheading text-muted">We are here to help, send us a message today!</h3>
                </div>
            </div>
            @include('includes.contactform_general')
        </div>
    </section>
  </main>
  <!--Main layout-->

@endsection

