@extends('layouts.app')
@section('title', 'Affiliated Partners | Taylor Properties | Buying and Selling Real Estate in DC, MD, VA and PA')
@section('content')
<style type="text/css">
.page-container	{
	margin-top: 10rem;
	display: block !important;
}
	@media (max-width: 768px){
}
.order1 {
order: 1;
}
.order2 {
order: 2;
}
}
</style>
<div class="container page-container">
	<div class="row">
		<div class="col-md-3" style="display: flex; align-items: center;">
			<div>
				<a name="title"></a>
				<a href="https://www.heritagetitlemd.com" target="_blank" alt="Heritage Title - best title escrow maryland"><img alt="Heritage Title - Title & Escrow Services" class="img-fluid" src="{{asset('images/logos/heritage-title-logo-newv2-bluetextgoldsun.png')}}"/></a>
			</div>
		</div>
		<div class="col-md-9 col-lg-9 ml-auto d-flex align-items-center mt-4 mt-md-0">
			<div>
				<h3>Heritage Title</h3>
				<p>Make the most out of your relationship with Taylor Properties by choosing Heritage Title for your title & escrow needs. </p>
				<p>By using our affiliated title & escrow partners, we can easily streamline the real estate purchase process and quickly resolve any issues that might arrive prior to closing. Partnering with Heritage Title will allow greater communication, make the closing process more efficient, improve trust that closing requirements are in order, increase guidance on title insurance as well as assurance that your are receiving the best overall experience.</p>
				<p>Not to mention, Heritage Title guarantees their fees are the lowest!</p>
				<a href="https://www.heritagetitlemd.com" class="btn btn-primary" target="_blank">Learn More</a>
			</div>
		</div>
	</div>
	<a name="mortgage"></a>
	<hr style="margin: 2rem auto;">
	<div class="row">
		<div class="col-md-9 col-lg-9 ml-auto d-flex align-items-center mt-4 mt-md-0 order2">
			<div>
				<h3>Heritage Financial</h3>
				<p>Real estate and mortgage lending are service-oriented businesses. Real estate agents and mortgage lenders work together to ensure the best possible outcome for their clients during the transaction. This is where a lender and real estate agent team becomes most valuable to the customer.</p>
				<p>Although in different professions, the agent and lender can assure the buyer a transaction with the same objective in mind; a transaction that will close and close on time. When both lender and agent seek to satisfy the needs of a shared customer, most problems can be avoided.</p>
				<p>Plus, Heritage Financial guarantees their rates are the best or they will pay you $500 if you can find a better deal!</p>
				<a href="https://www.heritagefinancial.com" class="btn btn-primary" target="_blank">Learn More</a>
			</div>
		</div>
		<div class="col-md-3 order1" style="display: flex; align-items: center;">
			<div>
				<a href="https://www.heritagefinancial.com" target="_blank"><img alt="Heritage Financial - best mortgage lender Maryland" class="img-fluid" src="{{asset('images/logos/heritage-financial-logo-new-goldnavy.png')}}" /></a>
			</div>
		</div>
	</div>
</div>
@include('includes.agent_testimonials')
@endsection