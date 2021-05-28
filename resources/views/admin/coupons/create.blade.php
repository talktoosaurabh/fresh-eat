@extends('admin.layouts.app')
@section('content')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Coupons</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
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
              <form role="form" id="myform" method="post" action="{{ route('coupons.store') }}">
                @csrf
                <div class="container">
                 <div class="row">
                    <div class="col-sm-12">
                          <div class="form-group">
                            <label for="price">Coupon Code <span class="required">*</span></label>
                            <input type="text" name="coupon_code" id="coupon_code" class="form-control" placeholder="Enter Coupon Code" />
                            @if ($errors->has('coupon_code'))
                                <span class="required">
                                    <strong>{{ $errors->first('coupon_code') }}</strong>
                                </span>
                            @endif  
                          </div>
                          <div>
                            <label for="discount_type">Discount Type <span class="required">*</span></label><br>
                            <label for="chkYes">
                              <input type="radio" class="discount_type" value="Percentage" name="discount_type" checked />
                              @if ($errors->has('discount_type'))
                                <span class="required">
                                    <strong>{{ $errors->first('discount_type') }}</strong>
                                </span>
                              @endif  
                              Percentage
                            </label>
                            <label for="chkNo">
                              <input type="radio" class="discount_type" value="Flat" name="discount_type" />
                              @if ($errors->has('discount_type'))
                                <span class="required">
                                    <strong>{{ $errors->first('discount_type') }}</strong>
                                </span>
                              @endif  
                              Flat
                            </label>
                          </div>
                          <div>
                              <label for="price">Status <span class="required">*</span></label><br>
                                <label for="chkYes">
                                  <input type="radio" class="status" value="Active" name="status" checked />
                                  @if ($errors->has('status'))
                                    <span class="required">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                  @endif  
                                  Active
                                </label>
                              <label for="chkNo">
                                  <input type="radio" class="status" value="InActive" name="status" />
                                  @if ($errors->has('status'))
                                    <span class="required">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                  @endif  
                                  InActive
                              </label>
                          </div>
                            <div class="form-group">
                             <label for="percentage">Discount Amount <span class="required">*</span></label>
                                <input type="number" name="discount_amount" id="discount_amount" class="form-control" min="1" placeholder="Enter Discount Amount"  />
                                @if ($errors->has('discount_amount'))
                                <span class="required">
                                    <strong>{{ $errors->first('discount_amount') }}</strong>
                                </span>
                            @endif  
                            </div>
                            <div class="form-group">
                             <label for="flat">Apply On Minimum Order Amount <span class="required">*</span></label>
                                <input type="number" id="minimum_order" name="minimum_order" class="form-control" min="1" style="background: white;" placeholder="Enter Minimum Order Amount"/>
                                @if ($errors->has('minimum_order'))
                                <span class="required">
                                    <strong>{{ $errors->first('minimum_order') }}</strong>
                                </span>
                            @endif  
                            </div>
                            <div class="form-group">
                              <label for="price">Valid Till <span class="required">*</span></label>
                              <input type="text" name="validity_till" class="form-control" id="datepicker1" placeholder="Vaild Till" />
                              @if ($errors->has('validity_till'))
                                  <span class="required">
                                      <strong>{{ $errors->first('validity_till') }}</strong>
                                  </span>
                              @endif  
                            </div>
                           <div class="form-group">
                            <button id="submit" type="submit" class="btn btn-primary">Create Coupon</button>
                          </div>
                    </div>
                 </div>
                </div>
              </form>
          </div>
        </div>
       </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
<script>
  $( function() {
    $( "#datepicker" ).datepicker({  
        minDate: new Date(),
        dateFormat: 'yy-mm-dd', 
    });
    $( "#datepicker1" ).datepicker({  
        minDate: new Date(),
        dateFormat: 'yy-mm-dd', 
    });
  });
  </script>
@endsection
