@extends('layouts.app')

@section('content')
<div class="intro-slider-container mb-0">
    <div class="intro-slider owl-carousel owl-theme owl-nav-inside owl-light" data-toggle="owl" 
        data-owl-options='{
            "dots": true,
            "nav": false, 
            "responsive": {
                "1200": {
                    "nav": true,
                    "dots": false
                }
            }
        }'>
        <div class="intro-slide" style="background-image: url(public/assets/images/demos/demo-4/slider/banner.jpg);">
            <div class="container intro-content">
                <div class="row justify-content-end">
                    <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                        <h3 class="intro-subtitle text-third">Deals and Promotions</h3><!-- End .h3 intro-subtitle -->
                        <h1 class="intro-title">Better Chicken</h1>
                        <h1 class="intro-title">Raise Better Farmers</h1><!-- End .intro-title -->

                        <div class="intro-price">
                            <sup class="intro-old-price text-white">Rs.349.95</sup>
                            <span class="text-third">
                                Rs.279<sup>.99</sup>
                            </span>
                        </div><!-- End .intro-price -->

                        <a href="#" class="btn btn-primary btn-round">
                            <span>Shop More</span>
                            <i class="icon-long-arrow-right"></i>
                        </a>
                    </div><!-- End .col-lg-11 offset-lg-1 -->
                </div><!-- End .row -->
            </div><!-- End .intro-content -->
        </div><!-- End .intro-slide -->

        <div class="intro-slide" style="background-image: url(assets/images/demos/demo-4/slider/banner2.jpg);">
            <div class="container intro-content">
                <div class="row justify-content-end">
                    <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                        <h3 class="intro-subtitle text-third">New Arrival</h3><!-- End .h3 intro-subtitle -->
                        <h1 class="intro-title">Fresh Meat <br>a Meaty Combo </h1><!-- End .intro-title -->

                        <div class="intro-price">
                            <sup>Today:</sup>
                            <span class="text-third">
                                Rs.99<sup>.99</sup>
                            </span>
                        </div><!-- End .intro-price -->

                        <a href="#" class="btn btn-primary btn-round">
                            <span>Shop More</span>
                            <i class="icon-long-arrow-right"></i>
                        </a>
                    </div><!-- End .col-md-6 offset-md-6 -->
                </div><!-- End .row -->
            </div><!-- End .intro-content -->
        </div><!-- End .intro-slide -->
        <div class="intro-slide" style="background-image: url(assets/images/demos/demo-4/slider/banner3.jpg);">
            <div class="container intro-content">
                <div class="row justify-content-end">
                    <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                        <h3 class="intro-subtitle text-primary">New Arrival</h3><!-- End .h3 intro-subtitle -->
                        <h1 class="intro-title">Good Fish <br>come in Small Boats </h1><!-- End .intro-title -->

                        <div class="intro-price">
                            <sup class="text-primary">Today:</sup>
                            <span class="text-third">
                                Rs.999<sup>.99</sup>
                            </span>
                        </div><!-- End .intro-price -->

                        <a href="#" class="btn btn-primary btn-round">
                            <span>Shop More</span>
                            <i class="icon-long-arrow-right"></i>
                        </a>
                    </div><!-- End .col-md-6 offset-md-6 -->
                </div><!-- End .row -->
            </div><!-- End .intro-content -->
        </div>
    </div><!-- End .intro-slider owl-carousel owl-simple -->

    <span class="slider-loader"></span><!-- End .slider-loader -->
</div><!-- End .intro-slider-container -->

