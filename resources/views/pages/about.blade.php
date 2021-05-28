@extends('layouts.app')

@section('content')
<div class="page-header text-center" style="background-image: url('{{ asset('public/assets/images/page-header-bg.jpg')}}')">
    <div class="container">
        <h1 class="page-title">About Us<span>Who We Are</span></h1>
    </div><!-- End .container -->
</div><!-- End .page-header -->
<nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">About us</li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->


<div class="page-content pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-3 mb-lg-0">
                <h2 class="title">Our Vision</h2><!-- End .title -->
                <p>We, Fresh Eat, aim at delivering fresh vegetables, fruits from the farm and other kitchen essential food items like fish, seafood, snacks, meat to our customers at the earliest. We also guarantee 100% safety, pure and fresh food quality.</p>
            </div><!-- End .col-lg-6 -->
            
            <div class="col-lg-6">
                <h2 class="title">Our Mission</h2><!-- End .title -->
                <p>We, Fresh Eat, aim at providing you get the best food quality at the price of our local market. Our mission is to serve people with essential food items at their doorstep which reduces their effort and contributes to their savings.</p>
            </div><!-- End .col-lg-6 -->
        </div><!-- End .row -->

        <div class="mb-5"></div><!-- End .mb-4 -->
    </div><!-- End .container -->

    <div class="bg-light-2 pt-6 pb-5 mb-6 mb-lg-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mb-3 mb-lg-0">
                    <h2 class="title">Who We Are</h2><!-- End .title -->
                    <p class="lead text-primary mb-3">About Us</p><!-- End .lead text-primary -->
                    <p class="mb-2">We, Fresh eat, work sincerely to provide you with the best quality food including fruits, vegetables, meat, seafood, snacks and other kitchen essentials to your doorstep. We only help our customers get quality food for their daily life at the most reasonable costs in the market. Fresh Eat is also known for the safety of the food and serves the customer with a free home delivery if the order extends rs 1000. One can always find the essential food requirements along with a safety guarantee with us on our website. </p>

                    <!--<a href="blog.html" class="btn btn-sm btn-minwidth btn-outline-primary-2">
                        <span>VIEW OUR NEWS</span>
                        <i class="icon-long-arrow-right"></i>
                    </a>-->
                </div><!-- End .col-lg-5 -->

                <div class="col-lg-6 offset-lg-1">
                    <div class="about-images">
                        <img src="{{ url('/public/assets/images/about/img-1.jpg') }}" alt="" class="about-img-front">
                        <img src="{{ url('/public/assets/images/about/img-2.jpg') }}" alt="" class="about-img-back">
                    </div><!-- End .about-images -->
                </div><!-- End .col-lg-6 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .bg-light-2 pt-6 pb-6 -->        
    
</div><!-- End .page-content -->
@endsection