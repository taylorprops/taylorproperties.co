@extends('layouts.app')
@section('title', '100% Commission Real Estate Brokerage | Taylor Properties | Buying and Selling Real Estate in DC, MD, VA and PA')

@section('content')
<div class="page-container page-careers">
    <!--div class="container mb-3">
        <div class="row">
            <div class="col-12 text-center mt-4">
                <h2 class="text-secondary font-bold">Join The Largest Independent Brokerage In Maryland!</h2>
            </div>
        </div>
    </div-->
    <div class="container-fluid header">
        <div class="row">
            <div class="header-text">
                <h2>Taylor Properties Careers</h2>
                <p>Behind every great company are great people. That is why, as an agent of Taylor Properties, you can count on a Broker that will tap into your strengths, offer the training you need and give you all the tools to advance your career. We believe that most people want more than just a job in real estate; they want a rewarding career. Real estate offers you the flexibility to run your own business as you see fit with all the support you need from your Broker, all the while offering you an industry leading <strong>100% Commission</strong>.</p>
                <p>Our goal is to be the mid-Atlantic's premier real estate services company. At Taylor Properties, we promote a culture of caring. Since 1985, we've grown to be the <strong>Largest Independent Brokerage in Maryland</strong> and we are always looking to add exceptional talent to our team. We strive to uplift others while raising the bar on what we're capable of achieving ourselves. In helping our clients and our community through what we do every day, that is what makes Taylor Properties an admired company and a great place to work.</p>
            </div>
        </div>
    </div>

    @include('includes.pricing_table')

    <section class="commission-calc">
        <div class="container">
            <div class="card w-responsive mx-auto">
                <div class="card-body">
                    <div class="container" style="margin-bottom: 20px;>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h2 class="pb-2">Numbers speak louder than words</h2>
                                <h5>How does your commission compare? Calculate how much more you could make with Taylor Properties commission plans.</h5>
                            </div>
                        </div>
                    </div>
                    <div class="container" style="margin-bottom: 20px;">
                        <div class="row">
                            <div class="col-12">
                                <div class="w-100 w-sm-50 mx-auto">
                                    <h4 align="center">100% Commission on 2 Sales/Month - Example</h4>
                                    <table class="income-table" style="width: 100%;">
                                        <tr>
                                            <td>(3% of $300,000) x 2</td>
                                            <td>&nbsp;</td>
                                            <td align="right">$18,000</td>
                                        </tr>
                                        <tr>
                                            <td class="border-bottom">Monthly Brokerage Fee (No Agent Transaction Fee)</td>
                                            <td class="border-bottom"></td>
                                            <td align="right" class="border-bottom red-text">($49)</td>
                                        </tr>
                                        <tr>
                                            <td><span class="h3 text-success">Your Monthly Income</span></td>
                                            <td><span class="h3 text-success"></td>
                                            <td align="right"><span class="h3 text-success">$17,951</span></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div><!-- ./ .row -->
                        <div class="row">
                            <a class="btn btn-primary mt-2 white-text" href="/100-commission-real-estate-broker/commission-calculator" style="margin: 0 auto">How much more will you keep?</a>
                        </div>
                    </div><!-- ./ .container -->
                </div>
            </div>
        </div>
    </section>

    <section class="teams" style="background-color: #00263d;">
        <div class="container" style="margin-bottom: 0;">
            <div class="row" style="padding-bottom: 2em;">
                <div class="col-md-12 mt-4 mb-4">
                    <h2 class="h1-responsive white-text text-center">Real Estate Teams</h2>
                    <h5 class="text-center mb-1 white-text">Our high commission plans are designed to help you build a successful team and incentivizes high volume sales.</h5>
                </div>
                <div class="col-md-6">
                    <div class="p-3 m-1 bg-white primary-text">
                        <h5>Why join a team?</h5>
                        <ul>
                            <li>More leads, bigger pipeline and lead coverage</li>
                            <li>Extra training and support</li>
                            <li>Stability of income</li>
                            <li>Lower business expenses</li>
                            <li>Great for newer agents</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 m-1 bg-white primary-text">
                        <h5>Start a team today</h5>
                        <ul>
                            <li>Team Leader determines commission splits</li>
                            <li>Full ownership of your brand</li>
                            <li>No Quotas</li>
                            <li>Full Broker Support</li>
                            <li>Same Incentives as Individual Plans</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container" style="margin-bottom: 0;">
            <div class="row" style="padding-bottom: 2em;">
                <div class="col-md-12 mt-4 mb-4">
                    <h2 class="h1-responsive text-center pb-2">Real Estate Education</h2>
                    <p><strong>Pre-Licensing and Continuing Education</strong><br> No two agents are the same. Some prefer a personal touch when it comes to learning and training while others like to learn at the comfort of their own home. That is why we partnered with Metropolitan Real Estate Academy and The CE Shop to offer both, in-person and online classes to our agents. Whether you are looking to learn general industry practices, get pre-licensing, or simply want to complete your C.E. Hours, we have the resources for you to do so.</p>
                    <p><strong>Mentoring Program</strong><br> New agent or struggling to get your business going? Real estate is a tough business and sometimes it takes some help to get up to speed. We've created a Mentorship Program that will match you up with a mentor that fits your needs and personality. You will have access to a "career coach" to help you grow professionally.</p>
                </div>
                <div class="col-md-12 text-center mx-auto">
                    <a class="btn btn-primary" href="/100-commission-real-estate-broker/real-estate-classes">Learn More About Education Programs</a>
                </div>
            </div>
        </div>
    </section>

    @include('includes.agent_testimonials')

    @include('includes.getmore')
</div>
@endsection