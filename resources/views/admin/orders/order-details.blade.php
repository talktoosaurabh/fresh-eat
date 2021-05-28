@extends('admin.layouts.app')

@section('content')
<style>
  @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap');
  .order-head
  {
    font-size:30px;
    font-family: 'Playfair Display', serif;
    margin:10px 0px;
    font-weight:bold;
    color:#f37801;
    
  }
  .table thead th
  {
      font-size: 17px;
    color: #000;
    font-weight:500;
    font-family:"Nunito", sans-serif;
        width: 275px;
    
  }
  .table td, .table th
  {
    
  }
  .table td
  {
    font-family:"Nunito", sans-serif;
    color: #000;
    font-weight: 400;
    font-size: 16px;
  }
  .table-bordered td, .table-bordered th {
    border: 1px solid #ccc;
}
  .table thead th
  {
        border-bottom: 1px solid #d05b06;
  }
  .table-bordered td, .table-bordered th {
    border: 1px solid #cd5905!important;
}
  
  
</style>
<div class="container" style="padding-bottom: 100px;">
  <h3 class="head-title pb-3 text-center order-head" style="padding-top: 40px; padding-bottom: 100px;">Order Summary</h3>
  <table class="table table-striped" style="width:80%; margin:auto; border:solid 1px #ddd;">
    <thead>
      <tr>
        <th style="text-align:right; border-bottom:none;">Order Id :</th>
        <th style="border-bottom:none;">{{$order->order_id}}</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="text-align:right;">Amount Paid : </td>
        <td>{{format_money($order->payable_price)}}</td>
      </tr>
      <tr>
        <td style="text-align:right;">Status : </td>
        <td>@if($order->status == "received") 
              <span class="badge badge-info">Order Received</span>
            @elseif($order->status == "packed") 
              <span class="badge badge-warning">Order Packed</span>
            @elseif($order->status == "shipped") 
              <span class="badge badge-dark">On the way</span>
            @elseif($order->status == "delivered") 
              <span class="badge badge-success">Delivered successfully</span>
            @elseif($order->status == "cancelled")
              @if($row->cancelled_by == 'admin')
              <span class="badge badge-danger">Cancelled by Admin</span>
              @else
              <span class="badge badge-danger">Cancelled by Customer</span>
              @endif
            @endif
        </td>
      </tr>
      @if($order->delivery_charge > 0)
      <tr>
        <td style="text-align:right;">Delivery Charge : </td>
        <td>{{format_money($order->delivery_charge)}}</td>
      </tr>
      @else
      <tr>
        <td style="text-align:right;">Delivery Charge : </td>
        <td>FREE</td>
      </tr>
      @endif
      @if($order->coupon_amount > 0)
      <tr>
        <td style="text-align:right;">Coupon Discount :</td>
        <td>{{format_money($order->coupon_amount)}}</td>
      </tr>
      @endif
    </tbody>
  </table>


  <div style="margin-top:50px;">
      <!-- /.card-header -->
      <div class="">
        <table class="table table-bordered" style="width:80%; margin:auto; border:solid 1px   ">
          <thead>                  
            <tr>
              <th style="text-align:center; ">Product image</th>
              <th style="text-align:center;">Product Name</th>
              <th style="text-align:center;">Price</th>
              <th style="text-align:center;">Quantity</th>
              <th style="text-align:center;">Total</th>
            </tr>
          </thead> 
          <tbody>
            @foreach($orderitems as $row)
            <?php
              $product = \App\Models\Product::where('id',$row->product_id)->first();
              $product_image = \App\Models\ProductsImage::where('products_id',$row->product_id)->where('is_featured',1)->first(); 
            ?> 
            <tr>
              <td style="text-align:center;">
                  <img style="width:120px;" src="{{ URL::to('/') }}/public/assets/images/products/{{ @$product_image->image }}"> 
                </td>
                <td style="text-align:center;">{{ @$product->name }}</td>
                <td style="text-align:center;">{{ format_money($row->get_product()->mrp_price) }}</td>
                <td style="text-align:center;">{{ format_weight($row->quantity).' kg' }}</td>                
                <td style="text-align:center;">{{ format_money($row->mrp_price)}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
  </div>
<h3 class="head-title pb-3 text-center order-head" style="padding-top: 40px;">Shipping Address</h3>
  
  <table class="table table-striped " style="width:50%; margin:auto; border:solid 1px #969696; margin-bottom:50px!important;">
    <thead>
      <tr>
        <th style="text-align:right; font-weight:normal; border-bottom:none;">Name :</th>
        <th style="font-weight:normal; border-bottom:none;">{{$order->name}}</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="text-align:right;">Email :</td>
        <td>{{$order->email}}</td>
      </tr>
      <tr>
        <td style="text-align:right;">Phone :</td>
        <td>{{$order->phone}}</td>
      </tr>
      <tr>
        <td style="text-align:right;">Address :</td>
        <td>{{$order->street}}</td>
      </tr>
       <tr>
        <td style="text-align:right;">City :</td>
        <td>{{$order->city}}</td>
      </tr>
      <tr>
        <td style="text-align:right;">Pincode :</td>
        <td>{{$order->pincode}}</td>
      </tr>
      <tr>
        <td style="text-align:right;">Order Note :</td>
        <td>{{$order->order_note}}</td>
      </tr>
    </tbody>
  </table>
</div>

@endsection