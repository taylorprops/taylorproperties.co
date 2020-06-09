@extends('layouts.app')
@section('title', 'About Us | Taylor Properties | Buying and Selling Real Estate in DC, MD, VA and PA')
@section('content')
<div class="page-container page-about">
    <div class="container">
        <div class="row" style="display: block; padding: 2em">
            <div class="col-md-12">
                <h1>Our Story</h1>
                <p>In 1985, Robb Taylor was convinced that real estate brokerages could not continue taking the majority of their agents' hard earned commissions. He decided to provide an agent-focused real estate brokerage model that gave more commission to real estate agents while also giving them more flexibility in their careers. So he, along with Delia Abrams (VP of Operations), started Anne Arundel Properties (AAP), one of the first real estate brokerages of its kind in the Maryland area. AAP primarily focused on residential and commercial properties in Anne Arundel County, Maryland.</p>
            </div>
        </div>
        <div class="row" style="max-width: 75%; margin: 0 auto;">
            <div class="col-md-6">
                <img src="/images/about/robb-oldpic-1978.jpg" class="img-fluid float-left" alt="Taylor Properties - Robb Taylor 1978">
            </div>
            <div class="col-md-6">
                <img src="/images/about/robb-oldpics-79.jpg" class="img-fluid float-left" alt="Taylor Properties - Robb Taylor 1979">
            </div>
            <div class="col-md-12">
                <p><i>(Photos - Robb Taylor started his real estate career in 1972 and soon thereafter partnered with his father, Bob Taylor, to open four Taylor Realty offices on the Eastern Shore of Maryland.)</i></p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <p>After a few years, the brokerage and its agents were so successful that agents from other areas wanted to take advantage of the 100% Commission business model. Thus, Taylor Properties was born. Taylor Properties offered the same structure and benefits as AAP but less restrictive on the areas which agents would be able to serve.</p>
                <p>Today, Taylor Properties has grown to over 800 agents and continues to add to its impressive roster of premier agents. It is now the Largest Independent Real Estate Brokerage in Maryland and third largest overall. Taylor Properties is licensed in Washington D.C., Maryland, Virginia, and Pennsylvania.</p>
            </div>
        </div>
        <div class="row mt-4" style="width: 70%; margin: 0 auto;">
            <figure class="figure">
                <img src="/images/about/robb-mike-delia-09crop.jpg" class="figure-img img-fluid" alt="A generic square placeholder image with rounded corners in a figure.">
                <figcaption class="figure-caption">Robb Taylor (left), Mike Taylor (center), and Delia Abrams (right) celebrating their growth in 2009.</figcaption>
            </figure>
        </div>
    </div>
    {{-- @include('includes.agent_testimonials') --}}
</div>
@endsection
