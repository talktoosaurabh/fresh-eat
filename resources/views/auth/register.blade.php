@extends('layouts.app')

@section('content')
  <div class="login-area mb-130 mb-md-70 mb-sm-70 mb-xs-70 mb-xxs-70 pt-100">
    <div class="container">
      <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
          <div class="lezada-form login-form">
            <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="row">
                <div class="col-lg-12">
                  <!--=======  login title  =======-->

                  <div class="section-title section-title--login text-center mb-50">
                    <h2 class="mb-20">Register</h2>
                    <p>If you don’t have an account, register now!</p>
                  </div>

                  <!--=======  End of login title  =======-->
                </div>
                <div class="col-lg-12 mb-30">
                  <label for="name">Name <span class="required">*</span> </label>
                  <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"  required>
                   @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-lg-12 mb-30">
                  <label for="email">Email Address <span class="required">*</span> </label>
                  <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                  @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-lg-12 mb-30">
                  <label for="phone">Phone <span class="required">*</span> </label>
                  <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required>
                  @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-lg-12 mb-50">
                  <label for="password">Password <span class="required">*</span> </label>
                  <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" required>
                  @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                 <div class="col-lg-12 mb-50">
                  <label for="password_confirmation">Confirm Password <span class="required">*</span> </label>
                  <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
                </div>
                <div class="col-lg-12 text-center">
                  <button type="submit" class="btn btn-outline-primary-2" style="width:100%">Register <i class="icon-long-arrow-right"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-lg-3"></div>
      </div>
    </div>
  </div>
@endsection