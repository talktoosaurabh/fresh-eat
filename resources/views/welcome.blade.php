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
        @foreach($banners as $ban)
        <div class="intro-slide" style="background-image: url(public/assets/images/banners/{{$ban->image}});">
            <div class="container intro-content">
                <div class="row justify-content-end">
                    <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                        <h3 class="intro-subtitle text-third">{{$ban->sub_title}}</h3><!-- End .h3 intro-subtitle -->
                        <h1 class="intro-title">{{$ban->title}}</h1>
                        

                        <!-- <div class="intro-price">
                            <sup class="intro-old-price text-white">Rs.349.95</sup>
                            <span class="text-third">
                                Rs.279<sup>.99</sup>
                            </span>
                        </div> -->
                        <?php $amt = $dec = ''; ?>
                        @if(!empty($ban->todays_price))
                            <?php 

                            if(strpos($ban->todays_price, '.') !== false){
                                $amount = explode (".", $ban->todays_price); 
                                $amt = $amount[0];
                                $dec = $amount[1];
                            }else{
                                $amt = $ban->todays_price;
                                $dec = ''; 
                            }
                            ?>
                        <div class="intro-price">
                            <sup class="text-white">Today:</sup>
                            <span class="text-third">
                                Rs.{{$amt}}<sup>.{{$dec}}</sup>
                            </span>
                        </div><!-- End .intro-price -->
                        @endif
                        

                        <a href="{{url('/'.$ban->link_url)}}" class="btn btn-primary btn-round">
                            <span>{{$ban->link_title}}</span>
                            <i class="icon-long-arrow-right"></i>
                        </a>
                    </div><!-- End .col-lg-11 offset-lg-1 -->
                </div><!-- End .row -->
            </div><!-- End .intro-content -->
        </div><!-- End .intro-slide -->
        @endforeach

    </div><!-- End .intro-slider owl-carousel owl-simple -->

    <span class="slider-loader"></span><!-- End .slider-loader -->
</div><!-- End .intro-slider-container -->
<?php 
$get_deals = list_products('deals');
$get_savers = list_products('savers',3);
$get_populars = list_products('popular');
$get_new = list_products('new');
$get_best_rates = list_products('best_rate');
$get_arrivals = list_products('new',3);
$get_all_savers = list_products('savers');

