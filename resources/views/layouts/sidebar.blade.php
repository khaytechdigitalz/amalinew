<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="AMALI - Payment Channel">
<meta name="keywords" content="pos, estterminals">
<meta name="author" content="Inclusive Village - Globa Technology">
<meta name="robots" content="noindex, nofollow"> 

<title>AMALI AGENT</title>

<link rel="shortcut icon" href="{{asset('assets/img/lg.png')}}">

<link rel="stylesheet" href="{{asset('components/css/bootstrap.min.css')}}">

<link rel="stylesheet" href="{{asset('components/css/animate.css')}}">

<link rel="stylesheet" href="{{asset('components/css/dataTables.bootstrap4.min.css')}}">

<link rel="stylesheet" href="{{asset('components/plugins/fontawesome/css/fontawesome.min.css')}}">
<link rel="stylesheet" href="{{asset('components/plugins/fontawesome/css/all.min.css')}}">
 
<link rel="stylesheet" href="{{asset('components/css/style.css')}}">

</head>
<body>
<div id="global-loader">
<div class="whirly-loader"> </div>
</div>

<div class="main-wrapper">

<div class="header">

<div class="header-left active">
<a href="{{url('dashboard')}}" class="logo">
<img src="{{asset('assets/img/lg.png')}}" alt="">
</a>
<a href="{{url('dashboard')}}" class="logo-small">
<img src="{{asset('assets/img/lg.png')}}" alt="">
</a>
<a id="toggle_btn" href="javascript:void(0);">
</a>
</div>

<a id="mobile_btn" class="mobile_btn" href="{{url('dashboard')}}#sidebar">
<span class="bar-icon">
<span></span>
<span></span>
<span></span>
</span>
</a>

<ul class="nav user-menu">

<li class="nav-item">
<div class="top-nav-search">
<a href="javascript:void(0);" class="responsive-search">
<i class="fa fa-search"></i>
</a>
<form action="#">
<div class="searchinputs">
<input type="text" placeholder="Search Here ...">
<div class="search-addon">
<span><img src="{{asset('components/img/icons/closes.svg')}}" alt="img"></span>
</div>
</div>
<a class="btn" id="searchdiv"><img src="{{asset('components/img/icons/search.svg')}}" alt="img"></a>
</form>
</div>
</li>

  

<li class="nav-item dropdown has-arrow main-drop">
<a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
<span class="user-img"><img src="{{asset('components/img/profiles/owner.png')}}" alt="">
<span class="status online"></span></span>
</a>
<div class="dropdown-menu menu-drop-user">
<div class="profilename">
<div class="profileset">
<span class="user-img"><img src="{{asset('components/img/profiles/owner.png')}}" alt="">
<span class="status online"></span></span>
<div class="profilesets">
<h6>{{Auth::user()->firstname}} {{Auth::user()->lastname}}</h6>
<h5>{{Auth::user()->phone}}</h5>
</div>
</div>
<hr class="m-0">
<a class="dropdown-item" href="{{route('profile')}}"> <i class="me-2" data-feather="user"></i> My Profile</a>
<a class="dropdown-item" href="{{route('settings')}}"><i class="me-2" data-feather="settings"></i>Settings</a>
<hr class="m-0">
<a class="dropdown-item logout pb-0" href="{{route('logout')}}"><img src="{{asset('components/img/icons/log-out.svg')}}" class="me-2" alt="img">Logout</a>
</div>
</div>
</li>
</ul>


<div class="dropdown mobile-user-menu">
<a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="{{route('profile')}}">My Profile</a>
<a class="dropdown-item" href="{{route('settings')}}">Settings</a>
<a class="dropdown-item" href="{{route('logout')}}">Logout</a>
</div>
</div>

</div>


<div class="sidebar" id="sidebar">
<div class="sidebar-inner slimscroll">
<div id="sidebar-menu" class="sidebar-menu">
<ul>
@if(canSee('dashboard'))
<li class="{{ Request::is('dashboard') ? 'active' : '' }}">
<a href="{{url('dashboard')}}"><img src="{{asset('components/img/icons/dashboard.svg')}}" alt="img"><span> Dashboard</span> </a>
</li>
@endif

<li class="submenu">
<a href="javascript:void(0);"><i data-feather="users"></i><span>Agents</span> <span class="menu-arrow"></span></a>
<ul>
@if(canSee('agents'))
<li class="{{ Request::is('terminals') ? 'active' : '' }}"><a href="{{route('terminals')}}">Terminals</a></li>
@endif
<li class="{{ Request::is('add-sub-agent') ? 'active' : '' }}"><a href="{{route('addSubAgent')}}">Add Sub Agent</a></li>
</ul>
</li>
@if(canSee('customers'))
<li  class="{{ Request::is('customers') ? 'active' : '' }}">
<a href="{{route('customers')}}"><i data-feather="user-plus"></i><span>  Open Account</span> </a>
</li>
@endif
@if(canSee('pay-bills'))
<li  class="#">
<a href="#"><i data-feather="award"></i><span>  Insurance</span> </a>
</li>

<li  class="#">
<a href="#"><i data-feather="folder-plus"></i><span>  Savings</span> </a>
</li>

<li  class="{{ Request::is('bnpl') ? 'active' : '' }}">
<a href="{{route('buynpl')}}"><i data-feather="shopping-cart"></i><span>  Buy Now Pay Later</span> </a>
</li>

