@extends('layouts.app')

@section('content')
  <div class="product-category-container mb-90 mb-md-85 mb-sm-85  pt-100">
    <div class="container wide">
      <div class="row">
        <div class="col-lg-12">
          <!--=======  product category wrapper  =======-->

          <div class="lezada-slick-slider product-category-slider wow fadeInUp" data-slick-setting='{
            "slidesToShow": 3,
            "arrows": true,
            "autoplay": true,
            "autoplaySpeed": 5000,
            "speed": 1000,
            "prevArrow": {"buttonClass": "slick-prev", "iconClass": "ion-ios-arrow-thin-left" },
            "nextArrow": {"buttonClass": "slick-next", "iconClass": "ion-ios-arrow-thin-right" }
          }' data-slick-responsive='[
            {"breakpoint":1501, "settings": {"slidesToShow": 3} },
            {"breakpoint":1199, "settings": {"slidesToShow": 3} },
            {"breakpoint":991, "settings": {"slidesToShow": 2, "arrows": false} },
            {"breakpoint":767, "settings": {"slidesToShow": 1, "arrows": false} },
            {"breakpoint":575, "settings": {"slidesToShow": 1, "arrows": false} },
            {"breakpoint":479, "settings": {"slidesToShow": 1, "arrows": false} }
          ]'>

          @foreach($categories as $category)
            <div class="col">
                <!--=======  single category  =======-->
                <div class="single-category single-category--two">
                    <!--=======  single category image  =======-->
                    <div class="single-category__image single-category__image--two">
                        <img src="{{url('/')}}/public/uploads/images/{{$category->image}}" class="img-fluid" alt="{{$category->name}}">
                    </div>
                    <!--=======  End of single category image  =======-->
                    <!--=======  single category content  =======-->
                    <div class="single-category__content single-category__content--two mt-4">
                        <h3>
                          <a href="{{url('category')}}/{{$category->slug}}">{{$category->name}}</a>
                        </h3>
                    </div>
                    <!--=======  End of single category content  =======-->
                    <!--=======  banner-link  =======-->
                    <a href="{{url('category')}}/{{$category->slug}}" class="banner-link"></a>
                    <!--=======  End of banner-link  =======-->
                </div>
                <!--=======  End of single category  =======-->
            </div>
          @endforeach
          </div>

          <!--=======  End of product category wrapper  =======-->
        </div>
      </div>
    </div>
  </div>
@endsection