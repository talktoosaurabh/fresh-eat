@extends('layouts.app')

@section('content')
<style>
/* 17. login page css here */
.account_form h2 {
  font-size: 28px;
  text-transform: capitalize;
  font-weight: 600;
  line-height: 22px;
  margin-bottom: 30px;
  font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
}
@media only screen and (max-width: 767px) {
  .account_form h2 {
    font-size: 24px; 
    margin-bottom: 20px;
  }
}
.account_form form {
  border: 1px solid #ebebeb;
  padding: 23px 20px 29px;
  border-radius: 5px;
}
.account_form label {
  font-size: 15px;
  font-weight: 400;
  cursor: pointer;
  line-height: 12px;
  margin-bottom: 12px;
  display: inline-flex;
}
.account_form label:hover {
  color: #a20029;
}
.account_form input {
  border: 1px solid #ebebeb;
  height: 40px;
  max-width: 100%;
  padding: 0 20px;
  background: none;
  width: 100%;
}
.account_form button {
  background: #a20029;
  border: 0;
  color: #ffffff;
  display: inline-block;
  font-size: 12px;
  font-weight: 700;
  height: 34px;
  line-height: 21px;
  padding: 5px 20px;
  text-transform: uppercase;
  cursor: pointer;
  -webkit-transition: 0.3s;
  transition: 0.3s;
  margin-left: 20px;
  border-radius: 20px;
}
.account_form button:hover {
  background: #242424;
}

.login_submit label input[type="checkbox"] {
  width: 15px;
  height: 13px;
  margin-right: 3px;
}

.login_submit {
  text-align: right;
}
.login_submit a {
  font-size: 13px;
  float: left;
  line-height: 39px;
  color: #666666;
}
.login_submit a:hover {
  color: #a20029;
}
@media only screen and (min-width: 768px) and (max-width: 991px) {
  .login_submit a {
    float: none;
    line-height: 18px;
    display: block;
    margin-bottom: 20px;
  }
}
@media only screen and (max-width: 767px) {
  .login_submit a {
    float: none;
    line-height: 18px;
    display: block;
    margin-bottom: 20px;
  }
}

.customer_login {
  padding-top: 60px;
  padding-bottom: 60px;
}
@media only screen and (max-width: 767px) {
  .customer_login {
    margin-top: 57px;
  }
}

.account_form p {
  margin-bottom: 20px;
}

@media only screen and (max-width: 767px) {
  .account_form.register {
    margin-top: 58px;
  }
}

/*login page css end */
</style>
<!-- breadcrumb -->
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                Reset Password
            </span>
        </div>
    </div>
<!-- customer login start -->
<div class="customer_login mt-60">
    <div class="container">
        <div class="row">
           <!--login area start-->
           <div class="col-lg-3 col-md-3">
           </div>
            <div class="col-lg-6 col-md-6">
                <div class="account_form">
                    <h2>Reset Password</h2>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <p>   
                            <label>Email <span>*</span></label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus readonly="">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                         </p>
                         <p>   
                            <label>Passwords <span>*</span></label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                         </p> 
                         <p>   
                            <label>Confirm Password <span>*</span></label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password">
                         </p>   
                        <div class="login_submit">
                            <button type="submit">Reset Password</button>
                        </div>

                    </form>
                 </div>    
            </div>
            <div class="col-lg-3 col-md-3">
           </div>
            <!--login area start-->
        </div>
    </div>    
</div>
<!-- customer login end -->
@endsection
