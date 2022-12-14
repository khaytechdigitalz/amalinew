@extends('layouts.sidebar')

@section('content')

     
                    <div class="card">
                        <div class="card-body">
                            <!--                    <div class="box w3-card-4">-->
                            <div class="row">
                                <div class="col-sm-8">
                                    <br>
                                    <br>
                                    <div class="alert alert-danger" id="ElectNote" style="text-transform: uppercase;font-weight: bold;font-size: 18px;display: none;">
                                    </div>
                                    <div id="electPanel">
                                        <div class="alert alert-danger">0.1% discount apply.</div>

                                        <x-jet-validation-errors class="mb-4 alert-danger alert-dismissible alert"/>

                                        @if (session('status'))
                                            <div class="mb-4 font-medium text-sm text-green-600">
                                                {{ session('status') }}
                                            </div>
                                        @endif


                                        <form action="{{url('bills/pay')}}" method="post" >
                                            @csrf

                                            <div class="form-group">
                                                <label class="requiredField">
                                                    Meter Name
                                                    <span class="asteriskField">*</span>
                                                </label>
                                                <input type="text" class="form-control" value="{{$rep1['name']}}" readonly/>
                                            </div>

                                            <div class="form-group">
                                                <label  class="requiredField">
                                                    Meter Number
                                                    <span class="asteriskField">*</span>
                                                </label>
                                                <input type="text" name="number" class="form-control" value="{{$rep1['accountNumber']}}" readonly/>
                                                <input type="hidden" name="network" class="form-control" value="{{$input['network']}}" readonly/>
                                            </div>


                                            <div id="metertypeID" class="form-group">
                                                <label for="metertypeID" class=" requiredField">
                                                    Phone Number
                                                    <span class="asteriskField">*</span>
                                                </label>
                                                <div class="">
                                                    <input type="number" class="form-control" min="11" name="phone" required/>
                                                </div>
                                            </div>

                                            <div id="metertypeID" class="form-group">
                                                <label class=" requiredField">
                                                    Amount
                                                    <span class="asteriskField">*</span>
                                                </label>
                                                <div class="">
                                                    <input type="number" class="form-control" min="11" name="amount" required/>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn process mt-3"
                                                    style="color: white;background-color: #13b10d;margin-bottom:15px;">Purchase Electricity
                                            </button>
                                            <!--                        <button type="button" id="verify" class=" btn" style="margin-bottom:15px;">  <span id="process"><i class="fa fa-circle-o-notch fa-spin " style="font-size: 30px;animation-duration: 1s;"></i> Validating Please wait </span>  <span id="displaytext">Validate Meter Number </span></button>-->
                                        </form>
                                    </div>
                                </div>
                                <div class="col-sm-4 ">
                                </div>

                            </div>
                        </div>
                    </div> 

@endsection

@section('scripts')
   
@endsection
