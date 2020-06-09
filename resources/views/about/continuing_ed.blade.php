@extends('layouts.landingpage')
@section('title', 'Real Estate Classes | Training & Mentoriing Programs | Taylor Properties')
@section('content')
<div class="" style="background-image: url(images/curb-appeal.jpg);">
    <div class="container">
        <div class="row" style="display: block; padding: 2em 0">
            <div class="col-md-12">
                <h1>Real Estate Classes</h1>
                <p>No two agents are the same. Some prefer a personal touch when it comes to learning and training while others like to learn at the comfort of their own home. That is why we partnered with Metropolitan Real Estate Academy and The CE Shop to offer both, in-person and online classes to our agents. Whether you are looking to learn general industry practices, get pre-licensing, or simply want to complete your Continuing Education Hours, we have the resources for you to do so.</p>
            </div>
            <div class="col-md-12 mx-auto">
                <a href="https://www.metropolitanrealestate.academy/" target="_blank"><img src="/images/logos/metropolitan-realestate-academy.png" alt="Metropolitan Real Estate Academy - In-Person Classes" style="max-width: 150px;"></a>
                <a href="https://taylorproperties.theceshop.com/" target="_blank"><img src="/images/logos/the-ceshop.png" alt="The CE Shop - Online Classes" style="max-width: 300px;"></a>
            </div>
            <div class="col-md-12 ">
                <a class="btn btn-primary" href="https://www.metropolitanrealestate.academy/" target="_blank">In-Person CE Classes</a>
                <a class="btn btn-primary" href="https://taylorproperties.theceshop.com/" target="_blank">Online Classes</a>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <h1>Real Estate Training & Mentoring Programs</h1>
                <p>New agent or struggling to get your business going? Real estate is a tough business and sometimes it takes some help to get up to speed. We've created a Mentorship Program that will match you up with a mentor that fits your needs and personality. You will have access to a "career coach" to help you grow professionally. By joining the mentorship program, we aim to:</p>
                <ul>
                    <li>Serve as a resource to help agents identify problems and guide them toward a solution based on experience with similar issues.
Be the confidante a new agent can trust and provide constructive feedback on their actions and ideas.</li>
                    <li>Be willing to expose mentees to their professional network.</li>
                    <li>Provide tips on steering clear of first-time mistakes and increase overall client experience.</li>
                    <li>Provide a sense of motivation and accountability to help mentees meet their personal and professional goals.</li>
                </ul>
            </div>
        </div>
    </div>
    @include('includes.agent_testimonials')
</div>
@endsection
