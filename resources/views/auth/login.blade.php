@extends('layouts.app')

@section('content')
  <div class="login-area mb-130 mb-md-70 mb-sm-70 mb-xs-70 mb-xxs-70 pt-100">
    <div class="container">
      <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6 mb-md-50 mb-sm-50">
          <div class="lezada-form login-form">
            <form method="POST" action="{{ route('login') }}">
                @csrf
              <div class="row">
                <div class="col-lg-12">
                  <!--=======  login title  =======-->

                  <div class="section-title section-title--login text-center mb-50">
                    <h2 class="mb-20">Login</h2>
                    <p>Great to have you back!</p>
                  </div>

                  <!--=======  End of login title  =======-->
                </div>
                <div class="col-lg-12 mb-60">
                  <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required>
                  @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-lg-12 mb-60">
                  <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
                  @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-lg-12 text-center mb-30">
                  <button class="btn btn-outline-primary-2" style="width:100%"> Login <i class="icon-long-arrow-right"></i></button>
                </div>

                <div class="col-lg-12">
                  <input type="checkbox"> <span class="remember-text">Remember me</span>
                  <!-- <a href="#" class="reset-pass-link">Lost your password?</a> -->
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