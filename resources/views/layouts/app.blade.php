<!DOCTYPE php>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{@$title ?? 'Fresh Eat' }}</title>
    <meta name="description" content="{{@$desc ?? ''}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-title" content="FreshEatFresh">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="theme-color" content="#ffffff">
    <!-- Favicon -->
    <link rel="icon" href="{{url('/')}}/public/assets/images/favicon.ico">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('/public/assets/images/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('/public/assets/images/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('/public/assets/images/icons/favicon-16x16.png') }}">
    <!-- CSS
  ============================================ -->
    <!-- Bootstrap CSS -->
    <link href="{{url('/')}}/public/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="{{ url('/public/assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css') }}">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{url('/public/assets/css/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{url('/public/assets/css/plugins/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{url('/public/assets/css/plugins/jquery.countdown.css')}}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{url('/public/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{url('/public/assets/css/plugins/nouislider/nouislider.css')}}">
    <link rel="stylesheet" href="{{url('/public/assets/css/skins/skin-demo-4.css')}}">
    <link rel="stylesheet" href="{{url('/public/assets/css/demos/demo-4.css') }}">
    <link rel="stylesheet" href="{{url('/public/css/custom.css')}}">
</head>
<script type="text/javascript">
    var site_url = "{{url('/')}}";
</script>
<style type="text/css">
            #loader-wrapper {
                 background: #fff;
            }
            #loader {
                border-top-color: #008A73 !important;
            }
            /******************* LOADER ******************/
            .loaded #loader-wrapper {
                visibility: hidden;
                -webkit-transition: all 0.4s 0.6s ease-out;
                    -ms-transition: all 0.4s 0.6s ease-out;
                        transition: all 0.4s 0.6s ease-out;
            }
            .loaded #loader {
                opacity: 0;
                -webkit-transition: all 0.3s 0.6s ease-out;
                    -ms-transition: all 0.3s 0.6s ease-out;
                        transition: all 0.3s 0.6s ease-out;
            }
            #loader-wrapper {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 9999;
            }
            #loader {
                display: block;
                position: relative;
                left: 50%;
                top: 50%;
                width: 150px;
                height: 150px;
                margin: -75px 0 0 -75px;
                border-radius: 50%;
                border: 15px solid #0000000d;
                -webkit-animation: spin 1s linear infinite;
                        animation: spin 1s linear infinite;
            }
            body[dir="rtl"] #loader {
                right: 50%;
                left: auto;
                margin: -75px -75px 0 0;
            }
            #loader:before {
                content: "";
                position: absolute;
                top: 5px;
                left: 5px;
                right: 5px;
                bottom: 5px;
                border-radius: 50%;
                border: 6px solid transparent;
                -webkit-animation: spin 3s linear infinite;
                        animation: spin 3s linear infinite;
            }
            #loader:after {
                content: "";
                position: absolute;
                top: 15px;
                left: 15px;
                right: 15px;
                bottom: 15px;
                border-radius: 50%;
                border: 3px solid transparent;
                -webkit-animation: spin 1.5s linear infinite;
                        animation: spin 1.5s linear infinite;
            }
            @-webkit-keyframes spin {
                0% {
                    -webkit-transform: rotate(0deg);
                        -ms-transform: rotate(0deg);
                            transform: rotate(0deg);
                }
                100% {
                    -webkit-transform: rotate(360deg);
                        -ms-transform: rotate(360deg);
                            transform: rotate(360deg);
                }
            }
            @keyframes spin {
                0% {
                    -webkit-transform: rotate(0deg);
                        -ms-transform: rotate(0deg);
                            transform: rotate(0deg);
                }
                100% {
                    -webkit-transform: rotate(360deg);
                        -ms-transform: rotate(360deg);
                            transform: rotate(360deg);
                }
            }
