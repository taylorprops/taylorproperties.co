@extends('layouts.app')
@section('title', 'Our Staff | Taylor Properties | Buying and Selling Real Estate in DC, MD, VA and PA')
@section('content')
<style type="text/css">
	.imagebox {
background: black;
padding: 0px;
position: relative;
text-align: center;
width: 100%;
}
.imagebox img {
opacity: 1;
transition: 0.5s opacity;
width: 100%;
height: 350px;
object-fit: cover;
object-position: top;
}
.imagebox .imagebox-desc {
background-color: rgba(33, 90, 150, 0.9);
bottom: 0px;
color: #fff;
font-size: 1.2em;
left: 0px;
padding: 15px 15px;
position: absolute;
transition: 0.5s padding;
text-align: center;
width: 100%;
font-weight: bold;
font-family: "Playfair Display", serif;
}
.imagebox-desc i {
    font-size: 1rem;
    font-family: "Roboto";
    font-weight: normal;
}
.page-container .col-sm-4 {
	padding: 2em;
}
</style>
<div class="container page-container">
	<div class="row">
		<div class="col-sm-4">
			<div class="imagebox">
				<img src="{{ asset('images/staff/robb-taylor.jpg')}}" class="category-banner img-responsive">
				<span class="imagebox-desc">Robb Taylor<br><i>President/Broker</i></span>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="imagebox">
				<img src="{{ asset('images/staff/delia-abrams.jpg')}}" class="category-banner img-responsive">
				<span class="imagebox-desc">Delia Abrams<br><i>VP of Operations</i></span>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="imagebox">
				<img src="{{ asset('images/staff/mike-taylor.jpg')}}" class="category-banner img-responsive">
				<span class="imagebox-desc">Mike Taylor<br><i>Managing Broker (VA)</i></span>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="imagebox">
				<img src="{{ asset('images/staff/gary-phinith.jpg')}}" class="category-banner img-responsive">
				<span class="imagebox-desc">Gary Phinith<br><i>Marketing Director</i></span>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="imagebox">
				<img src="{{ asset('images/staff/kyle-abrams.jpg')}}" class="category-banner img-responsive">
				<span class="imagebox-desc">Kyle Abrams<br><i>Recruiter</i></span>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="imagebox">
				<img src="{{ asset('images/staff/taylor-jansen-2.jpg')}}" class="category-banner img-responsive">
				<span class="imagebox-desc">Taylor Jansen<br><i>Recruiter</i></span>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="imagebox">
				<img src="{{ asset('images/staff/catharine-criss.jpg')}}" class="category-banner img-responsive">
				<span class="imagebox-desc">Catharine Criss<br><i>Commission Analyst</i></span>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="imagebox">
				<img src="{{ asset('images/staff/kayla-williams.jpg')}}" class="catdegory-banner img-responsive">
				<span class="imagebox-desc">Kayla Williams<br><i>Contracts Processor</i></span>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="imagebox">
				<img src="{{ asset('images/staff/sylvie-vivens-2.jpg')}}" class="category-banner img-responsive">
				<span class="imagebox-desc">Sylvie Vivens<br><i>Administrative Assistant</i></span>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="imagebox">
				<img src="{{ asset('images/staff/lucia-martinez.jpg')}}" class="category-banner img-responsive">
				<span class="imagebox-desc">Lucia Martinez<br><i>Accounting</i></span>
			</div>
		</div>
	</div>
</div>
@include('includes.agent_testimonials')
@endsection