@extends('admin.layouts.app')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Bluk Upload Pincode</h3>
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
              <form role="form" id="myform" method="post" action="{{ url('admin/bulkuploadPincode') }}" enctype='multipart/form-data'>
                @csrf 
                <div class="container">
                 <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                      <label for="pincode">Choose Excel File <span class="required">*</span></label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="pincode" class="custom-file-input" id="pincode">
                            @if ($errors->has('pincode'))
                              <span class="required">
                                  <strong>{{ $errors->first('pincode') }}</strong>
                              </span>
                            @endif  
                            <label class="custom-file-label" for="pincode">Choose Excel File</label>
                          </div>
                        </div>
                    </div>
                      <div class="form-group">
                        <button id="submit" type="submit" class="btn btn-primary">Upload</button>
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
