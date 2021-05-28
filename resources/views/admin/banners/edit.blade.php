@extends('admin.layouts.app')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Banners</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if(Session::has('flash_success'))
                  <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                  {{ Session::get('flash_success') }}
                  </div>
              @endif
              <form enctype="multipart/form-data" role="form" id="myform" method="post" action="{{ route('banners.update',$data->id) }}">
                @csrf
                @method('PATCH')
                <div class="container">
                 <div class="row">
                    <div class="col-sm-12">
                          <div class="form-group">
                            <label for="price">Banner title <span class="required">*</span></label>
                            <input type="text" name="title" id="name" class="form-control" placeholder="Enter Banner title" value="{{$data->title}}" />
                            @if ($errors->has('title'))
                                <span class="required">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif  
                          </div>
                          <div class="form-group">
                            <label for="price">Banner sub title<span class="required">*</span></label>
                            <input type="text" name="sub_title" id="collection_name" class="form-control" placeholder="Enter Banner sub title" value="{{$data->sub_title}}"/>
                            @if ($errors->has('sub_title'))
                                <span class="required">
                                    <strong>{{ $errors->first('sub_title') }}</strong>
                                </span>
                            @endif  
                          </div>
                          <div class="form-group">
                            <label for="price">Today's price<span class="required">*</span></label>
                            <input type="number" name="today_price" id="today_price" class="form-control" placeholder="Enter today's price" value="{{$data->todays_price}}"/>
                            @if ($errors->has('today_price'))
                                <span class="required">
                                    <strong>{{ $errors->first('today_price') }}</strong>
                                </span>
                            @endif  
                          </div>
                          <div class="form-group">
                            <label for="price">Link text <span class="required">*</span></label>
                            <input type="text" name="link_title" class="form-control" placeholder="Enter link text on slider" value="{{$data->link_title}}" />
                            @if ($errors->has('link_title'))
                                <span class="required">
                                    <strong>{{ $errors->first('link_title') }}</strong>
                                </span>
                            @endif  
                          </div>
                          <div class="form-group">
                            <label for="price">Banner link <span class="required">*</span></label>
                            <input type="text" name="link_url" id="banner_link" class="form-control" placeholder="Enter Banner link" value="{{$data->link_url}}"/>
                            @if ($errors->has('link_url'))
                                <span class="required">
                                    <strong>{{ $errors->first('link_url') }}</strong>
                                </span>
                            @endif  
                          </div>
                          <div class="form-group">
                            <div>
                              <img src="{{ URL::to('/') }}/public/assets/images/banners/{{ $data->image }}" alt="" class="img-responsive" width="40%" />
                            </div>
                            <label for="image">Banner Image</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="image">
                                  @if ($errors->has('image'))
                                      <span class="required">
                                          <strong>{{ $errors->first('image') }}</strong>
                                      </span>
                                  @endif  
                                <label class="custom-file-label" for="image">Update Banner</label>
                              </div> 
                            </div>
                          </div>
                          <label for="chkYes">
                              <input type="radio" class="status" value="Active" name="status" @if($data->status == 'Active') checked @endif/>
                              @if ($errors->has('status'))
                                <span class="required">
                                    <strong>{{ $errors->first('status') }}</strong>
                                </span>
                            @endif  
                              Active
                          </label>
                          <label for="chkNo">
                              <input type="radio" class="status" value="InActive" name="status" @if($data->status == 'InActive') checked @endif />
                              @if ($errors->has('status'))
                                <span class="required">
                                    <strong>{{ $errors->first('status') }}</strong>
                                </span>
                            @endif  
                              Inactive
                          </label>
                           <div class="form-group">
                            <button id="submit" type="submit" class="btn btn-primary">Update Banner</button>
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