</style>
<body class="">
    <div id="loader-wrapper">
        <div id="loader">

        </div>
    </div>
    <?php $cart_items = get_cart_items();
          $item_carts = $cart_items['cart_item'];
          $all_category = category_with_subcategory();
    ?>

    <div class="page-wrapper">
        <header class="header header-intro-clearance header-4">
            <div class="header-top py-3">
                <div class="container">
                    <div class="header-left">
                        <a href="tel:#"><i class="icon-phone"></i>Call: +91-8317321650</a>
                        <i class="icon-map-marker pl-4"></i>No-11, 6th cross, 6th block koramangala bangalore-95
                    </div><!-- End .header-left -->

                    <div class="header-right">

                        <ul class="top-menu">
                            <li>
                                <a href="#">Links</a>
                                <ul>
                                    <li>
                                        <i class="icon-telegram-plane"></i> Online Order and Shipped Today
                                    </li>
                                    @guest
                                    <li><i class="icon-user pl-4"></i> <a href="#signin-modal" data-toggle="modal">Login / Register</a></li>
                                    @else
                                    <li>
                                        <i class="icon-signout"></i>
                                        <a href="{{url('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">   Logout </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                           {{ csrf_field() }}
                                        </form>
                                     </li>
                                    @endguest
                                </ul>
                            </li>
                        </ul><!-- End .top-menu -->
                    </div><!-- End .header-right -->

                </div><!-- End .container -->
            </div><!-- End .header-top -->

            <div class="header-middle">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>

                        <a href="{{ url('/') }}" class="logo">
                            <img src="{{ url('/public/assets/images/demos/demo-4/logo.png') }}" alt="FreshEatFresh Logo" width="105" height="25">
                        </a>
                    </div><!-- End .header-left -->

                    <div class="header-center">
                        <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper search-wrapper-wide">
                                    <label for="q" class="sr-only">Search</label>
                                    <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                                    <input type="search" class="form-control" name="q" id="q" placeholder="Search product ..." required>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                    </div>
                <div class="header-right">
                    <div class="social-icons">
                        <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
                        <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                        <a href="#" class="social-icon" target="_blank" title="Skype"><i class="icon-skype"></i></a>
                        <a href="#" class="social-icon" target="_blank" title="Pintrest"><i class="icon-pinterest"></i></a>
                    </div>
                    <div class="dropdown cart-dropdown">
                        <a href="{{url('/cart')}}" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                            <div class="icon">
                                <i class="icon-shopping-cart"></i>
                                <span class="cart-count">{{cart_item_counts()}}</span>
                            </div>
                            <p>Cart</p>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-cart-products">

                            @if(!$item_carts->isEmpty())

                                @foreach($item_carts as $item)
                                <div class="product">
                                    <div class="product-cart-details">
                                        <h4 class="product-title">
                                            <a href="{{url('/product/'.$item->slug)}}">{{$item->product_name}}</a>
                                        </h4>

                                        <span class="cart-product-info">
                                            <span class="cart-product-qty">{{format_weight($item->quantity)}}</span>
                                            x {{format_money($item->product_price).'/'.$item->units}}
                                        </span>
                                    </div><!-- End .product-cart-details -->

                                    <figure class="product-image-container">
                                        <a href="{{url('/product/'.$item->get_product()->slug)}}" class="product-image cart_sample">
                                            <img src="{{ $item->prod_img }}" alt="product">
                                        </a>
                                    </figure>
                                    <a href="{{url('/cart/delete_item/'.$item->id)}}" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                </div><!-- End .product -->
                                @endforeach

                            </div><!-- End .cart-product -->

                            <div class="dropdown-cart-total">
                                <span>Total</span>

                                <span class="cart-total-price">{{format_money($cart_items['order_total'])}}</span>
                            </div><!-- End .dropdown-cart-total -->
                            <div class="dropdown-cart-action">
                                <a href="{{url('/cart')}}" class="btn btn-primary">View Cart</a>
                                <a href="{{url('/checkouts')}}" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .dropdown-cart-total -->
                            @else
                                <span>No items found in cart</span>
                            @endif

                        </div><!-- End .dropdown-menu -->
                    </div>
                                <!-- End .compare-dropdown -->
                </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->

            <div class="header-bottom sticky-header">
                <div class="container">
                    <div class="header-left">
                        <div class="dropdown category-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Browse Categories">
                                Browse Categories <i class="icon-angle-down"></i>
                            </a>

                            <div class="dropdown-menu">
                                <nav class="side-nav">
                                    <ul class="menu-vertical sf-arrows">
                                        <!-- class="item-lead" -->
                                    <?php $categories = all_categories(); ?>
                                        @foreach($categories as $category)
                                        <li><a href="{{url('all_products/category/'.$category->slug)}}">{{$category->name}}</a></li>
                                        @endforeach

                                    </ul><!-- End .menu-vertical -->
                                </nav><!-- End .side-nav -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .category-dropdown -->
                    </div><!-- End .header-left -->

                    <div class="header-center">
                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="active">
                                    <a href="{{url('/')}}">Home</a>
                                </li>
                                <li><a href="#" class="sf-with-ul">Our Products</a>
                                    <ul>
                                        @foreach($all_category as $category)
                                            @if($category->sub_status == '0')
                                            <li><a href="{{url('all_products/category/'.$category->slug)}}">{{$category->name}}</a></li>
                                            @else
                                            <li>
                                                <a href="#" class="sf-with-ul">{{$category->name}}</a>
                                             <ul>
                                                @foreach($category->subcategory as $sub_cat)
                                                <li><a href="{{url('all_products/sub-category/'.$sub_cat->slug)}}">{{$sub_cat->name}}</a></li>
                                                @endforeach
                                            </ul>
                                            </li>
                                            @endif
                                        @endforeach
                                    </ul><!-- End .megamenu megamenu-md -->
                                </li>
                                <li>
                                    <a href="{{url('/all_products')}}">Food</a>
                                </li>
                                <li>
                                    <a href="{{url('/about')}}">About Us</a>
                                </li>
                                <li>
                                    <a href="{{url('/contact')}}">Contact Us</a>
                                </li>

                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-center -->

                    <div class="header-right">
                        <div class="wishlist">
                            <a href="{{url('/wishlist')}}" title="Wishlist">
                                <div class="icon">
                                    <i class="icon-heart-o"></i>
                                    <span class="wishlist-count badge">{{wishlist_item_counts()}}</span>
                                </div>
                                <p class="text-white">Wishlist</p>
                            </a>
                        </div>

                    </div>
                </div><!-- End .container -->
            </div><!-- End .header-bottom -->
        </header><!-- End .header -->

        <main class="main">
            @yield('content')
            <div id="snackbar"></div>
        </main><!-- End .main -->

        <footer class="footer">
            <div class="cta bg-image bg-dark pt-4 pb-5 mb-0"
            style="background-image: url('{{ asset('public/assets/images/demos/demo-4/bg-5.jpg') }}');">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-sm-10 col-md-8 col-lg-6">
                            <div class="cta-heading text-center">
                                <h3 class="cta-title text-white">Sign Up to Newsletter</h3><!-- End .cta-title -->
                                <p class="cta-desc text-white">Subscribe our newsletter &amp; get notification about information discount</p><!-- End .cta-desc -->
                            </div><!-- End .text-center -->

                            <form action="#">
                                <div class="input-group input-group-round">
                                    <input type="email" class="form-control form-control-white" placeholder="Enter your Email Address" aria-label="Email Adress" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit" style="background:#008a73;"><span>Subscribe</span><i class="icon-long-arrow-right"></i></button>
                                    </div><!-- .End .input-group-append -->
                                </div><!-- .End .input-group -->
                            </form>
                        </div><!-- End .col-sm-10 col-md-8 col-lg-6 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .cta -->
            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="widget widget-about">
                                <img src="{{url('/public/assets/images/demos/demo-4/logo.png')}}" class="footer-logo" alt="Footer Logo" width="105" height="25">
                                <p>We, Fresh eat, work sincerely to provide you with the best quality food and other kitchen essentials to your doorstep.</p>

                                <div class="widget-call">
                                    <i class="icon-phone"></i>
                                    For Enquiry? Call us 24/7
                                    <a href="tel:+919066260018">+91-9066260018</a>
                                </div><!-- End .widget-call -->
                            </div><!-- End .widget about-widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">Information</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="{{url('/about')}}">About Us</a></li>
                                    <!-- <li><a href="blog.html">Blog</a></li> -->
                                    <!-- <li><a href="#">Delivery Information</a></li>  -->
                                    <li><a href="{{url('/privacy-policy')}}">Privacy Policy</a></li>
                                    <li><a href="{{url('/terms-condition')}}">Terms and Conditions</a></li>
                                    <li><a href="{{url('/return-policy')}}">Return Policy</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">My Account</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="{{url('/account')}}">My Account</a></li>
                                    <li><a href="{{url('/cart')}}">Shopping Cart</a></li>
                                    <li><a href="{{url('/wishlist')}}">Wishlist</a></li>
                                    <li><a href="{{url('/account')}}">Order History</a></li>
                                    <li><a href="{{url('/shipping-policy')}}">Shipping Policy</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">Contact Us</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="#"><strong>Address:</strong> No-11, 6th cross, 6th block koramangala bangalore-95</a></li>
                                    <li><strong>Email:</strong> <a href="mailto:eatfresh9900@gmail.com">eatfresh9900@gmail.com</a></li>
                                    <li><strong>Phone:</strong> <a href="tel:+918317321650">+91-8317321650</a></li>
                                    <li><strong>Payment Accepted</strong>
                                        <figure class="footer-payments pt-2">
                        <img src="{{ url('/public/assets/images/payments.png') }}" alt="Payment methods" width="272" height="20">
                    </figure></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .footer-middle -->

            <div class="footer-bottom">
                <div class="container">
                    <p class="footer-copyright">Copyright © 2021 FreshEatFresh Store. Design by <a href="https://www.webdigitalmantra.in/">Web Digital Mantra IT Services Pvt Ltd</a>. All Rights Reserved.</p><!-- End .footer-copyright -->
                    <figure class="footer-payments">

                        <a href="{{url('/privacy-policy')}}">Privacy Policy</a> | <a href="{{url('/terms-condition')}}">Terms</a>
                    </figure>
                    <!-- End .footer-payments -->
                </div><!-- End .container -->
            </div><!-- End .footer-bottom -->
        </footer><!-- End .footer -->
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container mobile-menu-light">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>

            <form action="#" method="get" class="mobile-search">
                <label for="mobile-search" class="sr-only">Search</label>
                <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search in..." required>
                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
            </form>

            <ul class="nav nav-pills-mobile nav-border-anim" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="mobile-menu-link" data-toggle="tab" href="#mobile-menu-tab" role="tab" aria-controls="mobile-menu-tab" aria-selected="true">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="mobile-cats-link" data-toggle="tab" href="#mobile-cats-tab" role="tab" aria-controls="mobile-cats-tab" aria-selected="false">Categories</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="mobile-menu-tab" role="tabpanel" aria-labelledby="mobile-menu-link">
                    <nav class="mobile-nav">
                        <ul class="mobile-menu">
                                <li class="active">
                                    <a href="{{url('/')}}">Home</a>
                                </li>
                                <li><a href="#">Our Products</a>

                                    <ul>
                                        @foreach($all_category as $category)
                                            @if($category->sub_status == '0')
                                            <li><a href="{{url('all_products/category/'.$category->slug)}}">{{$category->name}}</a></li>
                                            @else
                                            <li>
                                                <a href="#" class="sf-with-ul">{{$category->name}}</a>
                                             <ul>
                                                @foreach($category->subcategory as $sub_cat)
                                                <li><a href="{{url('all_products/sub-category/'.$sub_cat->slug)}}">{{$sub_cat->name}}</a></li>
                                                @endforeach
                                            </ul>
                                            </li>
                                            @endif
                                        @endforeach
                                    </ul><!-- End .megamenu megamenu-md -->
                                </li>
                                <li><a href="{{url('/all_products')}}">Food</a>  </li>
                                <li><a href="{{url('/about')}}">About Us</a></li>
                                <li><a href="{{url('/contact')}}">Contact Us</a></li>

                            </ul>

                    </nav><!-- End .mobile-nav -->
                </div><!-- .End .tab-pane -->
