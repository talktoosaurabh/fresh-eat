@extends('admin.layouts.app')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{$user->name}}</h3>
              </div>
              @if(Session::has('flash_success'))
                  <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                  {{ Session::get('flash_success') }}
                  </div>
              @endif
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table">
                  <tbody>
                    <tr>
                      <td><strong>Name</strong></td>
                      <td>{{@$user->name}}</td>
                    </tr>
                    <tr>
                      <td><strong>Phone</strong></td>
                      <td>{{@$user->phone}}</td>
                    </tr>
                    <tr>
                      <td><strong>Email</strong></td>
                      <td>{{@$user->email}}</td>
                    </tr>
                    <tr>
                      <td><strong>Street</strong></td>
                      <td>{{@$user->street}}</td>
                    </tr>
                    <tr>
                      <td><strong>Country</strong></td>
                      <td>{{@$user->country}}</td>
                    </tr>
                    <tr>
                      <td><strong>State</strong></td>
                      <td>{{@$user->state}}</td>
                    </tr>
                    <tr>
                      <td><strong>City</strong></td>
                      <td>{{@$user->city}}</td>
                    </tr>
                    <tr>
                      <td><strong>Pincode</strong></td>
                      <td>{{@$user->pincode}}</td>
                    </tr>
                    <tr>
                      <td><strong>Order Note</strong></td>
                      <td>{{@$user->order_note}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              
        </div>
        <!-- /.card -->
        </div>
       </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection
