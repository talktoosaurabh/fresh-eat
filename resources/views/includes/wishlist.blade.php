<?php 
$wishlist_counter = \App\Models\Wishlist::where('session_id',Session::getId())->count('id');
$wishlists = \App\Models\Wishlist::where('session_id',Session::getId())->get();
$subtotal_wishist = []; 
?>
<!--=======  wishlist overlay  =======-->
    <div class="wishlist-overlay" id="wishlist-overlay">
        <div class="wishlist-overlay-close inactive"></div>
        <div class="wishlist-overlay-content">
            <!--=======  close icon  =======--> <span class="close-icon" id="wishlist-close-icon">
        <a href="javascript:void(0)">
          <i class="ion-android-close"></i>
        </a>
      </span>
            <!--=======  End of close icon  =======-->
            <!--=======  offcanvas wishlist content container  =======-->
            <div class="offcanvas-cart-content-container">
                <h3 class="cart-title">Wishlist</h3>
                @if(count($wishlists))
                <div class="cart-product-wrapper">
                    <div class="cart-product-container  ps-scroll">
                        <!--=======  single cart product  =======-->
                        @foreach($wishlists as $wishlist)
                        <?php 
					       	$productimage = \App\Models\ProductsImage::where('products_id',$wishlist->product_id)->where('is_featured',1)->first();
					    ?>
	                        <div class="single-cart-product"> <span class="cart-close-icon">
	              				</span>
	                            <div class="image">
	                                <a href="{{url('/')}}/p/{{$wishlist->product->slug}}">
	                                    <img src="{{url('/')}}/public/uploads/images/{{$productimage->image}}" class="img-fluid" alt="">
	                                </a>
	                            </div>
	                            <div class="content">
	                                <h5><a href="{{url('/')}}/p/{{$wishlist->product->slug}}">{{$wishlist->product->name}}</a></h5>
	                                <p><span class="main-price discounted">&#x20B9; {{$wishlist->product->mrp_price}}</span>  <span class="discounted-price">&#x20B9; {{$wishlist->product->selling_price}}</span>
	                                </p>
	                            </div>
	                        </div>
                        @endforeach
                        <!--=======  single cart product  =======-->
                    </div>
                    <!--=======  cart buttons  =======-->
                    <div class="cart-buttons"> <a href="{{url('wishlist')}}">view wishlist</a>
                    </div>
                    <!--=======  End of cart buttons  =======-->
                </div>
                @else
                <h4 class="text-center">No Items in wishlist</h4>
                @endif
            </div>
            <!--=======  End of offcanvas wishlist content container   =======-->
        </div>
    </div>
    <!--=======  End of wishlist overlay  =======-->