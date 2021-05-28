@extends('layouts.app')

@section('content')

            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/all_products')}}">Products</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
                    </ol>

                    <!-- <nav class="product-pager ml-auto" aria-label="Product">
                        <a class="product-pager-link product-pager-prev" href="#" aria-label="Previous" tabindex="-1">
                            <i class="icon-angle-left"></i>
                            <span>Prev</span>
                        </a>

                        <a class="product-pager-link product-pager-next" href="#" aria-label="Next" tabindex="-1">
                            <span>Next</span>
                            <i class="icon-angle-right"></i>
                        </a>
                    </nav> --><!-- End .pager-nav -->
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <div class="product-details-top">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-gallery product-gallery-vertical">
                                    <div class="row">
										@if(!$productImages->isEmpty())
                                        @foreach($productImages as $prod_image)
                                        @if($prod_image->is_featured == 1)
                                        <figure class="product-main-image">
                                            <img id="product-zoom" src="{{ url('/public/assets/images/products/'.$prod_image->image) }}" data-zoom-image="{{url('/public/assets/images/products/'.$prod_image->image)}}" alt="product image">
                                            <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                <i class="icon-arrows"></i>
                                            </a>
                                        </figure>
                                        @endif
                                        @endforeach
                                        <div id="product-zoom-gallery" class="product-image-gallery">
                                        @foreach($productImages as $prod_image)
                                            <a class="product-gallery-item active" href="#" data-image="{{ url('/public/assets/images/products/'.$prod_image->image) }}" data-zoom-image="{{ url('/public/assets/images/products/'.$prod_image->image) }}">
                                                <img src="{{url('/public/assets/images/products/'.$prod_image->image) }}" alt="product side">
                                            </a>
                                        @endforeach<!-- End .product-image-gallery -->

                                        </div>
										@else
											<figure class="product-main-image">
											<img src="{{url('/public/assets/images/fresh_default.jpg') }}" alt="product side" width="300">		
											</figure>
										@endif
                                    </div><!-- End .row -->
                                </div><!-- End .product-gallery -->
                            </div><!-- End .col-md-6 -->

                            <div class="col-md-6">
                                <div class="product-details">
                                    <h1 class="product-title">{{$product->name}}</h1><!-- End .product-title -->

                                <!--    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 80%;"></div> -->
<!-- End .ratings-val -->
                                   <!--  </div> -->  <!--  End .ratings -->
                                       <!--    <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews )</a>    -->
                                    </div><!-- End .rating-container -->

                                    <div class="product-price">
                                        {{format_money($product->mrp_price)}}/{{format_weight($product->weight).' '.$product->weight_units}}
                                    </div><!-- End .product-price -->

                                    <div class="product-content text_wrappings">
                                        <p>{!!$product->description!!} </p>
                                    </div><!-- End .product-content -->
                                    @if($product->stock_count > 0)
                                    <div class="details-filter-row details-row-size">
                                        <label for="qty">Qty in kg:</label>
                                        <div class="product-details-quantity">
                                            <input type="number" id="qty" class="form-control" value="0.5" min="0" max="10" step="0.5" data-decimals="1" required>
                                        </div><!-- End .product-details-quantity -->
                                    </div><!-- End .details-filter-row -->
                                    @endif
                                    <div class="product-details-action">
                                        @if($product->stock_count > 0)
                                        <a href="#" class="btn-product btn-cart" onclick="addToCart(<?php echo $product->id; ?>)"><span>add to cart</span></a>
                                        @endif
                                        <div class="details-action-wrapper">
                                            <a href="#" onclick="addToWishList(<?php echo $product->id; ?>)" class="btn-product btn-wishlist" title="Wishlist"><span>Add to Wishlist</span></a>                                            
                                        </div><!-- End .details-action-wrapper -->
                                    </div><!-- End .product-details-action -->
                                    <div class="row">
                                        <div class="alert alert-success" role="alert" id="success_msg" style="display: none"></div>
                                        <div class="alert alert-danger" role="alert" id="error_msg" style="display: none"></div> 
                                    </div>
                                    
                                </div><!-- End .product-details -->
                            </div><!-- End .col-md-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .product-details-top -->

                    <div class="product-details-tab">
                        <ul class="nav nav-pills justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab" aria-controls="product-info-tab" aria-selected="false">Additional information</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">Shipping & Returns</a>
                            </li> -->
<!--                             <li class="nav-item">
                                <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews (2)</a>
                            </li> -->
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                                <div class="product-desc-content">
                                    <h3>Product Information</h3>
                                    {!!$product->description!!}
                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                                <div class="product-desc-content">
                                    <h3>Information</h3>
                                    {!!$product->additional_information!!}

                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->
<!--                             <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link">
                                <div class="product-desc-content">
                                    <h3>Delivery & returns</h3>
                                    {!!$product->shipping_returns!!}
                                </div>
                            </div> -->
                            <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                                <div class="reviews">
                                    <h3>Reviews (2)</h3>
                                    <div class="review">
                                        <div class="row no-gutters">
                                            <div class="col-auto">
                                                <h4><a href="#">Samanta J.</a></h4>
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                </div><!-- End .rating-container -->
                                                <span class="review-date">6 days ago</span>
                                            </div><!-- End .col -->
                                            <div class="col">
                                                <h4>Good, perfect size</h4>

                                                <div class="review-content">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus cum dolores assumenda asperiores facilis porro reprehenderit animi culpa atque blanditiis commodi perspiciatis doloremque, possimus, explicabo, autem fugit beatae quae voluptas!</p>
                                                </div><!-- End .review-content -->

                                                <div class="review-action">
                                                    <a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>
                                                    <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                                </div><!-- End .review-action -->
                                            </div><!-- End .col-auto -->
                                        </div><!-- End .row -->
                                    </div><!-- End .review -->

                                    <div class="review">
                                        <div class="row no-gutters">
                                            <div class="col-auto">
                                                <h4><a href="#">John Doe</a></h4>
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                </div><!-- End .rating-container -->
                                                <span class="review-date">5 days ago</span>
                                            </div><!-- End .col -->
                                            <div class="col">
                                                <h4>Very good</h4>

                                                <div class="review-content">
                                                    <p>Sed, molestias, tempore? Ex dolor esse iure hic veniam laborum blanditiis laudantium iste amet. Cum non voluptate eos enim, ab cumque nam, modi, quas iure illum repellendus, blanditiis perspiciatis beatae!</p>
                                                </div><!-- End .review-content -->

                                                <div class="review-action">
                                                    <a href="#"><i class="icon-thumbs-up"></i>Helpful (0)</a>
                                                    <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                                </div><!-- End .review-action -->
                                            </div><!-- End .col-auto -->
                                        </div><!-- End .row -->
                                    </div><!-- End .review -->
                                </div><!-- End .reviews -->
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .product-details-tab -->

                </div><!-- End .container -->
            </div>
@endsection