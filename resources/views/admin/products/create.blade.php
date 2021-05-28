@extends('admin.layouts.app')
@section('content')
<?php
$groupings = ['new' => 'New Arrivals','deals' => 'Deal of the Month', 'savers' => 'Todays saver','best_rate' => 'Best Rates' ,'popular' => 'Most Popular'];
?>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Product</h3>
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
              <form method="get" action="">
                <div class="container">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="category_id">Select Category <span class="required">*</span></label>
                        <select name="category_id" class="form-control" onchange="this.form.submit()">
                          @foreach($categories as $category)
                          <option @if(@$_REQUEST['category_id'] == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
              <form enctype="multipart/form-data" role="form" id="myform" method="post" action="{{ route('products.store') }}">
                @csrf
                 @if(isset($_REQUEST['category_id']) && $_REQUEST['category_id'] != '')
                  <input type="hidden" name="parent_category_id" value="{{@$_REQUEST['category_id']}}">
                @else
                  <input type="hidden" name="parent_category_id" value="{{@$firstcategory->id}}">
                @endif
                <div class="container">
                 <div class="row">
                    <div class="col-sm-12">
                          <div class="form-group">
                            <label>Select Subcategory <span class="required">*</span></label><br>
                            @if(count($subcategories))
                              <select name="subcategory_id" class="form-control">
                                @foreach($subcategories as $subcategory)
                                <option @if(@$_REQUEST['subcategory_id'] == $subcategory->id) selected @endif value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                @endforeach
                              </select>
                            @else
                              No Subcategory Found.  Please Create a Subcategory for this category <a target="_blank" href="{{url('/')}}/admin/subcategory/create">Here</a>
                            @endif
                          </div>  
                          <div class="form-group">
                            <label for="price">Product Name <span class="required">*</span></label>
                            <input type="text" name="productname" id="productname" class="form-control" placeholder="Enter Product Name" />
                            @if ($errors->has('productname'))
                                <span class="required">
                                    <strong>{{ $errors->first('productname') }}</strong>
                                </span>
                            @endif  
                          </div>
                          <div class="form-group">
                            <label for="groups">Select groups <span class="required">*</span></label>
                            @foreach($groupings as $p => $group)
                            <div class="col-sm-2 flex_check">
                              <input type="checkbox" name="groups[]" class="form-control check_css" value="{{$p}}"/> 
                              <span>{{$group}}</span>
                            </div>
                            @endforeach
                          </div>
                          <div class="form-group">
                            <label class="radio-inline" for="size_id">
                              Select unit for weight <span class="required">*</span><br>
                              <br>
                              <input type="radio" value="gm" name="unit_id" checked> Grams(gm)
                              <input type="radio" value="kg" name="unit_id"> Kilograms(kg)
                            </label>
                          </div>
                          <div class="form-group">
                            <label for="price">Add Weight(per weight for price)</label>
                            <input type="number" name="weight" id="weight" class="form-control" placeholder="Enter weight" />
                            @if ($errors->has('weight'))
                                <span class="required">
                                    <strong>{{ $errors->first('weight') }}</strong>
                                </span>
                            @endif  
                          </div>
                          <div class="form-group">
                            <label for="price">Add available Stock (in weight)</label>
                            <input type="number" name="stock_count" id="stock_count" class="form-control" placeholder="Enter stock" />
                            @if ($errors->has('stock_count'))
                                <span class="required">
                                    <strong>{{ $errors->first('stock_count') }}</strong>
                                </span>
                            @endif  
                          </div>
                          <div class="form-group">
                            <label for="price">Mrp Price <span class="required">*</span></label>
                            <input type="number" min="0" name="mrp_price" id="mrp_price" class="form-control" placeholder="Enter Mrp Price" />
                            @if ($errors->has('mrp_price'))
                                <span class="required">
                                    <strong>{{ $errors->first('mrp_price') }}</strong>
                                </span>
                            @endif  
                          </div>
                          <div class="form-group">
                            <label for="price">Selling Price <span class="required">*</span></label>
                            <input type="number" min="0" name="selling_price" id="selling_price" class="form-control" placeholder="Enter Selling Price" />
                            @if ($errors->has('selling_price'))
                                <span class="required">
                                    <strong>{{ $errors->first('selling_price') }}</strong>
                                </span>
                            @endif  
                          </div>
                        
                          <div class="form-group">
                            <label for="images">Choose Image <span class="required">*</span></label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" name="images[]" class="custom-file-input" id="images" multiple>
                                  @if ($errors->has('images'))
                                    <span class="required">
                                        <strong>{{ $errors->first('images') }}</strong>
                                    </span>
                                  @endif  
                                  <label class="custom-file-label" for="images">Choose image file</label>
                                </div>
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="description">Description <span class="required">*</span></label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                            <script>
                                  CKEDITOR.replace( 'description' );
                            </script>
                            @if ($errors->has('description'))
                                <span class="required">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif 
                          </div>
                          <div class="form-group">
                            <label for="additional_info">Additional Information </label>
                            <textarea class="form-control" id="additional_info" name="additional_information"></textarea>
                            
                            <script>
                                  CKEDITOR.replace( 'additional_information' );
                            </script>

                          </div>
                          <input type="hidden" name="shipping_returns" value="">
                          <div class="form-group">
                            <label for="price">Status <span class="required">*</span></label><br>
                              <label for="chkYes">
                                <input type="radio" class="productstatus" value="Active" name="productstatus" checked="" />
                                @if ($errors->has('productstatus'))
                                  <span class="required">
                                      <strong>{{ $errors->first('productstatus') }}</strong>
                                  </span>
                              @endif  
                                Active
                            </label>
                            <label for="chkNo">
                                <input type="radio" class="productstatus" value="InActive" name="productstatus"/>
                                @if ($errors->has('productstatus'))
                                  <span class="required">
                                      <strong>{{ $errors->first('productstatus') }}</strong>
                                  </span>
                              @endif  
                                Inactive
                            </label>
                          </div>
                           <div class="form-group">
                            <button id="submit" type="submit" class="btn btn-primary">Create Product</button>
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
