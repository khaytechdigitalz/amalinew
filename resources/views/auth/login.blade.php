@extends('layouts.auth')

@section('contents')

<div class="main-wrapper">
<div class="account-content">
<div class="login-wrapper">
<div class="login-content">
<div class="login-userset">
<div class="login-logo">
<img src="{{asset('assets/img/lg.png')}}" alt="img">
</div>
<div class="login-userheading">
<h3>Sign In</h3>
<h4>Please login to your account</h4>
</div>
<x-jet-validation-errors class="mb-4 alert-danger alert-dismissible alert"/>


@if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600 alert-dismissible alert">
        {{ session('status') }}
    </div>
@endif

@if (session('error'))
    <div class="mb-4 font-medium text-sm alert-danger alert-dismissible alert">
        {{ session('error') }}
    </div>
@endif

@if (session('success'))
    <div class="mb-4 font-medium text-sm alert-success alert-dismissible alert">
        {{ session('success') }}
    </div>
@endif
<form method="POST">
                    @csrf
<div class="form-login">
<label>Phone</label>
<div class="form-addons">
<input type="tel" name="phone" id="phone" class="form-control pass-input" value="{{old('phone')}}" maxlength="11" required autofocus/><img src="{{asset('components/img/icons/mail.svg')}}" alt="img">
</div>
</div>
<div class="form-login">
<label>Password</label>
<div class="pass-group">
<input type="password" name="password" class="form-control pass-input" required/>
<span class="fas toggle-password fa-eye-slash"></span>
</div>
</div>
<div class="form-login">
<div class="alreadyuser">
<h4>
@if (Route::has('password.request'))
<a class="hover-a" href="{{ route('password.request') }}">Forgot Password ?</a>
@endif
</h4>
</div>
</div>
<div class="form-login">
<button class="btn btn-login" type="submit">Sign In</button>
</div>
</form>
<div class="signinform text-center">
<h4>Don’t have an account? <a href="{{route('register')}}" class="hover-a">Sign Up</a></h4>
</div>
<!--
<div class="form-setlogin">
<h4>Or sign up with</h4>
</div>
<div class="form-sociallink">
<ul>
<li>
<a href="javascript:void(0);">
<img src="{{asset('components/img/icons/google.png')}}" class="me-2" alt="google">
Sign Up using Google
</a>
</li>
<li>
<a href="javascript:void(0);">
<img src="{{asset('components/img/icons/facebook.png')}}" class="me-2" alt="google">
Sign Up using Facebook
</a>
</li>
</ul>
</div>

-->
</div>
</div>
<div class="login-img">
<img src="{{asset('components/img/reg.jpg')}}" alt="img">
</div>
</div>
</div>
</div>

 
@endsection
