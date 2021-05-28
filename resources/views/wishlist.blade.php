@extends('layouts.app')

@section('content')

    <div class="page-header text-center" style="background-image: url('{{ asset('public/assets/images/page-header-bg.jpg') }}')">
      <div class="container">
        <h1 class="page-title">Wishlist<span>Shop</span></h1>
      </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
          @if(!$wishlists->isEmpty())
          <table class="table table-wishlist table-mobile">
            <thead>
              <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Stock Status</th>
                <th></th>
                <th></th>
              </tr>
            </thead>

            <tbody>
              @foreach($wishlists as $list)
              <tr>
                <td class="product-col">
                  <div class="product">
                    <figure class="product-media">
                      <a href="{{url('/product/'.$list->get_product()->slug)}}">
                        <img src="{{ $list->get_product_default_image() }}" alt="Product image">
                      </a>
                    </figure>

                    <h3 class="product-title">
                      <a href="{{url('/product/'.$list->get_product()->slug)}}">{{ $list->get_product()->name }}</a>
                    </h3><!-- End .product-title -->
                  </div><!-- End .product -->
                </td>
                <td class="price-col">{{ format_money($list->get_product()->mrp_price) }}</td>
                <td class="stock-col">
                  @if($list->get_product()->stock_count > 0)
                    <span class="in-stock">In stock</span>
                  @else
                    <span class="out-of-stock">Out of stock</span>
                  @endif
                </td>
                <td class="action-col">
                  @if($list->get_product()->stock_count > 0)
                    <a href="{{url('/addtocart-wishlist/'.$list->id)}}" class="btn btn-block btn-outline-primary-2" ><i class="icon-cart-plus"></i>Add to Cart</a>
                  @else
                    <button class="btn btn-block btn-outline-primary-2 disabled">Out of Stock</button>
                  @endif
                  
                </td>
                <td class="remove-col"><a href="{{url('/delete_item/'.$list->id)}}" class="btn-remove"><i class="icon-close"></i></a></td>
              </tr>
              @endforeach
            </tbody>
          </table><!-- End .table table-wishlist -->
              <div class="wishlist-share">
                <div class="social-icons social-icons-sm mb-2">
                <label class="social-label">Share on:</label>
                <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                <a href="#" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                </div><!-- End .soial-icons -->
              </div><!-- End .wishlist-share -->
          {{$wishlists->links()}}
           @else
           
              <p>No items found</p>
            
            @endif

        </div><!-- End .container -->
    </div><!-- End .page-content -->
  <!--=====  End of wishlist page content  ======-->
@endsection