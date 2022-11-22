@extends('layouts.sidebar')

@section('content')
     
                        <h3 class="page-title">Validate Float OTP</h3>
                        <br>
                        <ul class="breadcrumb">
                                    <li class=""><a href="{{url('dashboard')}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Float OTP </li>
                                </ul>

                            <div class="card">
                                <div class="card-body">
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

                                        <form action="" method="POST">
                                        @csrf
                                        <div class="row">
                                        <h3><b>We need to verify this is you</b></h3>
                                        <br>
                                        <small>We have sent your a One TIme Password to validtate it is you who is trying to initiate this Loan Float. <br>
                                        <b>{{$message}}</b>
                                        </small>
                                        <hr>
                                        <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Enter OTP</label>
                                                    <input name="code" placeholder="****" type="number" class="form-control" required>
                                                </div>
                                              
                                            </div> 
                                            </div>
                                            <div class="text-end mt-4">
                                            <button type="submit" class="btn btn-primary">Validate OTP</button>
                                        </div>
                                        </div>
                                        
                                    </form>
                                </div>

                            </div> 
@endsection

@section('scripts') 
@endsection

