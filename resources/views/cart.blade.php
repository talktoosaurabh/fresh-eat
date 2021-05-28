@extends('layouts.app')

@section('content')
  <!--=============================================
  =            cart page content         =
  =============================================-->

      <div class="page-header text-center" style="background-image: url('{{ asset('public/assets/images/page-header-bg.jpg') }}')">
            <div class="container">
              <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
            </div><!-- End .container -->
          </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
          @if(!$carts->isEmpty())
          <div class="page-content">
              <div class="cart">
                  <div class="container">
                  <div class="col-sm-12">
                    @if(Session::has('flash_success'))
                      <div class="alert alert-success" role="alert" id="success_msg">{{ Session::get('flash_success') }}</div>
                    @endif
                    @if(Session::has('flash_error'))
                      <div class="alert alert-danger" role="alert" id="error_msg">{{ Session::get('flash_error') }}</div>
                    @endif
                  </div><br>
                  <div class="row">
                    <div class="col-lg-9">
                      <table class="table table-cart table-mobile">
                        <thead>
                          <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($carts as $row)
                          <tr id="item_row_{{$row->id}}">
                            <td class="product-col">
                              <div class="product">
                                <figure class="product-media">
                                  <a href="#">
                                    @if(!empty($row->get_product_image()))
                                      <img src="{{url('/public/assets/images/products/'.$row->get_product_image())}}" alt="Product image">
                                    @else
                                      <img src="{{url('/public/assets/images/products/fresh_default.jpg')}}" alt="Product image">
                                    @endif
                                  </a>
                                </figure>
                                <h3 class="product-title">
                                  <a href="{{url('/product/'.$row->get_product()->slug)}}">{{$row->get_product()->name}}</a>
                                </h3><!-- End .product-title -->
                              </div><!-- End .product -->
                            </td>
                            <td class="price-col">{{format_money($row->get_product()->mrp_price)}}</td>
                            <td class="quantity-col">
                                <div class="cart-product-quantity">
                                    <input type="number" class="form-control update_cart_qty" id="{{$row->id}}" value="{{format_weight($row->quantity)}}" min="0.5" max="10" step="0.5" data-decimals="1" required>
                                </div><!-- End .cart-product-quantity -->
                            </td>
                            <td class="total-col" id="price_item_{{$row->id}}">{{format_money($row->item_price)}}</td>
                            <td class="remove-col"><a href="{{url('/cart/delete_item/'.$row->id)}}" class="btn-remove remove_item" ><i class="icon-close"></i></a></td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table><!-- End .table table-wishlist -->
                      <div class="cart-bottom">
                        <!-- <div class="cart-discount">
                          <form action="{{url('/apply_coupon')}}" method="POST">
                            @csrf
                            <div class="input-group">
                            <input type="text" class="form-control" required placeholder="coupon code" id="coupon_code" name="coupon_code">
                            <div class="input-group-append">
                          <button class="btn btn-outline-primary-2" type="submit"><i class="icon-long-arrow-right"></i></button>
                        </div>
                          </div>
                          </form>
                        </div>
 -->
                        <a href="{{url('/cart')}}" class="btn btn-outline-dark-2" ><span>UPDATE CART</span><i class="icon-refresh"></i></a>
                      </div><!-- End .cart-bottom -->
                      </div><!-- End .col-lg-9 -->
                      <aside class="col-lg-3">
                        <div class="summary summary-cart">
                          <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->
                        <form action="{{route('order_checkout')}}" method="post">
                          @csrf
                          <table class="table table-summary">
                            <tbody>
                              <tr class="summary-subtotal">
                                <td>Subtotal:</td>
                                <td>{{format_money($subtotal_price)}}</td>
                              </tr><!-- End .summary-subtotal -->
                              
                              <!-- <tr class="summary-shipping-estimate">
                                <td>Estimate for Your Country<br> <a href="#">Change address</a></td>
                                <td>&nbsp;</td>
                              </tr> --><!-- End .summary-shipping-estimate -->

                               
                              
                              <tr class="summary-total">
                                <td>Total:</td>
                                <td>{{format_money($grand_total)}}</td>
                              </tr><!-- End .summary-total -->
                            </tbody>
                          </table><!-- End .table table-summary -->

                          <button class="btn btn-outline-primary-2 btn-order btn-block" id="proceed_checkout">PROCEED TO CHECKOUT</button>
                        </form>
                        </div><!-- End .summary -->
                      <a href="{{url('/all_products')}}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                      </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                  </div><!-- End .container -->
              </div><!-- End .cart -->
          </div><!-- End .page-content -->  
          @else
          <div class="col-sm-4 text-center" style="margin: 0 auto;">
            <p>No items found in cart</p>
            <img src="{{url('/public/assets/images/empty.png')}}" width="80" style="margin: 0 auto;">
            <a href="{{url('/all_products')}}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
          </div>
          
          @endif
  <!--=====  End of cart page content  ======-->
@endsection