@extends('layouts.app')
@section('content')
<style>
   .white {
   color:white !important;
   }
</style>
<div class="login-area mb-130 mb-md-70 mb-sm-70 mb-xs-70 mb-xxs-70 pt-100">
   <div class="container">
      <div class="row">
         <div class="col-lg-3"></div>
         <div class="col-lg-12">
            <div class="lezada-form login-form" style="background:#2F4F4F;color:white;">
                @if(Session::has('flash_success_conact'))
                      <div class="alert alert-success">
                      {{ Session::get('flash_success_conact') }}
                      </div>
                  @endif
               <form method="POST" action="{{url('saveDealershipBooking')}}">
                  @csrf                 
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="section-title section-title--login text-center mb-50">
                           <h2 class="mb-20" style="color:white;">Dealership Booking</h2>
                           <p>Get the Dealership in  your city </p>
                           <!--   <p>
                              Thank you for your interest in our business solutions. 
                              You can select the product or services that you are interested 
                              in and please take a moment to fill in the details of your 
                              requirement and we will get in touch with you shortly. 
                              Our business co-ordinators will contact you to discuss 
                              how best we can be of help to you.</p> -->
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="first">
                           <div class="col-lg-12 mb-30">
                              <label for="firstname">First Name <span class="required">*</span> </label>
                              <input type="text" class="white" id="firstname" name="firstname" placeholder="Enter First Name"  required>
                           </div>
                           <div class="col-lg-12 mb-30">
                              <label for="company_name">Company Name <span class="required">*</span> </label>
                              <input type="text" class="white" id="company_name" name="company_name"  placeholder="Enter Company Name"  required>
                           </div>
                           <div class="col-lg-12 mb-30">
                              <label for="city">City <span class="required">*</span> </label>
                              <input type="text" class="white" id="city" name="city" placeholder="Enter City Name"  required>
                           </div>
                           <div class="col-lg-12 mb-30">
                              <label for="contact_number">Contact Number <span class="required">*</span> </label>
                              <input type="text" class="white" id="contact_number" name="contact_number" placeholder="Enter Contact Number"  required>
                           </div>
                           <div class="col-lg-12 mb-30">
                              <label for="business_desc">Business Description <span class="required">*</span> </label>
                              <input type="text" class="white" id="business_desc" name="business_desc"  placeholder="Business Description" required>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6 ">
                        <div class="second">
                           <div class="col-lg-12 mb-30">
                              <label for="lastname">Last Name <span class="required">*</span> </label>
                              <input type="text" class="white" id="lastname" name="lastname"placeholder="Enter Last Name"  required>
                           </div>
                           <div class="col-lg-12 mb-30">
                              <label for="address">Address <span class="required">*</span> </label>
                              <input type="text" class="white" id="address" name="address" placeholder="Enter Address"  required>
                           </div>
                           <div class="col-lg-12 mb-30">
                              <label for="state">State <span class="required">*</span> </label>
                              <input type="text" class="white" id="state" name="state" placeholder="Enter State Name"  required>
                           </div>
                           <div class="col-lg-12 mb-30">
                              <label for="email_address">Email Address <span class="required">*</span> </label>
                              <input type="email" class="white" id="email_address" name="email_address"  placeholder="Enter Email Address" required>
                           </div>
                        </div>
                     </div>
                      <div class="col-lg-12 text-center">
                        <button type="submit" class="btn btn-warning">Submit</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
         <div class="col-lg-3"></div>
      </div>
   </div>
</div>
@endsection