<li  class="{{ Request::is('bill-payment') ? 'active' : '' }}">
<a href="{{url('bill-payment')}}"><i data-feather="shopping-bag"></i><span>  Pay Bills</span> </a>
</li>
@if(canSee('buy-airtime'))

<li  class="{{ Request::is('bills.airtime') ? 'active' : '' }}">
<a href="{{route('bills.airtime')}}"><i data-feather="phone"></i><span>  Buy Airtime</span> </a>
</li>
@endif
@if(canSee('buy-data'))
<li class="{{ Request::is('bills.data') ? 'active' : '' }}">
<a href="{{route('bills.data')}}"><i data-feather="rss"></i><span>  Internet Data</span> </a>
</li>
@endif
                       
@else
<li class="submenu">
<a href="javascript:void(0);"><i data-feather="shopping-cart"></i><span> Pay Bills</span> <span class="menu-arrow"></span></a>
<ul>
<li class="{{ Request::is('bills.airtime') ? 'active' : '' }}"><a href="{{route('bills.airtime')}}">Buy Aitime</a></li>
<li class="{{ Request::is('bills.data') ? 'active' : '' }}"><a href="{{route('bills.data')}}">Buy Internet Data</a></li>
</ul>
</li>
@endif
@if(canSee('debit-card'))
<li  class="{{ Request::is('debit-card') ? 'active' : '' }}">
<a href="{{route('debit-card')}}"><i data-feather="credit-card"></i><span>Debit Card</span> </a>
</li>
@endif
@if(canSee('performance'))
<li  class="{{ Request::is('agent.performance') ? 'active' : '' }}">
<a href="#{{route('agent.performance')}}"><i data-feather="bar-chart-2"></i><span>Perfomance</span> </a>
</li>
@endif
@if(canSee('transactions'))
<li  class="{{ Request::is('transactions') ? 'active' : '' }}">
<a href="{{route('transactions')}}"><i data-feather="printer"></i><span>Transactions</span> </a>
</li>
@endif 

@if(canSee('debit-card'))
<li class="submenu">
<a href="javascript:void(0);"><i data-feather="percent"></i><span> Float Manager</span> <span class="menu-arrow"></span></a>
<ul>
<li class="{{ Request::is('float') ? 'active' : '' }}"><a href="{{route('float')}}">Request Float</a></li>
<li><a href="{{route('floatloan')}}">My Loan</a></li>
</ul>
</li>
@endif

<li class="submenu">
<a href="javascript:void(0);"><i data-feather="shopping-bag"></i><span> Wallet Manager</span> <span class="menu-arrow"></span></a>
<ul>
@if(canSee('wallet-withdraw'))
<li class="{{ Request::is('walletWithdraw') ? 'active' : '' }}"><a href="{{route('walletWithdraw')}}">Withdrawal</a></li>
@endif
@if(canSee('wallet-history'))
 <li class="{{ Request::is('walletHistory') ? 'active' : '' }}"><a href="{{route('walletHistory')}}">Wallet History</a></li>
@endif
@if(canSee('wallet-transfer'))
<li class="{{ Request::is('walletTransfer') ? 'active' : '' }}"><a href="{{route('walletTransfer')}}">Wallet Transfer</a></li>
@endif
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><i data-feather="settings"></i><span> Settings</span> <span class="menu-arrow"></span></a>
<ul>
@if(canSee('profile'))
<li  class="{{ Request::is('profile') ? 'active' : '' }}">
    <a href="{{route('profile')}}"> <span>Profile</span></a>
</li>
@endif
@if(canSee('settings'))
 <li  class="{{ Request::is('settings') ? 'active' : '' }}">
  <a href="{{route('settings')}}"><span>Settings</span></a>
</li>
@endif
</ul>
</li>
</div>
</div>
</div>     

<div class="page-wrapper">
    <div class="content">
       
<div class="page-header">
<div class="page-title">
<h4>Dashboard</h4>
<h6>{{@$title}}</h6>
</div>
</div>


@if (session('status'))
 <div class="card-body">
    <div class="mb-4 font-medium text-sm text-green-600 alert-dismissible alert">
        {{ session('status') }}
    </div>
</div>
 @endif

 @if (session('error'))
    <div class="card-body">
        <div class="mb-4 font-medium text-sm alert-danger alert-dismissible alert">
         {{ session('error') }}
        </div>
    </div>
 @endif

@if (session('success'))
    <div class="card-body">
        <div class="mb-4 font-medium text-sm alert-success alert-dismissible alert">
            {{ session('success') }}
        </div>
    </div>
 @endif     
    @yield('content')
 
    </div>
</div>        
<script src="{{asset('components/js/jquery-3.6.0.min.js')}}"></script>

<script src="{{asset('components/js/feather.min.js')}}"></script>

<script src="{{asset('components/js/jquery.slimscroll.min.js')}}"></script>

<script src="{{asset('components/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('components/js/dataTables.bootstrap4.min.js')}}"></script>

<script src="{{asset('components/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('components/plugins/apexchart/apexcharts.min.js')}}"></script>
<script src="{{asset('componentss/plugins/apexchart/chart-data.js')}}"></script>

<script src="{{asset('components/js/script.js')}}"></script>
 
@yield('scripts')
@stack('script')

</body>
</html>
