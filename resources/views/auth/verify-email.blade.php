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
<h3>Comfirm Email</h3>
<h4> 
{{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
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
@endif <form method="POST" action="{{ route('verification.send') }}">
                @csrf

 
<div class="form-login">
<label>Code</label>
<div class="pass-group">
<input type="password" name="password" class="form-control pass-input" required/>
<span class="fas toggle-password fa-eye-slash"></span>
</div>
</div>
 
<div class="form-login">
<button class="btn btn-login" type="submit">Confirm Email</button>
</div>
</form>
<x-jet-button type="submit">
                        {{ __('Resend Verification Email') }}
                    </x-jet-button>
<div class="signinform text-center">
<form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Log Out') }}
                </button>
            </form></div>  
</div>
</div>
<div class="login-img">
<img src="{{asset('components/img/reg.jpg')}}" alt="img">
</div>
</div>
</div>
</div>

  
@endsection

 



 