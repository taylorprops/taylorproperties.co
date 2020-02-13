@extends('layouts.landingpage')
@section('title')
Training | 100&#37; Commission Real Estate Brokerage | Taylor Properties
@endsection
@section('meta-description')
The best 100&#37; commission real estate brokerage licensed in Maryland, Washington DC, Virgina and Pennsylvania offering agents the best environment to earn and learn!
@endsection
@section('meta-keywords')
100 commission real estate brokerage maryland, 100&#37; commission real estate md, one hundred percent commission, 100 percent real estate broker, 100&#37; commission real estate maryland
@endsection
@section('content')
<div class="container">
<!-- Section: Blog v.1 -->
<section class="my-5">

  <!-- Section heading -->
  <h2 class="h1-responsive font-weight-bold text-center my-5">Agent Training</h2>
  <!-- Section description -->
  <p class="text-center w-responsive mx-auto mb-5">Everyone learns differently. Whether you like to read or listen online or prefer human interaction, Taylor Properties offers a variety of trainings to fit your learning style. </p>

  <!-- Grid row -->
  <div class="row">

    <!-- Grid column -->
    <div class="col-lg-5">

      <!-- Featured image -->
      <div class="view overlay rounded z-depth-2 mb-lg-0 mb-4">
        <img class="img-fluid" src="{{ asset('images/training-ondemand.jpeg')}}" alt="Training On-Demand">
      </div>

    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-lg-7">

      <!-- Post title -->
      <h3 class="font-weight-bold mb-3"><strong>Video On-Demand</strong></h3>
      <!-- Excerpt -->
      <p>Access our full library of training videos and webinars anytime, anywhere. Videos are added monthly and requests for topics are welcome.</p>

    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

  <hr class="my-5">

  <!-- Grid row -->
  <div class="row">

    <!-- Grid column -->
    <div class="col-lg-7">

      <!-- Post title -->
      <h3 class="font-weight-bold mb-3"><strong>In-Person</strong></h3>
      <!-- Excerpt -->
      <p>Need help with contracts? Have questions about marketing? Attend any of our free training sessions and bring your questions.</p>

    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-lg-5">

      <!-- Featured image -->
      <div class="view overlay rounded z-depth-2">
        <img class="img-fluid" src="{{ asset('images/in-person-training.jpeg')}}" alt="In-Person Training">
      </div>

    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

  <hr class="my-5">

  <!-- Grid row -->
  <div class="row">

    <!-- Grid column -->
    <div class="col-lg-5">

      <!-- Featured image -->
      <div class="view overlay rounded z-depth-2 mb-lg-0 mb-4">
        <img class="img-fluid" src="{{ asset('images/mentoring.jpeg')}}" alt="Mentoring">
      </div>

    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-lg-7">

      <!-- Post title -->
      <h3 class="font-weight-bold mb-3"><strong>Agent Mentoring</strong></h3>
      <!-- Excerpt -->
      <p>According to studies, about 75% of new Realtors quit in the first year. Why? We attribute this mainly to the type of help new agents are receiving. New agents are essentially starting their own small business. Having a mentor to learn from is essential for Realtors new to the industry. Taylor Properties will do everything in our power to match you with a mentor that can show you the ropes.</p>

    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

</section>
<!-- Section: Blog v.1 -->
</div>

@include('includes.getmore')

@endsection