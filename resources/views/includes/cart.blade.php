<?php 
$cart_counter = \App\Models\Cart::where('session_id',Session::getId())->count('id'); 
$carts = \App\Models\Cart::where('session_id',Session::getId())->get();
$subtotal_cart = [];
?><!--=======  cart overlay  =======-->
    <div class="cart-overlay" id="cart-overlay">
        <div class="cart-overlay-close inactive"></div>
        <div class="cart-overlay-content">
            <!--=======  close icon  =======--> <span class="close-icon" id="cart-close-icon">
        <a href="javascript:void(0)">
          <i class="ion-android-close"></i>
        </a>
      </span>
            <!--=======  End of close icon  =======-->
            <!--=======  offcanvas cart content container  =======-->
            <div class="offcanvas-cart-content-container">
                <h3 class="cart-title">Cart</h3>
                @if(count($carts))
                <div class="cart-product-wrapper">
                    <div class="cart-product-container  ps-scroll">
                    	@foreach($carts as $cart)
				       	<?php 
				       	$subtotal_cart[] = $cart->product->selling_price * $cart->quantity;
				       	$productimage = \App\Models\ProductImage::where('product_id',$cart->product_id)->where('is_featured',1)->first();
				       	?>
                        <!--=======  single cart product  =======-->
                        <div class="single-cart-product"> <span class="cart-close-icon">
              				</span>
                            <div class="image">
                                <a href="{{url('/')}}/p/{{$cart->product->slug}}">
                                    <img src="{{url('/')}}/public/uploads/images/{{$productimage->image}}" class="img-fluid" alt="">
                                </a>
                            </div>
                            <div class="content">
                                <h5><a href="{{url('/')}}/p/{{$cart->product->slug}}">{{$cart->product->name}}</a></h5>
                                <p><span class="main-price discounted">&#x20B9; {{$cart->product->mrp_price}}</span>  <span class="discounted-price">&#x20B9; {{$cart->product->selling_price}} * {{$cart->quantity}}</span>
                                </p>
                            </div>
                        </div>
                        <!--=======  End of single cart product  =======-->
                        @endforeach
                    </div>
                    <!--=======  subtotal calculation  =======-->
                    <p class="cart-subtotal"> <span class="subtotal-title">Subtotal:</span>
                        <span class="subtotal-amount">&#x20B9; {{array_sum($subtotal_cart)}}</span>
                    </p>
                    <!--=======  End of subtotal calculation  =======-->
                    <!--=======  cart buttons  =======-->
                    <div class="cart-buttons"> <a href="{{url('cart')}}">view cart</a>
                        <a href="{{url('checkout')}}">checkout</a>
                    </div>
                    <!--=======  End of cart buttons  =======-->
                </div>
                @else
               <h4 class="text-center">No Items in Cart</h4>
               @endif
            </div>
            <!--=======  End of offcanvas cart content container   =======-->
        </div>
    </div>
    <!--=======  End of cart overlay  =======-->