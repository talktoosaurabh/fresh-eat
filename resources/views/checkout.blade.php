@extends('layouts.app')

@section('content')
<div class="page-header text-center" style="background-image: url('{{ asset('public/assets/images/page-header-bg.jpg') }}')">
            <div class="container">
              <h1 class="page-title">Checkout<span>Shop</span></h1>
            </div><!-- End .container -->
          </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
              <div class="checkout">
                  <div class="container">
                    @if(Session::has('flash_success'))
                      <div class="alert alert-success" role="alert" id="success_msg">{{ Session::get('flash_success') }}</div>
                    @endif
                    @if(Session::has('flash_error'))
                      <div class="alert alert-danger" role="alert" id="error_msg">{{ Session::get('flash_error') }}</div>
                    @endif
                  <div class="checkout-discount">
                    <form action="{{url('/applyCoupon')}}" method ="POST" id="coupon_apply">
                      @csrf
                    <input type="text" class="form-control" required id="checkout-discount-input" name="couponcode">
                    <input type="hidden" name="order_id" value="{{$get_order->id}}">
                      <label for="checkout-discount-input" class="text-truncate">Have a coupon? <span>Click here to enter your code</span></label>
                    </form>
                  </div>
                  <form action="{{route('checkout.placeorder')}}" method="post">
                    @csrf
                      <div class="row">
                        <div class="col-lg-9">
                          <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
                            <div class="row">
                              <div class="col-sm-6">
                                <label>Name *</label>
                                <input type="text" class="form-control" name="name" required 
                                value="{{Auth::user()->name ?? ''}}">
                                @if ($errors->has('name'))
                                <span class="required">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif 
                              </div><!-- End .col-sm-6 -->

                              <div class="col-sm-6">
                                <label>Email *</label>
                                <input type="text" class="form-control" name="email" required value="{{Auth::user()->email ?? ''}}">
                                @if ($errors->has('email'))
                                <span class="required">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif 
                              </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->
                          <div class="row">
                            <div class="col-sm-12">
                              <label>Street address *</label>
                              <input type="text" class="form-control" placeholder="House number and Street name or Appartments, suite, unit etc ..." name="address" value="{{Auth::user()->street ?? ''}}" required>
                              @if ($errors->has('address'))
                                    <span class="required">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                              @endif 
                            </div><!-- End .col-sm-6 -->
                          </div><!-- End .row -->
                          <div class="row">
                              <div class="col-sm-6">
                                <label>Town / City *</label>
                                <input type="text" class="form-control" name="town" value="{{Auth::user()->city ?? ''}}" required>
                                @if ($errors->has('town'))
                                    <span class="required">
                                        <strong>{{ $errors->first('town') }}</strong>
                                    </span>
                                @endif 
                              </div><!-- End .col-sm-6 -->

                              <div class="col-sm-6">
                                <label>State / County *</label>
                                <input type="text" class="form-control" name="state" value="{{Auth::user()->state ?? ''}}" required>
                                @if ($errors->has('state'))
                                    <span class="required">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif 
                              </div><!-- End .col-sm-6 -->
                          </div><!-- End .row -->
              
                          <div class="row">
                            <div class="col-sm-6">
                              <label>Country *</label> 
                              <input type="text" class="form-control" name="country" value="{{Auth::user()->country ?? ''}}" required>
                              @if ($errors->has('country'))
                                <span class="required">
                                    <strong>{{ $errors->first('country') }}</strong>
                                </span>
                              @endif
                            </div>
                            <div class="col-sm-6">
                              <label>Postcode / ZIP *</label>
                              <input type="text" class="form-control" name="pincode" value="{{Auth::user()->pincode ?? ''}}" required>
                              @if ($errors->has('pincode'))
                                <span class="required">
                                    <strong>{{ $errors->first('pincode') }}</strong>
                                </span>
                              @endif
                            </div><!-- End .col-sm-6 -->
                          </div><!-- End .row -->
                          <div class="row">
                            @guest
                            <div class="col-sm-6">
                            @else
                            <div class="col-sm-12">
                            @endguest
                            <label>Phone *</label>
                            <input type="tel" class="form-control" name="phone" value="{{Auth::user()->phone ?? ''}}" required>
                            @if ($errors->has('phone'))
                              <span class="required">
                                  <strong>{{ $errors->first('phone') }}</strong>
                              </span>
                            @endif
                            <input type="hidden" name="order_id" value="{{$get_order->id}}">
                            </div>
                            @guest
                            <div class="col-sm-6">
                              <label>Password *</label>
                              <input type="text" class="form-control" name="password" required>
                              @if ($errors->has('password'))
                                <span class="required">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                              @endif
                            </div>
                            @endguest
                          </div><!-- End .col-sm-6 -->


                        <label>Order notes (optional)</label>
                        <textarea class="form-control" cols="30" rows="4" placeholder="Notes about your order, e.g. special notes for delivery" name="order_note"></textarea>
                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-3">
                          <div class="summary">
                            <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                            <table class="table table-summary">
                              <thead>
                                <tr>
                                  <th>Product</th>
                                  <th>Total</th>
                                </tr>
                              </thead>
                              
                              <tbody>
                                @foreach($orders_list as $list)
                                <tr>
                                  <td><a href="{{url('/product/'.$list->product_slug)}}">{{$list->product_name}}</a></td>
                                  <td>{{format_money($list->mrp_price)}}</td>
                                </tr>
                                @endforeach

                                <tr class="summary-subtotal">
                                  <td>Order Total:</td>
                                  <td>{{format_money($get_order->order_price)}}</td>
                                </tr><!-- End .summary-subtotal -->
                        <tr class="summary-shipping">
                          <td>Shipping:</td>
                          <td>&nbsp;</td>
                        </tr>

                        <tr class="summary-shipping-row">
                          <td>
                          <div class="custom-control custom-radio">
                            <input type="radio" id="free-shipping" name="shipping" class="custom-control-input shipping_type" value="0" checked="checked">
                            <label class="custom-control-label" for="free-shipping">Free Shipping</label>
                          </div><!-- End .custom-control -->
                          </td>
                          <td>Rs.0.00</td>
                        </tr><!-- End .summary-shipping-row -->

                        <tr class="summary-shipping-row">
                          <td>
                          <div class="custom-control custom-radio">
                            <input type="radio" id="standart-shipping" name="shipping" class="custom-control-input shipping_type" value="10">
                            <label class="custom-control-label" for="standart-shipping">Standard:</label>
                          </div><!-- End .custom-control -->
                          </td>
                          <td>Rs.10.00</td>
                        </tr><!-- End .summary-shipping-row -->

                        <tr class="summary-shipping-row">
                          <td>
                          <div class="custom-control custom-radio">
                            <input type="radio" id="express-shipping" name="shipping" class="custom-control-input shipping_type" value="20">
                            <label class="custom-control-label" for="express-shipping">Express:</label>
                          </div><!-- End .custom-control -->
                          </td>
                          <td>Rs.20.00</td>
                        </tr><!-- End .summary-shipping-row -->
                        @if(!empty($get_order->coupon_id))
                        <tr></tr>
                        <tr>
                          <td>Coupon off of {{$get_order->display_text}}</td>
                          <td>{{'-'.format_money($get_order->coupon_amount)}}</td>
                        </tr>
                        @endif
                        <tr class="summary-total">
                          <td>Total:</td>
                          <td id="total_grand">{{format_money($get_order->payable_price)}}</td>
                        </tr><!-- End .summary-total -->
						<input type="hidden" name="grand_total" id="grand_total" value="{{$get_order->payable_price}}">
                      </tbody>
                    </table><!-- End .table table-summary -->

                            <div class="accordion-summary" id="accordion-payment">
                                <div class="card">
                                    <div class="card-header" id="heading-1">
                                        <h2 class="card-title">
                                            <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1" class="pay_type" id="online">
                                                
                                                Online(Razorpay)
                                            </a>
                                        </h2>
                                    </div><!-- End .card-header -->
                                    <div id="collapse-1" class="collapse show" aria-labelledby="heading-1" data-parent="#accordion-payment">
                                        <div class="card-body">
                                            Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
                                        </div><!-- End .card-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .card -->

                                <div class="card">
                                    <div class="card-header" id="heading-3">
                                        <h2 class="card-title">
                                            <a class="collapsed pay_type" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3" id="cod">
                                               
                                                Cash on delivery
                                            </a>
                                        </h2>
                                    </div><!-- End .card-header -->
                                    <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion-payment">
                                        <div class="card-body">Quisque volutpat mattis eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. 
                                        </div><!-- End .card-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .card -->

                            </div><!-- End .accordion -->
                            <input type="hidden" name="payment_type" id="type_payment" value="online">
                            <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                              <span class="btn-text">Place Order</span>
                              <span class="btn-hover-text">Proceed to Checkout</span>
                            </button>
                          </div><!-- End .summary -->
                        </aside><!-- End .col-lg-3 -->
                      </div><!-- End .row -->
                  </form>
                  </div><!-- End .container -->
                </div><!-- End .checkout -->
            </div><!-- End .page-content -->
@guest
<!-- include('includes.new-user-checkout') -->
@else
@include('includes.old-user-checkout')
@endguest
@endsection