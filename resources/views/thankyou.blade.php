@extends('layouts.app')

@section('content')
<style type="text/css">

@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap');
    #confirm-order
    {
        padding: 200px 0px 140px 0px;
        background-image: url(public/images/dot-bg1.png);
        background-repeat: no-repeat;
        background-position: center;
        background-size:25%;


    }
    #confirm-order h1
    {
        font-size: 60px;
        color: #e9a11e;
        font-weight: bold;
      font-family: 'Playfair Display', serif;
		margin:10px 0px;
    }
    #confirm-order h6
    {
        color: #000;
        font-weight: bold;
    
        font-size: 20px;

    }
    .btn-shop-more
    {
      background-image: linear-gradient(to right,#c92e2e,#b62424);
      padding: 10px 40px;
      color: #fff;
    }
    .btn-shop-more:hover
    {
      background-image: linear-gradient(to right,#e9a11e,#cd8626);
      padding: 10px 40px;
    }
    .shop-bag i
    {
        font-size: 50px;
        margin-bottom: 10px;
    }

</style>
 <section id="confirm-order">
                <div class="container text-center">
                    <div class="shop-bag">
                    <i class="fa fa-shopping-bag" style="color: #ab4001;"></i>
                    </div>
                    <h1 style="color: #2c713b;">Thank You!</h1>
                    <h6 class="pt-2">A confirmation has been sent to ur Email.</h6>
                    <div class="pt-4">
						<a href="{{url('/all_products')}}">
						<button type="button" class="btn btn-shop-more">Shop More <i class="fa fa-long-arrow-right"></i></button>
							</a>
							</div>
                </div>
            </section>
@endsection
