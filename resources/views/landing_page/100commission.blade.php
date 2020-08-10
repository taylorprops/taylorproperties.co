@extends('layouts.landingpage')

@section('title')
100&#37; Commission Real Estate Broker | Taylor Properties | Serving Maryland, Washington D.C., Virginia and Pennsylvania
@endsection

@section('meta-description')
The best 100&#37; commission real estate broker licensed in Maryland, Virgina, Washington D.C. and Pennsylvania offering agents the best environment to earn and learn!
@endsection

@section('meta-keywords')
100 commission real estate broker maryland, 100&#37; commission real estate brokerage, one hundred percent commission, 100 percent real estate broker, 100&#37; commission real estate maryland, best real estate broker
@endsection

@section('css')
<style type="text/css">

@media (max-width: 740px) {
#main-header {
  display: none;
}
}

</style>
@endsection

@section('content')

  <!-- Jumbotron -->
  <div id="main-header" class="card card-image" style="background-image: url(/images/careers2.jpg);">
    <div class="text-white text-center rgba-stylish-strong py-5 px-4">
      <div class="py-5">

        <!-- Content -->
        <h1 class="my-4 py-2 text-white font-weight-bold">100&#37; Commission Real Estate Brokerage</h1>
        <p class="mb-4 pb-2 px-md-5 mx-md-5 lead">Behind every great company, is great people. That is why, as an agent of Taylor Properties, you can count on a broker that will tap into your strengths, offer the training you need and give you all the tools to advance your career. We believe most people want more than a job in real estate; they want a rewarding career. Real estate offers you the flexibility to run your own business as you see fit with all the support you need from your broker, all while offering you an industry leading <strong>100% Commission</strong>.</p>

      </div>
    </div>
  </div>
  <!-- Jumbotron -->

  <!--Main layout-->
    <div class="container">

      <!-- Section: Features v.1 -->
      <section class="text-center my-5">

        <!-- Section heading -->
        <h2 class="h1-responsive font-weight-bold my-5"><span style="color: #212529">What Makes</span> <span class="text-primary">Taylor Great?</span></h2>
        <!-- Section description -->
        <p class="lead w-responsive mx-auto mb-5">Taylor Properties is a full-service real estate brokerage offering agents tools and support with the industry’s best commission plan.</p>

        <!-- Grid row -->
        <div class="row">

          <!-- Grid column -->
          <div class="col-md-4">

            <i class="far fa-sack-dollar fa-3x green-text"></i>
            <h5 class="font-weight-bold my-4">Flexible Commission Plans</h5>
            <p class="mb-md-0 mb-5">100% and 85% commission plans. Switch anytime at no cost. See what you get in each plan in the chart below.
            </p>

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4">

            <i class="fal fa-book-reader fa-3x blue-text"></i>
            <h5 class="font-weight-bold my-4">Effective Training</h5>
            <p class="mb-md-0 mb-5">Continual training is essential to all agents. We provide local training, webinars, video on demand, as well as mentoring for new agents.
            </p>

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4">

            <i class="far fa-life-ring fa-3x red-text"></i>
            <h5 class="font-weight-bold my-4">Quality Support</h5>
            <p class="mb-0">We genuinely care about your success. You will always have someone to answer questions, both in-person, online, or on call.
            </p>

          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row -->

      </section>
      <!-- Section: Features v.1 -->
    </div>

    <div class="page-container page-careers" style="margin-top: 0;">
      @include('includes.pricing_table')
    </div> 

    @include('includes.agent_testimonials')

    <!--Section: Not enough-->
    <section>
      <div class="container">
        <h2 class="mt-5 h3 text-center">Real Estate Teams</h2>
        <h5 class="text-center mb-5">Our high commission plans are designed to help you build a successful team and incentivizes high volume selling.</h5>

        <!--First row-->
        <div class="row features-small mb-5 mt-3 wow fadeIn">

          <!--First column-->
          <div class="col-md-4">
            <!--First row-->
            <div class="row">
              <div class="col-2">
                <i class="fas fa-check-circle fa-2x blue-text"></i>
              </div>
              <div class="col-10">
                <h6 class="feature-title">More leads, bigger pipeline and lead coverage</h6>
                <!--p class="grey-text">Our license is user-friendly. Feel free to use MDB for both private as well as commercial projects.
                </p-->
                <div style="height:15px"></div>
              </div>
            </div>
            <!--/First row-->

            <!--Second row-->
            <div class="row">
              <div class="col-2">
                <i class="fas fa-check-circle fa-2x blue-text"></i>
              </div>
              <div class="col-10">
                <h6 class="feature-title">Extra training and support</h6>
                <!--p class="grey-text">An impressive collection of flexible components allows you to develop any project.
                </p-->
                <div style="height:15px"></div>
              </div>
            </div>
            <!--/Second row-->

            <!--Third row-->
            <div class="row">
              <div class="col-2">
                <i class="fas fa-check-circle fa-2x blue-text"></i>
              </div>
              <div class="col-10">
                <h6 class="feature-title">Stability of income</h6>
                <!--p class="grey-text">Hundreds of useful, scalable, vector icons at your disposal.</p-->
                <div style="height:15px"></div>
              </div>
            </div>
            <!--/Third row-->

            <!--Fourth row-->
            <div class="row">
              <div class="col-2">
                <i class="fas fa-check-circle fa-2x blue-text"></i>
              </div>
              <div class="col-10">
                <h6 class="feature-title">Lower business expenses</h6>
                <!--p class="grey-text">It doesn't matter whether your project will be displayed on desktop, laptop, tablet or mobile phone. MDB
                  looks great on each screen.</p-->
                <div style="height:15px"></div>
              </div>
            </div>
            <!--/Fourth row-->
          </div>
          <!--/First column-->

          <!--Second column-->
          <div class="col-md-4 flex-center">
            <img src="{{ asset('/images/team.jpg') }}" alt="100 Commission Real Estate Brokerage" class="z-depth-0 img-fluid">
          </div>
          <!--/Second column-->

          <!--Third column-->
          <div class="col-md-4 mt-2">
            <!--First row-->
            <div class="row">
              <div class="col-2">
                <i class="fas fa-check-circle fa-2x blue-text"></i>
              </div>
              <div class="col-10">
                <h6 class="feature-title">Team Leader determines commission splits</h6>
                <!--p class="grey-text">Neat and easy to use animations, which will increase the interactivity of your project and delight your visitors.
                </p-->
                <div style="height:15px"></div>
              </div>
            </div>
            <!--/First row-->

            <!--Second row-->
            <div class="row">
              <div class="col-2">
                <i class="fas fa-check-circle fa-2x blue-text"></i>
              </div>
              <div class="col-10">
                <h6 class="feature-title">Full ownership over your team brand</h6>
                <!-- class="grey-text">Need inspiration? Use one of our predefined templates for free.</p-->
                <div style="height:15px"></div>
              </div>
            </div>
            <!--/Second row-->

            <!--Third row-->
            <div class="row">
              <div class="col-2">
                <i class="fas fa-check-circle fa-2x blue-text"></i>
              </div>
              <div class="col-10">
                <h6 class="feature-title">No Quotas</h6>
                <!--p class="grey-text">5 minutes, a few clicks and... done. You will be surprised at how easy it is.
                </p-->
                <div style="height:15px"></div>
              </div>
            </div>
            <!--/Third row-->

            <!--Fourth row-->
            <div class="row">
              <div class="col-2">
                <i class="fas fa-check-circle fa-2x blue-text"></i>
              </div>
              <div class="col-10">
                <h6 class="feature-title">Same Incentives as Individual Plans</h6>
                <!--p class="grey-text">Using MDB is straightforward and pleasant. Components flexibility allows you deep customization. You will
                  easily adjust each component to suit your needs.</p-->
                <div style="height:15px"></div>
              </div>
            </div>
            <!--/Fourth row-->
          </div>
          <!--/Third column-->

        </div>
        <!--/First row-->
      </div>

    </section>
    <!--Section: Not enough-->

  <!--Main layout-->

  @include('includes.getmore')
@endsection

