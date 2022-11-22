@extends("admin.layout.sidebar")
@section('content')

@php
$user = App\Models\User::whereId($kyc->user_id)->first();
@endphp
                       
<div class="row">
<div class="col-lg-8 col-sm-12">
<div class="card">

<div class="card-body">
<div class="bar-code-view">

<a href="{{route('admin.kyc.approve',$kyc->id)}}" class="btn btn-primary btn-sm"> Approve KYC</a>
                     
<a href="{{route('admin.kyc.reject',$kyc->id)}}" class="btn btn-danger btn-sm"> Reject KYC</a><hr>
 
</div>
<div class="productdetails">
<ul class="product-bar">
<li>
<h4>Agent's Name</h4>
<h6> {{$user->firstname ?? ""}} {{$user->lastname ?? ""}}	</h6>
</li>
<li>
<h4>Agent's Email</h4>
<h6>{{$user->email ?? ""}}</h6>
</li>
<li>
<h4>Agent's Phone</h4>
<h6>{{$user->phone ?? ""}}</h6>
</li>
<li>
<h4>Agent Status</h4>
<h6>@if($kyc->status == 1) <a class="text-success">Approved</a> @elseif($kyc->status == 2)  <a class="text-danger">Rejected</a> @else <a class="text-warning">Pending</a> @endif</h6>
</li> 
</ul>
</div>
</div>
</div>
</div>
<div class="col-lg-4 col-sm-12">
<div class="card">
<div class="card-body">
<div class="slider-product-details"></div>
<div class="owl-carousel owl-theme product-slide">
<div class="slider-product">
<img src="{{asset($kyc->utility)}}" alt="img" style=' height:200px;'>
<h4>Utility Bill</h4>
<h6>
<a class="btn btn-sm  btn-success" href="{{asset($kyc->utility)}}" download>Download</a>
</h6>
</div>
<div class="slider-product">
<img src="{{asset($kyc->idcard)}}" alt="img" style=' height:200px;'>
<h4>ID Card</h4>
<h6>
<a class="btn  btn-sm btn-success" href="{{asset($kyc->idcard)}}" download>Download</a>
</h6>
</div>

<div class="slider-product">
<img src="{{asset($kyc->guarantorform)}}" alt="img" style=' height:200px;'>
<h4>Guaranto's Form</h4>
<h6>
<a class="btn  btn-sm btn-success" href="{{asset($kyc->guarantorform)}}" download>Download</a>
</h6>
</div>


<div class="slider-product">
<img src="{{asset($kyc->passport)}}" alt="img" style='width: 2000px; height:200px;'>
<h4>Passport</h4>
<h6>
<a class="btn  btn-sm btn-success" href="{{asset($kyc->passport)}}" download>Download</a>
</h6>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


 
</div>
</div>
                  
                       
               

@endsection

@section('scripts')
   
@endsection
