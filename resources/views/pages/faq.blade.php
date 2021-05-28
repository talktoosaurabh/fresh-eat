@extends('layouts.app')

@section('content')
<style type="text/css">
	h2 {
    font-family: Arial, Verdana;
    font-weight: 800;
    font-size: 2.5rem;
    color: #091f2f;
    text-transform: uppercase;
}
.accordion-section .panel-default > .panel-heading {
    border: 0;
    background: #f4f4f4;
    padding: 0;
}
.accordion-section .panel-default .panel-title a {
    display: block;
    font-style: italic;
    font-size: 1.5rem;
}
.accordion-section .panel-default .panel-title a:after {
    font-family: 'FontAwesome';
    font-style: normal;
    font-size: 3rem;
    content: "\f106";
    color: #1f7de2;
    float: right;
    margin-top: -12px;
}
.accordion-section .panel-default .panel-title a.collapsed:after {
    content: "\f107";
}
.accordion-section .panel-default .panel-body {
    font-size: 1.2rem;
}
</style>
<section class="accordion-section clearfix mt-3" aria-label="Question Accordions">
  <div class="container" style="padding-top: 100px; padding-bottom: 100px;">
	  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
	  	@foreach($faqs as $faq)
		<div class="panel panel-default">
		  <div class="panel-heading p-3 mb-3" role="tab" id="heading{{$faq->id}}">
			<h3 class="panel-title">
			  <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$faq->id}}" aria-expanded="true" aria-controls="collapse{{$faq->id}}">
				{{$faq->question}}
			  </a>
			</h3>
		  </div>
		  <div id="collapse{{$faq->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$faq->id}}">
			<div class="panel-body px-3 mb-4">
			  <p>{{$faq->answer}}</p>
			</div>
		  </div>
		</div>
		@endforeach
	  </div>
  </div>
</section>
@endsection