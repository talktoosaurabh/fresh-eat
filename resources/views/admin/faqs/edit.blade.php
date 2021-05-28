@extends('admin.layouts.app')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Faqs</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if(Session::has('flash_success'))
                  <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                  {{ Session::get('flash_success') }}
                  </div>
              @endif
              <form role="form" id="myform" method="post" action="{{ route('faqs.update',$data->id) }}">
                @csrf
                @method('PATCH')
                <div class="container">
                 <div class="row">
                    <div class="col-sm-12">
                          <div class="form-group">
                            <label for="price">Question <span class="required">*</span></label>
                            <input type="text" value="{{$data->question}}" name="question" id="question" class="form-control" placeholder="Enter Question" />
                            @if ($errors->has('question'))
                                <span class="required">
                                    <strong>{{ $errors->first('question') }}</strong>
                                </span>
                            @endif  
                          </div>
                          <div class="form-group">
                           <label for="percentage">Answer <span class="required">*</span></label>
                              <textarea placeholder="Enter Answer" rows="5" class="form-control" name="answer">{{$data->answer}}</textarea>
                              @if ($errors->has('answer'))
                                <span class="required">
                                    <strong>{{ $errors->first('answer') }}</strong>
                                </span>
                              @endif  
                          </div>
                           <div class="form-group">
                            <button id="submit" type="submit" class="btn btn-primary">Update</button>
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
