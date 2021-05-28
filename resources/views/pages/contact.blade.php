@extends('layouts.app')

@section('content')

            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact us</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
            

            <div class="page-content pb-0">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 mb-2 mb-lg-0">
                            <h2 class="title mb-1">Contact Information</h2><!-- End .title mb-2 -->
                            
                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="contact-info">
                                        <h3>Our Address</h3>

                                        <ul class="contact-list">
                                            <li>
                                                <i class="icon-map-marker"></i>
                                               No-11, 6th cross, 6th block koramangala bangalore-95 States
                                            </li>
                                            <li>
                                                <i class="icon-phone"></i>
                                                <a href="tel:#">+91-8317321650</a>
                                            </li>
                                            <li>
                                                <i class="icon-envelope"></i>
                                                <a href="mailto:info@fresheatfresh.com">info@fresheatfresh.com</a>
                                            </li>
                                        </ul><!-- End .contact-list -->
                                    </div><!-- End .contact-info -->
                                </div><!-- End .col-sm-7 -->

                                <div class="col-sm-5">
                                    <div class="contact-info">
                                        <h3>Office Timings</h3>

                                        <ul class="contact-list">
                                            <li>
                                                <i class="icon-clock-o"></i>
                                                <span class="text-dark">Monday-Saturday</span> <br>11am-7pm IST
                                            </li>
                                            <li>
                                                <i class="icon-calendar"></i>
                                                <span class="text-dark">Sunday</span> <br>11am-6pm IST
                                            </li>
                                        </ul><!-- End .contact-list -->
                                    </div><!-- End .contact-info -->
                                </div><!-- End .col-sm-5 -->
                            </div><!-- End .row -->
                        </div><!-- End .col-lg-6 -->
                        <div class="col-lg-6">
                            <h2 class="title mb-1">Got Any Questions?</h2><!-- End .title mb-2 -->
                            <p class="mb-2">Use the form below to get in touch with the sales team</p>
                          @if(Session::has('flash_success'))
                              <div class="alert alert-success">
                                  <button type="button" class="close" data-dismiss="alert">×</button>
                              {{ Session::get('flash_success') }}
                              </div>
                          @endif
                          @if(Session::has('flash_error'))
                              <div class="alert alert-danger">
                                  <button type="button" class="close" data-dismiss="alert">×</button>
                              {{ Session::get('flash_error') }}
                              </div>
                          @endif
                            <form action="{{route('contact.send_query')}}" class="contact-form mb-3" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="cname" class="sr-only">Name</label>
                                        <input type="text" class="form-control" id="cname" placeholder="Name *" required name="name">
                                        @if ($errors->has('name'))
                                            <span class="required">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label for="cemail" class="sr-only">Email</label>
                                        <input type="email" class="form-control" id="cemail" placeholder="Email *" required name="email">
                                        @if ($errors->has('email'))
                                            <span class="required">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="cphone" class="sr-only">Phone</label>
                                        <input type="tel" class="form-control" id="cphone" placeholder="Phone" name="phone">
                                        @if ($errors->has('email'))
                                            <span class="required">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label for="csubject" class="sr-only">Subject</label>
                                        <input type="text" class="form-control" id="csubject" placeholder="Subject" name="subject">
                                        @if ($errors->has('subject'))
                                            <span class="required">
                                                <strong>{{ $errors->first('subject') }}</strong>
                                            </span>
                                        @endif
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <label for="cmessage" class="sr-only">Message</label>
                                <textarea class="form-control" cols="30" rows="4" id="cmessage" required placeholder="Message *" name="message"></textarea>

                                <button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                                    <span>SUBMIT</span>
                                    <i class="icon-long-arrow-right"></i>
                                </button>
                            </form><!-- End .contact-form -->
                        </div><!-- End .col-lg-6 -->
                    </div><!-- End .row -->

                </div><!-- End .container -->
                <!-- End #map -->
            </div><!-- End .page-content -->
@endsection