<div class="bg-light pt-5 pb-4">
    <div class="container trending-products">
        <div class="heading heading-flex mb-3">
            <div class="heading-left">
                <h2 class="title">Deal Of the Month</h2><!-- End .title -->
            </div><!-- End .heading-left -->

           <div class="heading-right">
                <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="trending-popular-link" data-toggle="tab" href="#trending-popular-tab" role="tab" aria-controls="trending-popular-tab" aria-selected="true">Most Popular</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="trending-rate-link" data-toggle="tab" href="#trending-rate-tab" role="tab" aria-controls="trending-rate-tab" aria-selected="false">Best Rate</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="trending-new-link" data-toggle="tab" href="#trending-new-tab" role="tab" aria-controls="trending-new-tab" aria-selected="false">New Arrivals</a>
                    </li>
                </ul>
           </div><!-- End .heading-right -->
        </div><!-- End .heading -->

        <div class="row">
            <div class="col-xl-5col d-none d-xl-block">
                <div class="banner">
                    <div class="owl-carousel owl-full carousel-equal-height" data-toggle="owl" 
                            data-owl-options='{
                                "nav": true, 
                                "dots": false,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":1
                                    },
                                    "480": {
                                        "items":1
                                    },
                                    "768": {
                                        "items":1
                                    },
                                    "992": {
                                        "items":1
                                    }
                                }
                            }'>
                            <div class="product product-2" style="padding: 39px 0;">
                                <figure class="product-media">
                                    <span class="product-label label-circle label-top">Top</span>
                                    <a href="product.html">
                                        <img src="{{ url('/public/assets/images/demos/demo-4/products/product-2.jpg') }}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="cart.html" class="btn-product btn-cart" title="Add to cart"><span>add cart</span></a>
                                        
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Vegetables</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="#">Cabbage</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        Rs.19.99
                                    </div><!-- End .product-price -->
                                  <!-- 
 									<div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 100%;">
											</div> 
                                        </div>
										<span class="ratings-text">( 4 Reviews )</span>
                                    </div> 
								-->
								<!-- End .rating-container -->
                                    
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->

                            <div class="product product-2">
                                <figure class="product-media">
                                    <a href="product.html">
                                        <img src="assets/images/demos/demo-4/products/product-7.jpg" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="cart.html" class="btn-product btn-cart" title="Add to cart"><span>add cart</span></a>
                                        
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Fruits</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="#">Banana</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        Rs.29.99
                                    </div><!-- End .product-price -->
                                    <!-- 
									   <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 60%;">
											</div>	
										</div>
										<span class="ratings-text">( 6 Reviews )</span>
                                    </div> -->
									<!-- End .rating-container -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        </div><!-- End .owl-carousel -->
                    <table class="table table-wishlist table-mobile" style="background: #fff;">
            <thead>
                <tr>
                    <th><h5 class="mb-0 mt-3 pl-3">Top Savers Today</h5></th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td class="product-col pl-3">
                        <div class="product">
                            <figure class="product-media">
                                <a href="#">
                                    <img src="{{ url('/public/assets/images/products/table/product-1.jpg') }}" alt="Product image">
                                </a>
                            </figure>

                            <h3 class="product-title">
                                <a href="#">Dummy Text<br>Rs.15</a>
                            </h3><!-- End .product-title -->
                        </div><!-- End .product -->
                    </td>
                </tr>
                <tr>
                    <td class="product-col pl-3">
                        <div class="product">
                            <figure class="product-media">
                                <a href="#">
                                    <img src="{{ url('/public/assets/images/products/table/product-2.jpg') }}" alt="Product image">
                                </a>
                            </figure>

                            <h3 class="product-title">
                                <a href="#">Dummy Text<br>Rs.15</a>
                            </h3><!-- End .product-title -->
                        </div><!-- End .product -->
                    </td>                           
                </tr>
                <tr>
                    <td class="product-col pl-3">
                        <div class="product">
                            <figure class="product-media">
                                <a href="#">
                                    <img src="{{ url('/public/assets/images/products/table/product-3.jpg') }}" alt="Product image">
                                </a>
                            </figure>

                            <h3 class="product-title">
                                <a href="#">Dummy Text<br>Rs.15</a>
                            </h3><!-- End .product-title -->
                        </div><!-- End .product -->
                    </td>
                </tr>
            </tbody>
        </table>
                </div><!-- End .banner -->
            </div><!-- End .col-xl-5col -->

            <div class="col-xl-4-5col">
                <div class="tab-content tab-content-carousel just-action-icons-sm">
                    <div class="tab-pane p-0 fade show active" id="trending-popular-tab" role="tabpanel" aria-labelledby="trending-popular-link">
                        <div class="row">
                            <div class="product product-2 col-4">
                                <figure class="product-media">
                                    <span class="product-label label-circle label-top">Top</span>
                                    <a href="product.html">
                                        <img src="{{ url('/public/assets/images/demos/demo-4/products/product-6.jpg') }}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Meat</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="#">Chicken Flesh</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        Rs.199.99
                                    </div><!-- End .product-price -->
                                  <!--  <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 100%;">
										</div>
										  </div>
                                        <span class="ratings-text">( 4 Reviews )</span>
                                    </div>
									-->
									<!-- End .rating-container -->

                                    
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->

                            <div class="product product-2 col-4">
                                <figure class="product-media">
                                    <a href="product.html">
                                        <img src="{{ url('/public/assets/images/demos/demo-4/products/product-7.jpg') }}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Fruits</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="#">Banana</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        Rs.279.99
                                    </div><!-- End .product-price -->
                                   <!-- <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 60%;">
											</div> 
                                        </div> 
                                        <span class="ratings-text">( 6 Reviews )</span>
                                    </div> -->
									<!-- End .rating-container -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->

                            <div class="product product-2 col-4">
                                <figure class="product-media">
                                    <span class="product-label label-circle label-new">New</span>
                                    <a href="product.html">
                                        <img src="{{ url('/public/assets/images/demos/demo-4/products/product-8.jpg') }}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Vegetables</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="#">Bell Pepper</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        Rs.499.99
                                    </div><!-- End .product-price -->
                                   <!-- <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 80%;">
											</div> 
                                        </div> 
                                        <span class="ratings-text">( 4 Reviews )</span>
                                    </div> -->
									<!-- End .rating-container -->

                                    
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->

                            <div class="product product-2 col-4">
                                <figure class="product-media">
                                    <span class="product-label label-circle label-top">Top</span>
                                    <span class="product-label label-circle label-sale">Sale</span>
                                    <a href="product.html">
                                        <img src="{{ url('/public/assets/images/demos/demo-4/products/product-9.jpg') }}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Vegetables</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="#">Cluster Beans</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        <span class="new-price">Rs.99.99</span>
                                        <span class="old-price">Was Rs.199.99</span>
                                    </div><!-- End .product-price -->
                                 <!--   <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 80%;">
											</div> 
                                        </div> 
                                        <span class="ratings-text">( 10 Reviews )</span>
                                    </div> -->
									<!-- End .rating-container -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->

                            <div class="product product-2 col-4">
                                <figure class="product-media">
                                    <span class="product-label label-circle label-new">New</span>
                                    <a href="product.html">
                                        <img src="{{ url('/public/assets/images/demos/demo-4/products/product-3.jpg') }}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Vegetables</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="#">Carrot</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        Rs.89.99
                                    </div><!-- End .product-price -->
                                    <!--
									  <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 80%;">
											</div> 
                                        </div> 
                                        <span class="ratings-text">( 4 Reviews )</span>
                                    </div>
										-->
									<!-- End .rating-container -->

                                    <!-- End .product-nav -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        <!-- End .owl-carousel --></div>
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane p-0 fade" id="trending-rate-tab" role="tabpanel" aria-labelledby="trending-rate-link">
                        <div class="row">
                            <div class="product product-2 col-4">
                                <figure class="product-media">
                                    <span class="product-label label-circle label-new">New</span>
                                    <a href="product.html">
                                        <img src="{{ url('/public/assets/images/demos/demo-4/products/product-3.jpg') }}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Vegetables</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="#">Carrot</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        Rs.69.29
                                    </div><!-- End .product-price -->
                                   <!--
 									 <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 80%;">
											</div> 
                                        </div> 
                                        <span class="ratings-text">( 4 Reviews )</span>
                                    </div> -->
									<!-- End .rating-container -->

                                    
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->

                            <div class="product product-2 col-4">
                                <figure class="product-media">
                                    <a href="product.html">
                                        <img src="{{ url('/public/assets/images/demos/demo-4/products/product-2.jpg') }}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Vegetables</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="#">Cabbage</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        Rs.19.29
                                    </div><!-- End .product-price -->
                                   <!--
 									  <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 60%;">
											</div>
                                        </div>
                                        <span class="ratings-text">( 6 Reviews )</span>
                                    </div> -->
									<!-- End .rating-container -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->

                            <div class="product product-2 col-4">
                                <figure class="product-media">
                                    <span class="product-label label-circle label-top">Top</span>
                                    <span class="product-label label-circle label-sale">Sale</span>
                                    <a href="product.html">
                                        <img src="{{ url('/public/assets/images/demos/demo-4/products/product-4.jpg') }}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Fruits</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="#">Strawberry</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        <span class="new-price">Rs.35.41</span>
                                        <span class="old-price">Was Rs.61.67</span>
                                    </div><!-- End .product-price -->
                                    <!--
									  <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 100%;">
											</div>
                                        </div>
                                        <span class="ratings-text">( 10 Reviews )</span>
                                      </div>
									 -->
									<!-- End .rating-container -->                                                
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->

                            <div class="product product-2 col-4">
                                <figure class="product-media">
                                    <span class="product-label label-circle label-top">Top</span>
                                    <a href="product.html">
                                        <img src="{{ url('/public/assets/images/demos/demo-4/products/product-5.jpg') }}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Vegetables</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="#">Brocolli</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        Rs.89.99
                                    </div>
									<!-- End .product-price -->
                                    <!--
  									  <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 60%;">
											</div> 
                                        </div> 
                                        <span class="ratings-text">( 5 Reviews )</span>
                                      </div> -->
									<!-- End .rating-container -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->

                            <div class="product product-2 col-4">
                                <figure class="product-media">
                                    <span class="product-label label-circle label-top">Top</span>
                                    <a href="product.html">
                                        <img src="{{ url('/public/assets/images/demos/demo-4/products/product-1.jpg') }}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Vegetables</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="#">Tomato</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        Rs.9.99
                                    </div><!-- End .product-price -->
                                    <!--
									 <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 100%;">
											</div> 
                                        </div> 
                                        <span class="ratings-text">( 4 Reviews )</span>
                                    </div> -->
									<!-- End .rating-container -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane p-0 fade" id="trending-new-tab" role="tabpanel" aria-labelledby="trending-new-link">
                        <div class="row">
                            <div class="product product-2 col-4">
                                <figure class="product-media">
                                    <span class="product-label label-circle label-new">New</span>
                                    <a href="product.html">
                                        <img src="{{ url('/public/assets/images/demos/demo-4/products/product-8.jpg') }}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Vegetables</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="#">Capcicum</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        Rs.29.99
                                    </div><!-- End .product-price -->
                                  <!--  
									<div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 80%;"></div>
                                        </div>
                                        <span class="ratings-text">( 4 Reviews )</span>
                                    </div> 
									-->
									<!-- End .rating-container --> 
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->

                            <div class="product product-2 col-4">
                                <figure class="product-media">
                                    <span class="product-label label-circle label-top">Top</span>
                                    <a href="product.html">
                                        <img src="{{ url('/public/assets/images/demos/demo-4/products/product-6.jpg') }}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Meat</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="#">Chicken Cut</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        Rs.199.99
                                    </div><!-- End .product-price -->
                                   <!--
 									<div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 100%;">
											</div>
                                        </div>
                                        <span class="ratings-text">( 4 Reviews )</span>
                                    </div> -->
									<!-- End .rating-container -->

                                    
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->

                            <div class="product product-2 col-4">
                                <figure class="product-media">
                                    <a href="product.html">
                                        <img src="{{ url('/public/assets/images/demos/demo-4/products/product-7.jpg') }}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Fruits</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="#">Microsoft - Refurbish Xbox One S 500GB</a></h3><!-- End .product-title -->
                                    <div class="product-price">
        Banana
                                    </div><!-- End .product-price -->
                                   <!--
 									<div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 60%;">
											</div>
                                        </div> 
                                        <span class="ratings-text">( 6 Reviews )</span>
                                    </div> -->
									<!-- End .rating-container -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->

                            <div class="product product-2 col-4">
                                <figure class="product-media">
                                    <span class="product-label label-circle label-new">New</span>
                                    <a href="product.html">
                                        <img src="{{ url('/public/assets/images/demos/demo-4/products/product-3.jpg')}}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Vegetables</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="#">Carrot</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        Rs.18.99
                                    </div><!-- End .product-price -->
                                   <!--
 									<div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 80%;">
											</div>
                                        </div>
                                        <span class="ratings-text">( 4 Reviews )</span>
                                    </div>
										-->
                                    
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .col-xl-4-5col -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</div><!-- End .bg-light pt-5 pb-6 -->
<div class="py-5" style="background: url('public/assets/images/green-slide-01.jpg') center center; ">
<div class="container pt-5">
    
    
    <div class="row justify-content-center">
            <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-left icon-box-circle">
                    <span class="icon-box-icon">
                        <img src="assets/images/home1-payment-1.png" alt=""/>
                    </span>
                    <div class="icon-box-content">
                      <h3 class="icon-box-title text-white font-weight-bold">Free Shipping on above Rs.1000</h3><!-- End .icon-box-title -->
                        <p class="text-white">Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus augue.</p>
                  </div><!-- End .icon-box-content -->
              </div><!-- End .icon-box -->
            </div><!-- End .col-lg-4 col-sm-6 -->

            <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-left icon-box-circle">
                    <span class="icon-box-icon">
                        <img src="{{ url('/public/assets/images/home1-payment-3.png') }}" alt=""/>
                    </span>
                    <div class="icon-box-content">
                        <h3 class="icon-box-title text-white font-weight-bold">10% Off the Bill</h3><!-- End .icon-box-title -->
                        <p class="text-white">Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate eu erat. </p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-lg-4 col-sm-6 -->

            <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-left icon-box-circle">
                    <span class="icon-box-icon">
                        <img src="{{ url('/public/assets/images/home1-payment-2.png') }}" alt=""/>
                    </span>
                    <div class="icon-box-content">
                        <h3 class="icon-box-title text-white font-weight-bold">Security Payment</h3><!-- End .icon-box-title -->
                        <p class="text-white">Pellentesque a diam sit amet vehicula. Nullam quis massa sit amet nibh viverra malesuada.</p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-lg-4 col-sm-6 -->
        </div>
