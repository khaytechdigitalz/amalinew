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
<h3>Reset Password</h3>
<h4>            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
</h4>
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
<form method="POST" action="{{ route('password.email') }}">
            @csrf

<div class="form-login">
<label>Email</label>
<div class="form-addons">
<input type="email" name="email" id="email" class="form-control pass-input" value="{{old('email')}}" required autofocus/><img src="{{asset('components/img/icons/mail.svg')}}" alt="img">
</div>
</div>  
<div class="form-login">
<button class="btn btn-login" type="submit">Reset Password</button>
</div>
</form>
<div class="signinform text-center">
<h4>Have an account? <a href="{{route('login')}}" class="hover-a">Login</a></h4>
</div>  
</div>
</div>
<div class="login-img">
<img src="{{asset('components/img/reg.jpg')}}" alt="img">
</div>
</div>
</div>
</div>

  
@endsection
