@extends('admin.layouts.app')
@section('content')
<?php 
$change_status = ['cancelled','delivered'];
?>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <div class="col-md-12">
          <div class="card">
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
                      <th>Order id</th>
                      <th>Payable Price</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Order Status</th>
                      <th>Ordered Date</th>
                      <th>Delivered Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($orders as $row)
                    <tr>
                      <td><a href="{{url('admin/order')}}/?order_id={{$row->order_id}}">{{$row->order_id}}</a></td>
                      <td>{{ format_money($row->payable_price)}}</td>
                      <td>{{ @$row->name}}</td>
                      <td>{{ @$row->email}}</td>
                      <td>{{ @$row->phone}}</td>
                      <td>
                        @if($row->status == "received") 
                          <span class="badge badge-primary">Order Received</span>
                        @elseif($row->status == "packed") 
                          <span class="badge badge-warning">Order Packed</span>
                        @elseif($row->status == "shipped") 
                          <span class="badge badge-dark">On the way</span>
                        @elseif($row->status == "delivered") 
                          <span class="badge badge-success">Delivered successfully</span>
                        @elseif($row->status == "cancelled") 
                          @if($row->cancelled_by == 'admin')
                          <span class="badge badge-danger">Cancelled by Admin</span>
                          @else
                          <span class="badge badge-danger">Cancelled by Customer</span>
                          @endif
                        @endif
                      </td>
                      <td>{{ \Carbon\Carbon::parse($row->created_at)->format('jS M Y') }}</td>
                      <td>{{ $row->delivered_date }}</td>
                      <td>@if(!in_array($row->status,$change_status))
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal_{{$row->id}}">
                        Change Status
                      </button>@endif</td>
                    </tr>
                    <div class="modal fade" id="modal_{{$row->id}}">
                        <div class="modal-dialog modal-sm">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Change Status</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="col-sm-12">
                                <form method="post" action="{{url('/admin/changeOrderStatus')}}">
                                  @csrf
                                  <div class="form-group">
                                    <label>Select Status</label>
                                    <select class="form-control" name="order_status">
                                      <option @if($row->status == "received") selected @endif value="received">Received</option>
                                      <option @if($row->status == "packed") selected @endif value="packed">Packed</option>
                                      <option @if($row->status == "shipped") selected @endif value="shipped">On the way</option>
                                      <option @if($row->status == "delivered") selected @endif value="delivered">Delivered</option>
                                      <option @if($row->status == "cancelled") selected @endif value="cancelled">Cancel</option>
                                    </select>
                                    <input type="hidden" name="order_id" value="{{ @$row->order_id}}">
                                  </div>
                                  <div class="text-center"> 
                                   <button type="submit" class="btn btn-primary">Submit</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                    </div>
                  <!-- /.modal -->
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              {!! $orders->links() !!}
        </div>
        <!-- /.card -->
        </div>
       </div>
      </div><!-- /.container-fluid -->
    </section>
<script>
  $( function() {
    $( "#txtFromDate" ).datepicker();
    $( "#txtToDate" ).datepicker();
  } );
  </script>
@endsection