<!--                 <div class="tab-pane fade" id="mobile-cats-tab" role="tabpanel" aria-labelledby="mobile-cats-link">
                    <nav class="mobile-cats-nav">
                        <ul class="mobile-cats-menu">
                            <li><a class="mobile-cats-lead" href="#">Daily offers</a></li>
                            <li><a class="mobile-cats-lead" href="#">Gift Ideas</a></li>
                            <li><a href="#">Beds</a></li>
                            <li><a href="#">Lighting</a></li>
                            <li><a href="#">Sofas & Sleeper sofas</a></li>
                            <li><a href="#">Storage</a></li>
                            <li><a href="#">Armchairs & Chaises</a></li>
                            <li><a href="#">Decoration </a></li>
                            <li><a href="#">Kitchen Cabinets</a></li>
                            <li><a href="#">Coffee & Tables</a></li>
                            <li><a href="#">Outdoor Furniture </a></li>
                        </ul>
                    </nav>
                </div> -->
            </div><!-- End .tab-content -->

            <div class="social-icons">
                <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

    <!-- Sign in / Register Modal -->
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>

                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill nav-border-anim" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="tab-content-5">
                                <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                    <form action="{{route('login')}}" method="post" id="pop_login">
                                        @csrf
                                        <div class="form-group">
                                            <label for="singin-email">Username or email address *</label>
                                            <input type="text" class="form-control" id="singin-email" name="email" required>
                                            <p id="error-email" class="class_error"></p>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="singin-password">Password *</label>
                                            <input type="password" class="form-control" id="singin-password" name="password" required>
                                            <p class="class_error" id="error-password"></p>
                                            <p class="message-error class_error"></p>

                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2" id="user_login">
                                                <span>LOG IN</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="signin-remember">
                                                <label class="custom-control-label" for="signin-remember">Remember Me</label>
                                            </div><!-- End .custom-checkbox -->

                                            <!-- <a href="#" class="forgot-link">Forgot Your Password?</a> -->
                                        </div><!-- End .form-footer -->
                                    </form>
                                    <!-- <div class="form-choice">
                                        <p class="text-center">or sign in with</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-g">
                                                    <i class="icon-google"></i>
                                                    Login With Google
                                                </a>
                                            </div>
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-f">
                                                    <i class="icon-facebook-f"></i>
                                                    Login With Facebook
                                                </a>
                                            </div>
                                        </div>
                                    </div> --><!-- End .form-choice -->
                                </div><!-- .End .tab-pane -->
                                <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                    <form action="{{route('register')}}" id="pop_register" method="POST">
                                        <div class="form-group">
                                            <label for="register-email">Your Name *</label>
                                            <input type="text" class="form-control" id="register-name" name="name" required>
                                            <p id="rerror_name" class="class_error"></p>

                                        </div>
                                        <div class="form-group">
                                            <label for="register-email">Your email address *</label>
                                            <input type="email" class="form-control" id="register-email" name="email" required>
                                            <p id="rerror_email" class="class_error"></p>

                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="register-password">Password *</label>
                                            <input type="password" class="form-control" id="register-password" name="password" required>
                                            <p id="rerror_password" class="class_error"></p>
                                        </div><!-- End .form-group -->
                                        <div class="form-group">
                                            <label for="register-password">Confirm Password *</label>
                                            <input type="password" class="form-control" id="register-password" name="confirm_password" required>
                                            <p id="rerror_confirm_password" class="class_error"></p>
                                            <p class="rmessage-error class_error"></p>
                                        </div>
                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2" id="add_user">
                                                <span>SIGN UP</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="register-policy" required name="policy">
                                                <label class="custom-control-label" for="register-policy">I agree to the <a href="#">privacy policy</a> *</label>
                                                <p id="rerror_policy" class="class_error"></p>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .form-footer -->
                                    </form>
                                   <!--  <div class="form-choice">
                                        <p class="text-center">or sign in with</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-g">
                                                    <i class="icon-google"></i>
                                                    Login With Google
                                                </a>
                                            </div>
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login  btn-f">
                                                    <i class="icon-facebook-f"></i>
                                                    Login With Facebook
                                                </a>
                                            </div>
                                        </div>
                                    </div> --><!-- End .form-choice -->
                                </div><!-- .End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .form-tab -->
                    </div><!-- End .form-box -->
                </div><!-- End .modal-body -->
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->

    <script src="{{ url('/public/assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript">
        function addToWishList(product_id){
           $.ajax({
               url: '{{ url('add-to-wishlist') }}',
               method: "POST",
               data: {_token: '{{ csrf_token() }}', "product_id":product_id},
               dataType: "json",
               success: function (response) {
                  var x = document.getElementById("snackbar");
                  x.className = "show";
                  x.innerHTML = 'Item added to wishlist';
                  setTimeout(function(){ x.className = x.className.replace("show", ""); location.reload(); }, 3000);
               }
           });
        }

        function addToCart(product_id){
            var quantity = $('#qty').val();
            if(quantity == undefined){
                quantity = 1;
            }
            $.ajax({
                url: '{{ url('add-to-cart') }}',
                method: "POST",
                data: {_token: '{{ csrf_token() }}', "product_id":product_id,"quantity":quantity},
                dataType: "json",
                success: function (response) {
                  var x = document.getElementById("snackbar");
                  x.className = "show";
                  x.innerHTML = 'Item added to cart';
                  setTimeout(function(){ x.className = x.className.replace("show", ""); location.reload(); }, 3000);
                }
            });
        }

        function addToCartListing(product_id){
            var quantity = $('#quantity'+product_id).val();
            if(quantity == undefined){
                quantity = 1;
            }
            $.ajax({
                url: '{{ url('add-to-cart') }}',
                method: "POST",
                data: {_token: '{{ csrf_token() }}', "product_id":product_id,"quantity":quantity},
                dataType: "json",
                success: function (response) {
                  location.reload();
                }
            });
        }
    </script>
    <script src="{{ url('/public/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('/public/assets/js/jquery.hoverIntent.min.js') }}"></script>
    <script src="{{ url('/public/assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ url('/public/assets/js/superfish.min.js') }}"></script>
    <script src="{{ url('/public/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('/public/assets/js/bootstrap-input-spinner.js') }}"></script>
    <script src="{{ url('/public/assets/js/jquery.elevateZoom.min.js') }}"></script>
    <script src="{{ url('/public/assets/js/jquery.plugin.min.js') }}"></script>
    <script src="{{ url('/public/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ url('/public/assets/js/jquery.countdown.min.js') }}"></script>
    <!-- Main JS File -->
    <script src="{{ url('/public/assets/js/main.js') }}"></script>
    <script src="{{ url('/public/assets/js/demos/demo-4.js')}}"></script>
    <script src="{{ asset('/public/assets/js/homecustom.js') }}"></script>
</body>

</body>

</html>