</div><!-- End .container -->
</div>
<div class="mb-4"></div><!-- End .mb-4 -->
<div class="pt-2 pb-6">
    <div class="container trending-products">
        <div class="heading heading-flex mb-3">
            <div class="heading-left">
                <h2 class="title">New Arrivals</h2><!-- End .title -->
            </div><!-- End .heading-left -->

           <div class="heading-right">
                <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="trending-top-link" data-toggle="tab" href="#trending-top-tab" role="tab" aria-controls="trending-top-tab" aria-selected="true">Top Rated</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="trending-best-link" data-toggle="tab" href="#trending-best-tab" role="tab" aria-controls="trending-best-tab" aria-selected="false">Best Selling</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="trending-sale-link" data-toggle="tab" href="#trending-sale-tab" role="tab" aria-controls="trending-sale-tab" aria-selected="false">On Sale</a>
                    </li>
                </ul>
           </div><!-- End .heading-right -->
        </div><!-- End .heading -->

        <div class="row">
            <div class="col-xl-5col d-none d-xl-block">
                <div class="banner">
                    <table class="table table-wishlist table-mobile" style="background: #fff;">

            <tbody>
                <tr>
                    <td class="product-col pl-3">
                        <div class="product">
                            <figure class="product-media">
                                <a href="#">
                                    <img src="{{ url('/public/assets/images/products/table/product-1.jpg') }}" alt="Product image">
                                </a>
                            </figure>

                            <h3 class="product-title">
                                <a href="#">Dummy Text<br>Rs.15</a>
                            </h3><!-- End .product-title -->
                        </div><!-- End .product -->
                    </td>
                </tr>
                <tr>
                    <td class="product-col pl-3">
                        <div class="product">
                            <figure class="product-media">
                                <a href="#">
                                    <img src="{{ url('/public/assets/images/products/table/product-2.jpg') }}" alt="Product image">
                                </a>
                            </figure>

                            <h3 class="product-title">
                                <a href="#">Dummy Text<br>Rs.15</a>
                            </h3><!-- End .product-title -->
                        </div><!-- End .product -->
                    </td>                           
                </tr>
                <tr>
                    <td class="product-col pl-3">
                        <div class="product">
                            <figure class="product-media">
                                <a href="#">
                                    <img src="{{ url('/public/assets/images/products/table/product-3.jpg') }}" alt="Product image">
                                </a>
                            </figure>

                            <h3 class="product-title">
                                <a href="#">Dummy Text<br>Rs.15</a>
                            </h3><!-- End .product-title -->
                        </div><!-- End .product -->
                    </td>
                </tr>
            </tbody>
        </table>
                </div><!-- End .banner -->
            </div><!-- End .col-xl-5col -->

            <div class="col-xl-4-5col">
                <div class="tab-content tab-content-carousel just-action-icons-sm">
                    <div class="tab-pane p-0 fade show active" id="trending-top-tab" role="tabpanel" aria-labelledby="trending-top-link">
                        <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": true, 
                                "dots": false,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    }
                                }
                            }'>
                            <div class="product product-2">
                                <figure class="product-media">
                                    <span class="product-label label-circle label-top">Top</span>
                                    <a href="product.html">
                                        <img src="{{ url('/public/assets/images/demos/demo-4/products/product-6.jpg') }}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Meat</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="#">Chicken Boneless</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        Rs.400.00
                                    </div><!-- End .product-price -->
                                <!--    
									<div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 100%;">
											</div>
                                        </div>
                                        <span class="ratings-text">( 4 Reviews )</span>
                                    </div> -->
									<!-- End .rating-container -->

                                    
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->

                            <div class="product product-2">
                                <figure class="product-media">
                                    <a href="product.html">
                                        <img src="{{ url('/public/assets/images/demos/demo-4/products/product-7.jpg') }}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Fruits</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="#">Banana</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        Rs.40.00
                                    </div><!-- End .product-price -->
                                 <!--
 									<div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 60%;">
											</div>
                                        </div> 
                                        <span class="ratings-text">( 6 Reviews )</span>
                                    </div>
 								 -->
									<!-- End .rating-container -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->

                            <div class="product product-2">
                                <figure class="product-media">
                                    <span class="product-label label-circle label-new">New</span>
                                    <a href="product.html">
                                        <img src="{{ url('/public/assets/images/demos/demo-4/products/product-8.jpg') }}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Vegetables</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="#">Bell Peppers</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        Rs.70.00
                                    </div><!-- End .product-price -->
                                <!--
									<div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 80%;"></div> 
                                        </div> 
                                        <span class="ratings-text">( 4 Reviews )</span>
                                    </div>
								-->
									<!-- End .rating-container -->

                                    
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->

                            <div class="product product-2">
                                <figure class="product-media">
                                    <span class="product-label label-circle label-top">Top</span>
                                    <span class="product-label label-circle label-sale">Sale</span>
                                    <a href="product.html">
                                        <img src="{{ url('/public/assets/images/demos/demo-4/products/product-9.jpg') }}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Vegetables</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="#">Clustter Beans</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        <span class="new-price">Rs.20.00</span>
                                        <span class="old-price">Was Rs.40.00</span>
                                    </div><!-- End .product-price -->
                                    <!--
									 <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 80%;">
											</div>
                                        </div> 
                                        <span class="ratings-text">( 10 Reviews )</span>
                                    </div>
									-->
									<!-- End .rating-container -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->

                            <div class="product product-2">
                                <figure class="product-media">
                                    <span class="product-label label-circle label-new">New</span>
                                    <a href="product.html">
                                        <img src="{{ url('/public/assets/images/demos/demo-4/products/product-3.jpg') }}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Vegetables</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="#">Carrot</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        Rs.20.00
                                    </div><!-- End .product-price -->
                                   <!--
 									<div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 80%;">
											</div> 
                                        </div> 
                                        <span class="ratings-text">( 4 Reviews )</span>
                                    </div> -->
									<!-- End .rating-container -->

                                    
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane p-0 fade" id="trending-best-tab" role="tabpanel" aria-labelledby="trending-best-link">
                        <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": true, 
                                "dots": false,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    }
                                }
                            }'>
                            <div class="product product-2">
                                <figure class="product-media">
                                    <span class="product-label label-circle label-new">New</span>
                                    <a href="product.html">
                                        <img src="{{ url('/public/assets/images/demos/demo-4/products/product-3.jpg') }}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Vegetables</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="#">Carrot</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        Rs.20.00
                                    </div><!-- End .product-price -->
                                   <!--
 									<div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 80%;">
											</div>
                                        </div>
                                        <span class="ratings-text">( 4 Reviews )</span>
                                    </div>
									-->
									<!-- End .rating-container -->

                                    
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->

                            <div class="product product-2">
                                <figure class="product-media">
                                    <a href="product.html">
                                        <img src="{{ url('/public/assets/images/demos/demo-4/products/product-2.jpg') }}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Vegetables</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="#">Cabbage</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        Rs.20.00
                                    </div><!-- End .product-price -->
                                    <!--
										<div class="ratings-container">
											<div class="ratings">
												<div class="ratings-val" style="width: 80%;">
												</div>
											</div> 
											<span class="ratings-text">( 4 Reviews )</span>
										</div>
									-->
									<!-- End .rating-container -->

                                    
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->

                            

                            

                            
                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane p-0 fade" id="trending-sale-tab" role="tabpanel" aria-labelledby="trending-sale-link">
                        <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": true, 
                                "dots": false,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    }
                                }
                            }'>
                            <div class="product product-2">
                                <figure class="product-media">
                                    <span class="product-label label-circle label-new">New</span>
                                    <a href="product.html">
                                        <img src="{{ url('/public/assets/images/demos/demo-4/products/product-8.jpg') }}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="wishlist.html" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Vegetables</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="#">Capcicum</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        Rs.60.00
                                    </div><!-- End .product-price -->
                                    <!--
										<div class="ratings-container">
											<div class="ratings">
												<div class="ratings-val" style="width: 80%;">
												</div> 
											</div> 
											<span class="ratings-text">( 4 Reviews )</span>
										</div>
									-->
									<!-- End .rating-container -->

                                    
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->

                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .col-xl-4-5col -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</div><!-- End .bg-light pt-5 pb-6 -->
<div class="mb-4"></div><!-- End .mb-4 -->
@endsection

   