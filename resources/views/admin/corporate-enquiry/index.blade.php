@extends('admin.layouts.app')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Corporate Enquiry</h3>
              </div>
              @if(Session::has('flash_success'))
                  <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                  {{ Session::get('flash_success') }}
                  </div>
              @endif
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th>Firstname</th>
                      <th>Lastname</th>
                      <th>Company Name</th>
                      <th>Address</th>
                      <th>City</th>
                      <th>State</th>
                      <th>Contact</th>
                      <th>Email</th>
                      <th>Business Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $row)
                    <tr>
                      <td>{{$row->firstname}}</td>
                      <td>{{$row->lastname}}</td>
                      <td>{{$row->company_name}}</td>
                      <td>{{$row->address}}</td>
                      <td>{{$row->city}}</td>
                      <td>{{$row->state}}</td>
                      <td>{{$row->contact_number}}</td>
                      <td>{{$row->email_address}}</td>
                      <td>{{$row->business_desc}}</td>
                      <td>
                        <button form="resource-delete-{{ $row->id }}"><i style="color: red;" class="fas fa-trash-alt"></i></button>
                        <form id="resource-delete-{{ $row->id }}" action="{{ url('admin/deleteCorporate') }}?id={{$row->id}}" style="display: inline-block;" onSubmit="return confirm('Are you sure you want to delete this item?');" method="post">
                          @csrf
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <br>
                {!! $data->links() !!}
              </div>
              
        </div>
        <!-- /.card -->
        </div>
       </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection
