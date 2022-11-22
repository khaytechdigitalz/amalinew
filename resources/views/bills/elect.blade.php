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

                                <form action="{{route('bills.verifyelect')}}" method="post">
                                    @csrf
                                    <div id="metertypeID" class="form-group">
                                        <label class="requiredField">
                                            Meter Type
                                            <span class="asteriskField">*</span>
                                        </label>
                                            <select  name="network" class="text-success form-control" required>
                                                @foreach($rep1 as $plan)
                                                <option value="{{$plan['service_type']}}">{{$plan['name']}}</option>
                                                @endforeach
                                            </select>
                                    </div>


                                    <div id="metertypeID" class="form-group">
                                        <label for="metertypeID" class=" requiredField">
                                            Meter Number
                                            <span class="asteriskField">*</span>
                                        </label>
                                        <div class="">
                                            <input type="number" class="form-control" min="11" name="number" required/>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn process"
                                            style="color: white;background-color: #13b10d;margin-bottom:15px;"> Verify
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
