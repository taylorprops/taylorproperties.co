@extends('layouts.landingpage')
@section('title')
FAQs | 100&#37; Commission Real Estate Brokerage | Taylor Properties
@endsection
@section('meta-description')
Frequently asked questions of the best 100&#37; commission real estate brokerage licensed in Maryland, Washington DC, Virgina and Pennsylvania offering agents the best environment to earn and learn!
@endsection
@section('meta-keywords')
100 commission real estate brokerage maryland, 100&#37; commission real estate, one hundred percent commission, 100 percent real estate broker, 100&#37; commission real estate maryland
@endsection
@section('css')
<style type="text/css">
	.md-accordion .card .card-header a {
		color: #fff;
	}

	.md-accordion .card .card-header {
	    border-bottom: 1px solid #fff !important;
	    background: #00263d !important;
	}
	.md-accordion .card .card-body {
	    font-size: 1rem !important;
	    color: #000 !important;
	}
	.card:last-child {
		border-bottom: none;
	}
	.card {
		height: auto !important;
	}
</style>@endsection
@section('content')
<div class="container mt-5">
	<div class="row">
		<!--Accordion wrapper-->
		<div class="col-md-12 accordion md-accordion" id="accordionEx1" role="tablist" aria-multiselectable="true">
			<!-- Accordion card -->
			<div class="card">
				<!-- Card header -->
				<div class="card-header" role="tab" id="headingTwo1">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseTwo1" aria-expanded="false" aria-controls="collapseTwo1">
						<h5 class="mb-0">
							Are there any Admin Costs? <i class="fas fa-angle-down rotate-icon"></i>
						</h5>
					</a>
				</div>
				<!-- Card body -->
				<div id="collapseTwo1" class="collapse" role="tabpanel" aria-labelledby="headingTwo1" data-parent="#accordionEx1">
					<div class="card-body">
						For purchases and sales, there is a $395 administrative fee paid by the client. For referrals and rentals, the admin fee is $89.
					</div>
				</div>
			</div>
			<!-- Accordion card -->
			<!-- Accordion card -->
			<div class="card">
				<!-- Card header -->
				<div class="card-header" role="tab" id="headingTwo2">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseTwo21" aria-expanded="false" aria-controls="collapseTwo21">
						<h5 class="mb-0">
							Is there a commission cap? <i class="fas fa-angle-down rotate-icon"></i>
						</h5>
					</a>
				</div>
				<!-- Card body -->
				<div id="collapseTwo21" class="collapse" role="tabpanel" aria-labelledby="headingTwo21" data-parent="#accordionEx1">
					<div class="card-body">
						No! Unlike many other 100% Commission Real Estate Brokers, we do not require any caps before you are able to get your 100%. Just pay your monthly fee of $49 and you get 100% on every sale!
					</div>
				</div>
			</div>
			<!-- Accordion card -->
			<!-- Accordion card -->
			<div class="card">
				<!-- Card header -->
				<div class="card-header" role="tab" id="headingThree31">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseThree31" aria-expanded="false" aria-controls="collapseThree31">
						<h5 class="mb-0">
							What other costs will I incur or be responsible for?<i class="fas fa-angle-down rotate-icon"></i>
						</h5>
					</a>
				</div>
				<!-- Card body -->
				<div id="collapseThree31" class="collapse" role="tabpanel" aria-labelledby="headingThree31" data-parent="#accordionEx1">
					<div class="card-body">
						E&O Insurance is $340 for the year, which we take in two payments of $170. 
						There are no startup or desk fees.
						You will be responsible for your own marketing costs (signs, printing, business cards, etc.)
					</div>
				</div>
			</div>
			<!-- Accordion card -->
			<!-- Accordion card -->
			<div class="card">
				<!-- Card header -->
				<div class="card-header" role="tab" id="headingFive51">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseFive51" aria-expanded="false" aria-controls="collapseFive51">
						<h5 class="mb-0">
							Do you offer agent websites and/or CRM system? <i class="fas fa-angle-down rotate-icon"></i>
						</h5>
					</a>
				</div>
				<!-- Card body -->
				<div id="collapseFive51" class="collapse" role="tabpanel" aria-labelledby="headingFive51" data-parent="#accordionEx1">
					<div class="card-body">
						At this time, we do not offer websites for agents. However, we are in the process of updating our entire back office software.

						Once this project is completed, all agents or teams will be able to select pre-designed templates for their own websites with full IDX property search functionality from their internal company dashboard. These agent or team websites will be available to our agents at no cost.

						Additionally the leads generated from these websites will be fed into a custom designed CRM which will all be integrated in the company dashboard.

						We expect this to be completed in 2020.
					</div>
				</div>
			</div>
			<!-- Accordion card -->
			<!-- Accordion card -->
			<div class="card">
				<!-- Card header -->
				<div class="card-header" role="tab" id="headingSix61">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseSix61" aria-expanded="false" aria-controls="collapseSix61">
						<h5 class="mb-0">
							What type of classes or trainings do you offer? Are there any costs? <i class="fas fa-angle-down rotate-icon"></i>
						</h5>
					</a>
				</div>
				<!-- Card body -->
				<div id="collapseSix61" class="collapse" role="tabpanel" aria-labelledby="headingSix61" data-parent="#accordionEx1">
					<div class="card-body">
						General trainings and classes for CE Credit Hours are held throughout the year and will be announced via email to our agents and posted in our Agent Dashboard and Private Facebook Group. No two agents are the same and some prefer a personal touch when it comes to learning and training. That is why we offer both, in-person and online classes.
					</div>
				</div>
			</div>
			<!-- Accordion card -->
			<!-- Accordion card -->
			<div class="card">
				<!-- Card header -->
				<div class="card-header" role="tab" id="headingSeven71">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseSeven71" aria-expanded="false" aria-controls="collapseSeven71">
						<h5 class="mb-0">
							Who can I contact if I have questions about a contract? Are they available outside of normal business hours? <i class="fas fa-angle-down rotate-icon"></i>
						</h5>
					</a>
				</div>
				<!-- Card body -->
				<div id="collapseSeven71" class="collapse" role="tabpanel" aria-labelledby="headingSeven71" data-parent="#accordionEx1">
					<div class="card-body">
						Taylor Properties prides itself in the amount of support we provide our agents. Looking at our Google reviews, we are known to go above and beyond agent expectaction when it comes to support.

						You will able to get your questions answered outside of normal business hours should the need arise. Depending on the time and situation, you could contact our VP of Operations or Broker.
					</div>
				</div>
			</div>
			<!-- Accordion card -->
		</div>
		<!-- Accordion wrapper -->
	</div>
</div>

@include('includes.getmore')
@endsection