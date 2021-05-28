 @extends('layouts.app')

@section('content')

<div class="page-header text-center" style="background-image: url('{{ asset('public/assets/images/page-header-bg.jpg')}}')">
                <div class="container">
                    <h1 class="page-title">100% Fresh and Organic<span>Shop</span></h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->

            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        @switch($type)
                            @case('products')
                                <li class="breadcrumb-item active" aria-current="page">Products</li>
                                @break
                            @case('cat')
                                <li class="breadcrumb-item"><a href="{{url('/all_products')}}">Products</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$nav_category->name}}</li>
                                @break
                            @case('subcat')
                                <li class="breadcrumb-item"><a href="{{url('/all_products')}}">Products</a></li>
                                <li class="breadcrumb-item"><a href="{{url('/all_products/category/'.$nav_category->slug)}}">{{$nav_category->name ?? ''}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$sub_category->name ?? ''}}</li>
                                @break
                            @default
                                <li class="breadcrumb-item active" aria-current="page">Products</li>
                        @endswitch
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <div class="toolbox">
                        <div class="toolbox-left">
                            <a href="#" class="sidebar-toggler"><i class="icon-bars"></i>Filters</a>
                        </div><!-- End .toolbox-left -->

                        <div class="toolbox-center">
                            <div class="toolbox-info">
                                <?php $p = 0; ?>
                                @foreach($products as $m => $product)
                                <?php $p++; ?>
                                @endforeach
                                @if($products->total() > 0)
                                Showing <span>{{$p}} of {{$products->total()}}</span> Products
                                @endif
                            </div><!-- End .toolbox-info -->
                        </div><!-- End .toolbox-center -->
                        @if($products->total() > 0)
                        <div class="toolbox-right">
                            <div class="toolbox-sort">
                                <label for="sortby">Sort by:</label>
                                <div class="select-custom">
                                    <select name="sortby" id="sortby" class="form-control">
                                        <option value="popularity" selected="selected">Most Popular</option>
                                        <option value="rating">Most Rated</option>
                                        <option value="date">Date</option>
                                    </select>
                                </div>
                            </div><!-- End .toolbox-sort -->
                        </div><!-- End .toolbox-right -->
                        @endif
                    </div><!-- End .toolbox -->

                    <div class="products">
                        <div class="row">

                        @foreach($products as $p => $product)
                            
                            <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                <div class="product">
                                <figure class="product-media">
                                    @if($p == 0)
                                    <span class="product-label label-new">New</span>
                                    @endif
                                    @if($product->stock_count <= 0)
                                    <span class="product-label label-out">Out of stock</span>
                                    @endif
                                    <a href="{{url('/product/'.$product->slug)}}">
                                        @if(!empty($product->get_single_image()))
                                        <img src="{{ url('/public/assets/images/products/'.$product->get_single_image()) }}" alt="Product image" class="product-image">
                                        @else
                                        <img src="{{ url('/public/assets/images/fresh_default.jpg') }}" alt="Product image" class="product-image">
                                        @endif
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="javascript::void(0)" class="btn-product-icon btn-wishlist btn-expandable" onclick="addToWishList(<?php echo $product->id; ?>)"><span>add to wishlist</span></a>
                                    </div><!-- End .product-action -->
                                    @if($product->stock_count > 0)
                                    <div class="product-action action-icon-top">
                                        <a href="javascript::void(0)" class="btn-product btn-cart" onclick="addToCart(<?php echo $product->id; ?>)"><span>add to cart</span></a>
                                    </div><!-- End .product-action -->
                                    @endif
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">{{$product->get_sub_category()}}</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="{{url('/product/'.$product->slug)}}">{{$product->name}}</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                       {{format_money($product->mrp_price)}}
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 0%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 0 Reviews )</span>
                                    </div><!-- End .rating-container -->

                                    
                                </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                            
                        @endforeach
                            

                            


                            

                            

                            
                        </div><!-- End .row -->

                        <div class="load-more-container text-center">
                            {{$products->links()}}
                            <!-- <a href="#" class="btn btn-outline-darker btn-load-more">More Products <i class="icon-refresh"></i></a> -->
                            
                        </div><!-- End .load-more-container -->
                    </div><!-- End .products -->

                    <div class="sidebar-filter-overlay"></div><!-- End .sidebar-filter-overlay -->
                    <aside class="sidebar-shop sidebar-filter">
                        <div class="sidebar-filter-wrapper">
                            <div class="widget widget-clean">
                                <label><i class="icon-close"></i>Filters</label>
                                <a href="#" class="sidebar-filter-clear">Clean All</a>
                            </div><!-- End .widget -->
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                                        Category
                                    </a>
                                </h3><!-- End .widget-title -->

                                <div class="collapse show" id="widget-1">
                                    <div class="widget-body">
                                        <div class="filter-items filter-items-count">

                                            @foreach($get_category as $n => $category)
                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input select_category" id="cat-{{$n}}" data-id="{{$category->slug}}" data-src="{{$type}}">
                                                    <label class="custom-control-label" for="cat-{{$n}}">{{$category->name}}</label>
                                                </div><!-- End .custom-checkbox -->
                                                <span class="item-count">{{$category->products_count}}</span>
                                            </div><!-- End .filter-item -->
                                            @endforeach
                                        </div><!-- End .filter-items -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->

                        </div><!-- End .sidebar-filter-wrapper -->
                    </aside><!-- End .sidebar-filter -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
@endsection