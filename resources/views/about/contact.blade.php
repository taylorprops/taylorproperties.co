@extends('layouts.app')
@section('title', 'Contact Us | Taylor Properties | Buying and Selling Real Estate in DC, MD, VA and PA')
@section('css')
<style type="text/css">
    /* Required for full background image */
    html,
    body,
    header,
    .view {
        height: 100VH;
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
</style>
@endsection

@section('content')
<div class="page-container page-contact">
    <!-- Full Page Intro -->
    <div class="view" style="background-image: url('{{asset('/images/taylorprops-hero.jpeg') }}'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
        <!-- Mask & flexbox options-->
        <div class="mask rgba-stylish-strong d-flex justify-content-center align-items-center">
            <!-- Content -->
            <div class="container">

                <!--Grid row-->
                <div class="row pt-lg-5 mt-lg-5">
                    <!--Grid column-->
                    <div class="col-md-6 mb-5 mt-md-0 mt-5 white-text text-center text-md-left wow fadeInLeft" data-wow-delay="0.3s">
                        <h1 class="display-4 font-weight-bold" style="color: #ffffff;">Contact Us</h1>
                        <hr class="hr-light">
                        <h6 class="mb-3" style="color: #ffffff;">Have questions about a property or our services? Fill out our contact form and we'll get back to you as soon as possible. Prefer to speak to someone directly? Please call our main office at 800-590-0925.</h6>
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
                                        <strong>Send us a message</strong>
                                    </h3>
                                    <hr>
                                </div>
                                @include('includes.contactform_general')
                            </div>
                        </div>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </div>
            <!-- Content -->
        </div>
        <!-- Mask & flexbox options-->
    </div>
</div>
@endsection