@extends('layouts.landingpage')
@section('title', 'Join | Taylor Properties | 100% Commission Real Estate Brokerage')

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
<div class="view" style="background-image: url('{{asset('/images/taylorprops-hero.jpeg') }}'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
	<!-- Mask & flexbox options-->
	<div class="mask rgba-stylish-strong d-flex justify-content-center align-items-center">
		<!-- Content -->
		<div class="container">
			@if (session('success'))
			    <div class="alert alert-success">
			        {{ session('success') }}
			    </div>
			@endif
			<!--Grid row-->
			<div class="row pt-lg-5 mt-lg-5">
				<!--Grid column-->
				<div class="col-md-6 mb-5 mt-md-0 mt-5 white-text text-center text-md-left wow fadeInLeft" data-wow-delay="0.3s">
					<h1 class="display-4 font-weight-bold" style="color: #ffffff;">You Earned It. You Keep It.</h1>
					<hr class="hr-light">
					<h6 class="mb-3" style="color: #ffffff;">Fill out the form and we will contact you to answer any questions and guide you through joining Taylor Properties. Please feel free to call us at <a href="tel:8005900925" style="color: #e7bd70">800-590-0925</a> if you prefer to speak with someone immediately.</h6>
					<a class="btn btn-outline-white" href="/100-commission-real-estate-broker">Learn more</a>
				</div>
				<!--Grid column-->
				<!--Grid column-->
				<div class="col-md-6 col-xl-5 mb-4">
					<!--Form-->
					<div class="card wow fadeInRight" data-wow-delay="0.3s">
						<div class="card-body z-depth-2">
							<!--Header-->
							<div class="text-center">
								<h3 class="dark-grey-text">
								<strong>Join Today</strong>
								</h3>
								<hr>
							</div>
							@include('includes.contactform_from_agent')
						</div>
					</div>
				</form>
				<!--/.Form-->
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
@endsection

