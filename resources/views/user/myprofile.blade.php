@extends('layouts.app') @section('content')
<div class="page-header text-center" style="background-image: url('{{ asset('public/assets/images/page-header-bg.jpg') }}')">
  <div class="container">
    <h1 class="page-title">My Account<span>Shop</span></h1>
  </div><!-- End .container -->
</div><!-- End .page-header -->
  <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
      <div class="container">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">My Account</li>
          </ol>
      </div><!-- End .container -->
  </nav><!-- End .breadcrumb-nav -->

  <div class="page-content">
    <div class="dashboard">
        <div class="container">
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
          <div class="row">
            <aside class="col-md-4 col-lg-3">
              <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
          <li class="nav-item">
              <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Dashboard</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" id="tab-address-link" data-toggle="tab" href="#tab-address" role="tab" aria-controls="tab-address" aria-selected="false">Addresses</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" id="tab-password-link" data-toggle="tab" href="#tab-password" role="tab" aria-controls="tab-password" aria-selected="false">Change password</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Account Details</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{url('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >Sign Out</a>
          </li>
          <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
             {{ csrf_field() }}
          </form>
      </ul>
            </aside><!-- End .col-lg-3 -->

            <div class="col-md-8 col-lg-9">
              <div class="tab-content">
          <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
            <p>Hello <span class="font-weight-normal text-dark">User</span> (not <span class="font-weight-normal text-dark">User</span>? <a href="#">Log out</a>) 
            <br>
            From your account dashboard you can view your, manage your <a href="#tab-address" class="tab-trigger-link">shipping and billing addresses</a>, and <a href="#tab-account" class="tab-trigger-link">edit your password and account details</a>.</p>
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="px-3 py-3">Order Id</th>
                  <th class="px-3 py-3">Order Details</th>
                  <th class="px-3 py-3">Total</th>
                  <th class="px-3 py-3">Status</th>
                </tr>
                </thead>
                <tbody>
                @if($all_orders->total() > 0)
                @foreach($all_orders as $orders)
                <tr>
                  <td class="px-3 py-3">
                  <code>{{$orders->order_id}}</code>
                  </td>
                  <td class="px-3 py-3">
                    
                    @foreach($orders->order_list as $list)
                      <p>{{$list->get_product()->name}} : <b>{{format_weight($list->quantity).'kg x '.format_money($list->get_product()->mrp_price).' = '.format_money($list->mrp_price)}}</b></p>
                    @endforeach
                      
                  </td>
                  <td class="px-3 py-3">
                    {{format_money($orders->payable_price)}}
                  </td>
                  <td class="px-3 py-3">
                    @if($orders->status == "received") 
                      <span class="badge badge-info">Received</span>
                    @elseif($orders->status == "packed") 
                      <span class="badge badge-warning">Packed</span>
                    @elseif($orders->status == "shipped")  
                      <span class="badge badge-dark">On the way</span>
                    @elseif($orders->status == "delivered")
                      <span class="badge badge-success">Delivered</span>
                    @elseif($orders->status == "cancelled")
                      @if($orders->cancelled_by == 'admin')
                      <span class="badge badge-danger">Cancelled by Admin</span>
                      @else
                      <span class="badge badge-danger">Cancelled by Customer</span>
                      @endif
                    @endif
                    @if($orders->status == "received")
                    <a href="{{url('/cancel_order/'.$orders->id)}}" class="badge badge-danger">Cancel order</a>
                    @endif
                  </td>
                </tr>
                @endforeach
                @endif
                </tbody>
            </table>

            <div class="row">
              <div class="col-sm-6">
                {{$all_orders->links()}}
              </div>
              <div class="col-sm-2 offset-md-4">
                <a href="{{url('/all_products')}}" class="btn btn-outline-primary-2"><span>GO SHOP</span><i class="icon-long-arrow-right"></i></a>
              </div>
            </div>
          
          </div><!-- .End .tab-pane -->
          <div class="tab-pane fade" id="tab-password" role="tabpanel" aria-labelledby="tab-password-link">
            <form action="{{url('/user/updatePassword')}}" method="POST">
              @csrf
                <div class="col-sm-12">
                  <label>Current password (leave blank to leave unchanged)</label>
                  <input type="password" class="form-control" name="current_password">
                  @if ($errors->has('current_password'))
                      <span class="required">
                          <strong>{{ $errors->first('current_password') }}</strong>
                      </span>
                  @endif
                </div>
                
                <div class="col-sm-12">
                  <label>New password (leave blank to leave unchanged)</label>
                  <input type="password" class="form-control" name="password">
                  @if ($errors->has('password'))
                      <span class="required">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="col-sm-12">
                  <label>Confirm new password</label>
                  <input type="password" class="form-control mb-2" name="confirm_password">
                  @if ($errors->has('confirm_password'))
                      <span class="required">
                          <strong>{{ $errors->first('confirm_password') }}</strong>
                      </span>
                  @endif
                </div>

                  <button type="submit" class="btn btn-outline-primary-2">
                    <span>SAVE CHANGES</span>
                  <i class="icon-long-arrow-right"></i>
                  </button>
            </form>
          </div><!-- .End .tab-pane -->
          <div class="tab-pane fade" id="tab-address" role="tabpanel" aria-labelledby="tab-address-link">
            <p>The following addresses will be used on the checkout page by default.</p>

            <div class="row">
              <div class="col-lg-6">
                <div class="card card-dashboard">
                  <div class="card-body">
                    <h3 class="card-title">User information</h3><!-- End .card-title -->

                  <p>{{Auth::user()->name ?? ''}}<br>
                  {{Auth::user()->country ?? ''}}<br>
                  {{Auth::user()->phone ?? ''}}<br>
                  {{Auth::user()->email ?? ''}}<br>
                    
                  <a href="#tab-account" class="tab-trigger-link">Edit <i class="icon-edit"></i></a></p>
                  </div><!-- End .card-body -->
                </div><!-- End .card-dashboard -->
              </div><!-- End .col-lg-6 -->

              <div class="col-lg-6">
                <div class="card card-dashboard">
                  <div class="card-body">
                    <h3 class="card-title">Billing Address</h3><!-- End .card-title -->

                  <p>{{Auth::user()->street ?? ''}}
                  {{Auth::user()->city ?? ''}}<br>
                  {{Auth::user()->state ?? ''}}<br>
                  {{Auth::user()->country ?? ''}}<br>
                  {{Auth::user()->pincode ?? ''}}<br>
                  <a href="#tab-account" class="tab-trigger-link">Edit <i class="icon-edit"></i></a></p>
                  </div><!-- End .card-body -->
                </div><!-- End .card-dashboard -->
              </div><!-- End .col-lg-6 -->
            </div><!-- End .row -->
          </div><!-- .End .tab-pane -->

          <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
            <form action="{{url('/user/updateAccount')}}" method="POST">
              @csrf
                    <div class="row">
                      <div class="col-sm-6">
                        <label>Name *</label>
                        <input type="text" class="form-control" name="name" value="{{Auth::user()->name ?? ''}}" required >
                      </div><!-- End .col-sm-6 -->

                      <div class="col-sm-6">
                        <label>Email address *</label>
                        <input type="email" class="form-control" name="email" value="{{Auth::user()->email ?? ''}}" required>
                      </div><!-- End .col-sm-6 -->
                    </div><!-- End .row -->
                    <div class="row">
                      <div class="col-sm-6">
                        <label>Phone *</label>
                        <input type="text" class="form-control" name="phone" value="{{Auth::user()->phone ?? ''}}" required>
                      </div><!-- End .col-sm-6 -->

                      <div class="col-sm-6">
                        <label>Pin code</label>
                        <input type="text" class="form-control" name="pincode" value="{{Auth::user()->pincode ?? ''}}" required>
                      </div><!-- End .col-sm-6 -->
                    </div><!-- End .row -->
                    <div class="row">
                      <div class="col-sm-12">
                        <label>Address / Street *</label>
                        <input type="text" class="form-control" name="street" value="{{Auth::user()->street ?? ''}}" required>
                      </div><!-- End .col-sm-6 -->
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <label>City</label>
                        <input type="text" class="form-control" name="city" value="{{Auth::user()->city ?? ''}}" required>
                      </div><!-- End .col-sm-6 -->
                      <div class="col-sm-6">
                        <label>State *</label>
                        <input type="text" class="form-control" name="state" value="{{Auth::user()->state ?? ''}}" required>
                      </div><!-- End .col-sm-6 -->
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <label>Country *</label>
                        <input type="text" class="form-control" name="country" value="{{Auth::user()->country ?? ''}}" required>
                      </div><!-- End .col-sm-6 -->
                    </div>
                    <button type="submit" class="btn btn-outline-primary-2">
                      <span>SAVE CHANGES</span>
                    <i class="icon-long-arrow-right"></i>
                    </button>
                  </form>
          </div><!-- .End .tab-pane -->
          </div>
            </div><!-- End .col-lg-9 -->
          </div><!-- End .row -->
        </div><!-- End .container -->
      </div><!-- End .dashboard -->
  </div><!-- End .page-content -->
@endsection