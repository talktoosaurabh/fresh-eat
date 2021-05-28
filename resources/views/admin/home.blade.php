@extends('admin.layouts.app')

@section('content')
<!-- Main content -->
<div class="content">
  <div class="container-fluid">
     <!-- Main content -->
    <section class="content">
     <!-- dashboard start -->

	<!-- Main content -->
	<div class="content">
	  <div class="container-fluid">
	     <!-- Main content -->
	    <section class="content">
	      <div class="container-fluid">
	        <div class="row">
	          <div class="col-lg-3 col-6">
	            <!-- small box -->
	            <div class="small-box bg-info">
	              <div class="inner">
	                <h3>{{get_orders_count()}}</h3>
	                <p>Total Orders</p>
	              </div>
	              <div class="icon">
	                <i class="ion ion-bag"></i>
	              </div>
	              <a href="{{url('/admin/orders')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
	            </div>
	          </div>
	          <div class="col-lg-3 col-6">
	            <!-- small box -->
	            <div class="small-box bg-info">
	              <div class="inner">
	                <h3>{{get_orders_count('received')}}</h3>
	                <p>Pending Orders</p>
	              </div>
	              <div class="icon">
	                <i class="ion ion-bag"></i>
	              </div>
	              <a href="{{url('/admin/orders/received')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
	            </div>
	          </div>
	          <div class="col-lg-3 col-6">
	            <!-- small box -->
	            <div class="small-box bg-info">
	              <div class="inner">
	                <h3>{{get_orders_count('packed')}}</h3>
	                <p>Ready Orders</p>
	              </div>
	              <div class="icon">
	                <i class="ion ion-bag"></i>
	              </div>
	              <a href="{{url('/admin/orders/packed')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
	            </div>
	          </div>
	          <div class="col-lg-3 col-6">
	            <!-- small box -->
	            <div class="small-box bg-info">
	              <div class="inner">
	                <h3>{{get_orders_count('shipped')}}</h3>
	                <p>Orders On the way</p>
	              </div>
	              <div class="icon">
	                <i class="ion ion-bag"></i>
	              </div>
	              <a href="{{url('/admin/orders/shipped')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
	            </div>
	          </div>
	          <div class="col-lg-3 col-6">
	            <!-- small box -->
	            <div class="small-box bg-info">
	              <div class="inner">
	                <h3>{{get_orders_count('cancelled')}}</h3>
	                <p>Cancelled Orders</p>
	              </div>
	              <div class="icon">
	                <i class="ion ion-bag"></i>
	              </div>
	              <a href="{{url('/admin/orders/cancelled')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
	            </div>
	          </div>
	          <div class="col-lg-3 col-6">
	            <!-- small box -->
	            <div class="small-box bg-info">
	              <div class="inner">
	                <h3>{{get_orders_count('delivered')}}</h3>
	                <p>Delivered</p>
	              </div>
	              <div class="icon">
	                <i class="ion ion-bag"></i>
	              </div>
	              <a href="{{url('/admin/orders/delivered')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
	            </div>
	          </div>
	          <div class="col-lg-6 col-6">
	            <!-- small box -->
	            <div class="small-box bg-info">
	              <div class="inner">
	                <h3>{{get_number_users()}}</h3>
	                <p>No. of Users/Customers</p>
	              </div>
	              <div class="icon">
	                <i class="ion ion-bag"></i>
	              </div>
	              <a href="{{url('/admin/customers')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
	            </div>
	          </div>
<!-- 	          <div class="col-lg-3 col-6">
	            <div class="small-box bg-info">
	              <div class="inner">
	                <h3>258</h3>
	                <p>Expired</p>
	              </div>
	              <div class="icon">
	                <i class="ion ion-bag"></i>
	              </div>
	              <a href="{{url('order/expired')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
	            </div>
	          </div> -->
	        </div>
	    </section>
	    <!-- /.content -->
	  </div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->

 	<!--dashboard end -->
    </section>
    <!-- /.content -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection