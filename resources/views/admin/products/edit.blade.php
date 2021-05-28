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
              <div class="container">
                <form method="get" action="">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label for="category_id">Select Category <span class="required">*</span></label>
                          <select name="category_id" class="form-control" onchange="this.form.submit()">
                            @foreach($categories as $category)
                              @if(isset($_REQUEST['category_id']) && $_REQUEST['category_id'] != '')
                                  <option value="{{$category->id}}" @if(@$_REQUEST['category_id'] == $category->id) selected @endif >{{$category->name}}</option>
                              @else
                                  <option value="{{$category->id}}" @if(@$data->category_id == $category->id) selected @endif >{{$category->name}}</option>
                              @endif
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                </form>
                <form enctype="multipart/form-data" role="form" id="myform" method="post" action="{{ route('products.update',$data->id) }}">
                  @csrf
                  @method('PATCH') 
                  @if(isset($_REQUEST['category_id']) && $_REQUEST['category_id'] != '')
                    <input type="hidden" name="parent_category_id" value="{{@$_REQUEST['category_id']}}">
                  @else
                    <input type="hidden" name="parent_category_id" value="{{@$data->category_id}}">
                  @endif
                 <input type="hidden" id="id" value="{{$data->id}}"> 
                   <div class="row">
                      <div class="col-sm-12">
                            <div class="form-group">
                              <label>Select Subcategory <span class="required">*</span></label><br>
                              @if(count($subcategories))
                                <select name="subcategory_id" class="form-control">
                                  @foreach($subcategories as $subcategory)
                                  <option @if(@$data->subcategory_id == $subcategory->id) selected @endif value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                  @endforeach
                                </select>
                              @else
                                No Subcategory Found.  Please Create a Subcategory for this category <a target="_blank" href="{{url('/')}}/admin/subcategory/create">Here</a>
                              @endif
                            </div>  
                            <div class="form-group">
                              <label for="price">Product Name <span class="required">*</span></label>
                              <input type="text" name="productname" id="productname" class="form-control" placeholder="Enter Product Name" value="{{$data->name}}" />
                              @if ($errors->has('productname'))
                                  <span class="required">
                                      <strong>{{ $errors->first('productname') }}</strong>
                                  </span>
                              @endif  
                            </div>
                            <div class="form-group">
                              <label for="groups">Select groups <span class="required">*</span></label>
                              <?php 
                              $selected_group = explode(",", $data->groups);
                              ?>
                              @foreach($groupings as $p => $group)
                              @if(in_array($p,$selected_group))
                              <div class="col-sm-2 flex_check">
                                <input type="checkbox" name="groups[]" class="form-control check_css" value="{{$p}}" checked="checked" /> 
                                <span>{{$group}}</span>
                              </div>
                              @else
                              <div class="col-sm-2 flex_check">
                                <input type="checkbox" name="groups[]" class="form-control check_css" value="{{$p}}"/> 
                                <span>{{$group}}</span>
                              </div>
                              @endif
                        
                              @endforeach
                            </div>
                            <div class="form-group">
                            <label class="radio-inline" for="size_id">
                              Select unit for weight <span class="required">*</span><br>
                              <br>
                              <input type="radio" value="gm" name="unit_id" @if($data->weight_units == 'gm') checked @endif> Grams(gm)
                              <input type="radio" value="kg" name="unit_id" @if($data->weight_units == 'kg') checked @endif> Kilograms(kg)
                            </label>
                          </div>
                          <div class="form-group">
                            <label for="price">Add Weight(per weight for price)</label>
                            <input type="number" name="weight" id="weight" class="form-control" placeholder="Enter weight" value="{{$data->weight}}"/>
                            @if ($errors->has('weight'))
                                <span class="required">
                                    <strong>{{ $errors->first('weight') }}</strong>
                                </span>
                            @endif  
                          </div>
                          <div class="form-group">
                            <label for="price">Add available Stock (in weight)</label>
                            <input type="number" name="stock_count" id="stock_count" class="form-control" placeholder="Enter stock" value="{{$data->stock_count}}"/>
                            @if ($errors->has('stock_count'))
                                <span class="required">
                                    <strong>{{ $errors->first('stock_count') }}</strong>
                                </span>
                            @endif  
                          </div>
                            <div class="form-group">
                              <label for="price">Mrp Price <span class="required">*</span></label>
                              <input type="number" min="0" name="mrp_price" id="mrp_price" class="form-control" placeholder="Enter Mrp Price" value="{{$data->mrp_price}}" />
                              @if ($errors->has('mrp_price'))
                                  <span class="required">
                                      <strong>{{ $errors->first('mrp_price') }}</strong>
                                  </span>
                              @endif  
                            </div>
                            <div class="form-group">
                              <label for="price">Selling Price <span class="required">*</span></label>
                              <input type="number" min="0" name="selling_price" id="selling_price" class="form-control" placeholder="Enter Selling Price" value="{{$data->selling_price}}" />
                              @if ($errors->has('selling_price'))
                                  <span class="required">
                                      <strong>{{ $errors->first('selling_price') }}</strong>
                                  </span>
                              @endif  
                            </div>
                            <div class="form-group">
                              <label for="description">Description <span class="required">*</span></label>
                              <textarea class="form-control" id="description" name="description">{{$data->description}}</textarea>
                              <span style="font-size: 17px;" id="required_description"></span>
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
                              <textarea class="form-control" id="additional_info" name="additional_information">{!! $data->additional_information !!}</textarea>
                              <script>
                                    CKEDITOR.replace( 'additional_information' );
                              </script>

                            </div>
                            <input type="hidden" name="shipping_returns" value="">
                            <!-- <div class="form-group">
                              <label for="shipping_returns">Shipping returns </label>
                              <textarea class="form-control" id="shipping_returns" name="shipping_returns"></textarea>
                              <script>
                                    CKEDITOR.replace( 'shipping_returns' );
                              </script>
                            </div> -->
                            <div class="form-group">
                              <label for="price">Status <span class="required">*</span></label><br>
                                <label for="chkYes">
                                  <input type="radio" class="productstatus" value="Active" name="productstatus" @if($data->status == 'Active') checked @endif/>
                                  @if ($errors->has('productstatus'))
                                    <span class="required">
                                        <strong>{{ $errors->first('productstatus') }}</strong>
                                    </span>
                                @endif  
                                  Active
                              </label>
                              <label for="chkNo">
                                  <input type="radio" class="productstatus" value="InActive" name="productstatus" @if($data->status == 'InActive') checked @endif />
                                  @if ($errors->has('productstatus'))
                                    <span class="required">
                                        <strong>{{ $errors->first('productstatus') }}</strong>
                                    </span>
                                @endif  
                                  Inactive
                              </label>
                            </div>
                             <div class="form-group">
                              <button id="submit" type="submit" class="btn btn-primary">Update Product</button>
                            </div>
                      </div>
                   </div>
                </form>
                <form enctype="multipart/form-data" method="post" action="{{url('admin/products/addMoreImages')}}">
                  @csrf
                  <h3>Add More Images</h3>
                  <input type="hidden" name="product_id" value="{{$data->id}}">
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
                    <button id="submit" type="submit" class="btn btn-primary">Upload Images</button>
                  </div>
                </form>
                <h2>Product Images</h2>
                <div class="row">
                  @foreach($images as $row)
                  <div class="col-sm-3">
                    <div style="position: relative;">
                      <img src="{{ URL::to('/') }}/public/assets/images/products/{{ @$row->image }}" style="width: 100%;" />
                      <button style="position: absolute; right: 0px;
                        font-size: 18px;" id="delete-multiple-image{{ $row->id }}" form="resource-delete-{{ $row->id }}"><i style="color: red;" class="fas fa-trash-alt"></i>
                      </button>  
                      </div>
                    <div>
                      
                      <form action="{{url('admin/products/delete-multiple-image')}}?id={{$row->id}}" id="resource-delete-{{ $row->id }}" style="display: inline-block;" onSubmit="return confirm('Are you sure you want to delete this item?');" method="post">
                      @csrf
                      </form>
                    </div>
                    <div>
                      <label><input type="radio" value="{{$row->id}}" id="featureimage{{$row->id}}" @if($row->is_featured == 1) checked @endif name="featureimage">Make Featured Image</label>
                    </div>
                  </div>
                  <input type="hidden" id="id" value="{{$data->id}}">
                  @endforeach
                </div>
              </div>
          </div>
        </div>
       </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
<script>
<?php foreach($images as $row){ ?>
  $('#featureimage<?php echo $row->id; ?>').on('click', function (ev) {
    var imageId = $('#featureimage<?php echo $row->id; ?>').val();
    var id = $('#id').val();
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: "POST",
      url: "{{url('admin/products/makeFeatureImage')}}",
      data: {"imageId":imageId,"id":id},
      dataType: "json",
      success: function (data) {
        location.reload();
        if (data.succ == 1) {
            location.reload();
        } 
      }
    });
  });
  <?php } ?>
</script>
@endsection