?>
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
                            @if($get_deals->total() > 0)
                            @foreach($get_deals as $deals)
                            <div class="product product-2">
                                <figure class="product-media">
                                    <span class="product-label label-circle label-top">Top</span>
                                    <a href="{{url('/product/'.$deals->slug)}}">
                                        <img src="{{ $deals->product_img }}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="javascript::void(0)" class="btn-product-icon btn-wishlist" onclick="addToWishList(<?php echo $deals->id; ?>)" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="javascript::void(0)" class="btn-product btn-cart" onclick="addToCart(<?php echo $deals->id;?>)" title="Add to cart"><span>add cart</span></a>
                                        
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="{{url('/all_products/category/'.$deals->category_slug)}}">{{$deals->category_name ?? ''}}</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="{{url('/product/'.$deals->slug)}}">{{$deals->name}}</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        {{format_money($deals->mrp_price)}}
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
                            @endforeach
                            @endif
                        </div><!-- End .owl-carousel -->
            @if($get_savers->total() > 0)
            <table class="table table-wishlist table-mobile" style="background: #fff;">
            <thead>
                <tr>
                    <th><h5 class="mb-0 mt-3 pl-3">Top Savers Today</h5></th>
                </tr>
            </thead>
            <tbody>
                @foreach($get_savers as $savers)
                <tr>
                    <td class="product-col pl-3">
                        <div class="product">
                            <figure class="product-media">
                                <a href="{{url('/product/'.$savers->slug)}}">
                                    <img src="{{$savers->product_img}}" alt="Product image">
                                </a>
                            </figure>

                            <h3 class="product-title">
                                <a href="{{url('/product/'.$savers->slug)}}">{{$savers->name}}<br>{{format_money($savers->mrp_price)}}</a>
                            </h3><!-- End .product-title -->
                        </div><!-- End .product -->
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
            @endif
                </div><!-- End .banner -->
            </div><!-- End .col-xl-5col -->

            <div class="col-xl-4-5col">
                <div class="tab-content tab-content-carousel just-action-icons-sm">
                    <div class="tab-pane p-0 fade show active" id="trending-popular-tab" role="tabpanel" aria-labelledby="trending-popular-link">
                        <div class="row">
                            @if(!empty($get_populars->total() > 0))
                            @foreach($get_populars as $popular)
                            <div class="product product-2 col-4">
                                <figure class="product-media">
                                    <span class="product-label label-circle label-top">Top</span>
                                    <a href="{{url('/product/'.$popular->slug)}}">
                                        <img src="{{ $popular->product_img}}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="javascript::void(0)" onclick="addToWishList(<?php echo $popular->id; ?>)" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="javascript::void(0)" onclick="addToCart(<?php echo $popular->id; ?>)" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="{{url('/all_products/category/'.$popular->category_slug)}}">{{$popular->category_name ?? ''}}</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="{{url('/product/'.$popular->slug)}}">{{$popular->name ?? ''}}</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        {{format_money($popular->mrp_price)}}
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
                            @endforeach
                            @endif
                        <!-- End .owl-carousel -->
                        </div>
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane p-0 fade" id="trending-rate-tab" role="tabpanel" aria-labelledby="trending-rate-link">
                        <div class="row">
                            @if($get_best_rates->total() > 0)
                            @foreach($get_best_rates as $rates)
                            <div class="product product-2 col-4">
                                <figure class="product-media">
                                    <span class="product-label label-circle label-new">New</span>
                                    <a href="{{url('/product/'.$rates->slug)}}">
                                        <img src="{{ $rates->product_img}}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="javascript::void(0)" onclick="addToWishList(<?php echo $rates->id; ?>)" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="javascript::void(0)" onclick="addToCart(<?php echo $rates->id; ?>)" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="{{url('/all_products/category/'.$rates->category_slug)}}">{{$rates->category_name ?? ''}}</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="{{url('/product/'.$rates->slug)}}">{{$rates->name ?? ''}}</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        {{format_money($rates->mrp_price)}}
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
                            @endforeach
                            @endif
                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane p-0 fade" id="trending-new-tab" role="tabpanel" aria-labelledby="trending-new-link">
                        <div class="row">
                            @if(!empty($get_new))
                            @foreach($get_new as $new)
                            <div class="product product-2 col-4">
                                <figure class="product-media">
                                    <span class="product-label label-circle label-new">New</span>
                                    <a href="{{url('/product/'.$new->slug)}}">
                                        <img src="{{ $new->product_img }}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="javascript::void(0)" class="btn-product-icon btn-wishlist" onclick="addToWishList(<?php echo $new->id; ?>)" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="javascript::void(0)" class="btn-product btn-cart" onclick="addToCart(<?php echo $new->id; ?>)" title="Add to cart"><span>add to cart</span></a>
                                        
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="{{url('/all_products/category/'.$new->category_slug)}}">{{$new->category_name ?? ''}}</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="{{url('/product/'.$new->slug)}}">{{$new->name ?? ''}}</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        {{format_money($new->mrp_price)}}
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
                            @endforeach
                            @endif
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
                        <img src="{{ url('/public/assets/images/home1-payment-1.png') }}" alt=""/>
                    </span>
                    <div class="icon-box-content">
                      <h3 class="icon-box-title text-white font-weight-bold">Free Shipping on above Rs.1000</h3><!-- End .icon-box-title -->
                        <p class="text-white">On order value above Rs.1000/- shop more and pay less with new prorated shipping discounts</p>
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
                        <p class="text-white">Find a 10% discount when the original price for an item</p>
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
                        <p class="text-white">Your security is our priority. We protect your personal payment information so you don't have to worry.</p>
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
                @if($get_arrivals->total() > 0)
                @foreach($get_arrivals as $arrivals)
                <tr>
                    <td class="product-col pl-3">
                        <div class="product">
                            <figure class="product-media">
                                <a href="{{url('/product/'.$arrivals->slug)}}">
                                    <img src="{{ $arrivals->product_img }}" alt="Product image">
                                </a>
                            </figure>
                            <h3 class="product-title">
                                <a href="{{url('/product/'.$arrivals->slug)}}">{{$arrivals->name ?? ''}}<br>{{format_money($arrivals->mrp_price)}}</a>
                            </h3><!-- End .product-title -->
                        </div><!-- End .product -->
                    </td>
                </tr>
                @endforeach
                @endif
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
                            @if($get_best_rates->total() > 0)
                            @foreach($get_best_rates as $best)
                            <div class="product product-2">
                                <figure class="product-media">
                                    <span class="product-label label-circle label-top">Top</span>
                                    <a href="{{url('/product/'.$best->slug)}}">
                                        <img src="{{ $best->product_img }}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="javascript::void(0)" onclick="addToWishList(<?php echo $best->id; ?>)" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="javascript::void(0)" onclick="addToCart(<?php echo $best->id; ?>)" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="{{url('/all_products/category/'.$best->category_slug)}}">{{$best->category_name ?? ''}}</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="{{url('/product/'.$best->slug)}}">{{$best->name ?? ''}}</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        {{format_money($best->mrp_price)}}
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
                            @endforeach
                            @endif
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
                            @foreach($get_deals as $gdeals)
                            <div class="product product-2">
                                <figure class="product-media">
                                    <span class="product-label label-circle label-new">New</span>
                                    <a href="{{url('/product/'.$gdeals->slug)}}">
                                        <img src="{{ $gdeals->product_img }}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="javascript::void(0)" onclick="addToWishList(<?php echo $gdeals->id; ?>)" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="javascript::void(0)" onclick="addToCart(<?php echo $gdeals->id; ?>)" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="{{url('/all_products/category'.$gdeals->category_slug)}}">{{$gdeals->category_name ?? ''}}</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="{{url('/product/'.$gdeals->slug)}}">{{$gdeals->name ?? ''}}</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        {{format_money($gdeals->mrp_price)}}
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
                            @endforeach
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
                            @if($get_all_savers->total() > 0)
                            @foreach($get_all_savers as $save)
                            <div class="product product-2">
                                <figure class="product-media">
                                    <span class="product-label label-circle label-new">New</span>
                                    <a href="{{url('/product/'.$save->slug)}}">
                                        <img src="{{ $save->product_img }}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="javascript::void(0)" onclick="addToWishList(<?php echo $save->id; ?>)" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="javascript::void(0)" onclick="addToCart(<?php echo $save->id; ?>)" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="{{url('/all_products/category/'.$save->category_slug)}}">{{$save->category_name ?? ''}}</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="{{url('/product/'.$save->slug)}}">{{$save->name ?? ''}}</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        
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
                            @endforeach
                            @endif
                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .col-xl-4-5col -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</div><!-- End .bg-light pt-5 pb-6 -->
<div class="mb-4"></div><!-- End .mb-4 -->
@endsection

   