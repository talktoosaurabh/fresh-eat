@extends('admin.layouts.app')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Size</h3>
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
              <form role="form" id="myform" method="post" action="{{ route('sizes.store') }}">
                @csrf 
                <div class="container">
                 <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="price">Size name <span class="required">*</span></label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Size name" />
                        @if ($errors->has('name'))
                            <span class="required">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif  
                      </div>

                       <div class="form-group">
                        <label for="price">Status <span class="required">*</span></label><br>
                          <label for="chkYes">
                            <input type="radio" class="status" value="Active" name="status" checked="" />
                            @if ($errors->has('status'))
                              <span class="required">
                                  <strong>{{ $errors->first('status') }}</strong>
                              </span>
                          @endif  
                            Active
                        </label>
                        <label for="chkNo">
                            <input type="radio" class="status" value="InActive" name="status"/>
                            @if ($errors->has('status'))
                              <span class="required">
                                  <strong>{{ $errors->first('status') }}</strong>
                              </span>
                          @endif  
                            Inactive
                        </label>
                      </div>


                       <div class="form-group">
                        <button id="submit" type="submit" class="btn btn-primary">Create Size</button>
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
