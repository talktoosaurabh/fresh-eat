@extends('admin.layouts.app')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Products</h3>
                <a href="{{route('products.create')}}" class="btn btn-primary float-right">Create</a>
              </div>
              @if(Session::has('flash_success'))
                  <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                  {{ Session::get('flash_success') }}
                  </div>
              @endif
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Stock(in weight)</th>
                      <th>Mrp Price</th>
                      <th>Weight</th>
                      <th>Status</th>
                      <th>Category</th>
                      <th>Subategory</th>
                      <th>Action</th>
                    </tr> 
                  </thead>
                  <tbody>
                    @foreach($data as $row)
                    <?php 
                    $productImage = \App\Models\ProductsImage::where('products_id',$row->id)->where('is_featured',1)->first(); 
                    $category = \App\Models\Category::where('id',$row->category_id)->first();
                    $subcategory = \App\Models\Category::where('id',$row->subcategory_id)->first();
                    ?>
                    <tr>
                      <td>
                        <img src="{{ URL::to('/') }}/public/assets/images/products/{{ @$productImage->image }}" style="width: 100px;" />
                      </td>
                      <td>{{@$row->name}}</td>
                      <td>{{$row->stock_count.' kg'}}</td>
                      <td>&#x20B9;{{@$row->mrp_price}}</td>
                      <td>{{@$row->weight.' '.@$row->weight_units}}</td>
                      <td>{{@$row->status}}</td>
                      
                      <td>{{@$category->name}}</td>
                      <td>
                          {{@$subcategory->name}}
                      </td>
                      <td>
                        <a href="{{ route('products.edit', $row->id) }}" class="btn"><i class="fas fa-edit" style="color: blue;"></i></a>
                        <button form="resource-delete-{{ $row->id }}"><i style="color: red;" class="fas fa-trash-alt"></i></button>
                        <form id="resource-delete-{{ $row->id }}" action="{{ route('products.destroy', $row->id) }}" style="display: inline-block;" onSubmit="return confirm('Are you sure you want to delete this item?');" method="post">
                          @csrf
                          @method('DELETE')
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <br>
                {!! $data->links() !!}
              </div>
              <!-- /.card-body -->
              
        </div>
        <!-- /.card -->
        </div>
       </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection
