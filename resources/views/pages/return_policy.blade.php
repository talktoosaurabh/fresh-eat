@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Return Policy</li>
		</ol>
	</div><!-- End .container -->
</nav>
<section id="content" class="mb-5">
	<div class="container clearfix py-3">
		<h3 class="center">Return Policy</h3>
		<!--<span>Forms Widget</span>-->
	</div>
	<div class="content-wrap pt-0">
		<div class="container clearfix">
			<div class="row shadow bg-light border">                            
				<div class="col-lg-12 p-5">
					<h5><b>Refund and Cancellation Policy</b></h5>
<p>Our focus is complete customer satisfaction. In the event, you are displeased with the products and services provided, we will refund back the money, provided the reasons are genuine and proved after investigation.</p>

<h5><b>Cancellation Policy</b></h5>

<p>Cancellations will be permitted in case of significant delays in delivery of order. Any other request for cancellation, will be dealt on a case to case basis. For Cancellations please reach out via contact us link. </p>

<h5><b>Refund Policy</b></h5>
<p>In case customer is not completely satisfied with our products we can provide a refund, provided the matter is brought to notice within 10 days of product delivery and reasons for dissatisfaction are genuine and proved after investigation.</p>

<p>Refunds will be issued to the original payment method used at the time of purchase, within 7 days.</p>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection