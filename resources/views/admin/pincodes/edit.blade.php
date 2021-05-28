@extends('admin.layouts.app')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Pincode</h3>
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
              <form role="form" id="myform" method="post" action="{{ route('pincodes.update',$data->id) }}">
                @csrf 
                @method('PATCH')
                <div class="container">
                 <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="price">Coupon Pincode <span class="required">*</span></label>
                        <input type="text" name="pincode" id="pincode" class="form-control" readonly value="{{$data->pincode}}" placeholder="Enter Coupon Pincode" />
                        @if ($errors->has('pincode'))
                            <span class="required">
                                <strong>{{ $errors->first('pincode') }}</strong>
                            </span>
                        @endif  
                      </div>

                       <div class="form-group">
                        <label for="price">Delivery Charge <span class="required">*</span></label>
                        <input type="number" min="0" name="delivery_charge" id="delivery_charge" value="{{$data->delivery_charge}}" class="form-control" placeholder="Enter Delivery Charge" />
                        @if ($errors->has('delivery_charge'))
                            <span class="required">
                                <strong>{{ $errors->first('delivery_charge') }}</strong>
                            </span>
                        @endif  
                      </div>
                       <div class="form-group">
                        <button id="submit" type="submit" class="btn btn-primary">Update Pincode</button>
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
@endsection
