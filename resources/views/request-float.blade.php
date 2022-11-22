@extends('layouts.sidebar')

@section('content')
    
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

                                    <form action="{{route('floatrequest')}}" method="POST">
                                        @csrf
                                        <div class="row">
                                 
                                            
                                        <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Enter Amount</label>
                                                    <input name="amount" id="amount" onkeyup="myFunction()"  type="text" class="form-control" required>
                                                </div>
                                        </div>
                                             
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Select Duration (Days)</label>
                                                    <select id="duration" onchange="myFunction()" name="duration" class="form-control">
                                                    <option selected disabled>Please Select Duration</option>
                                                    <option data-duration="1" value="1">1 Day</option>
                                                    <option data-duration="2" value="2">2 Days</option> 
                                                    <option data-duration="3" value="3">3 Days</option>  
                                                    </select>
                                                </div>
                                            </div>
                                             

                                            <table>
  <tr> 
    <th>#</th>
    <th>Details</th>
  </tr>
  <tr> 
    <td>Minimum Float</td>
    <td>{{$general->cur_sym}} {{$general->float_min_amount}}</td>
  </tr>
  
  <tr> 
    <td>Maximum Float</td>
    <td>{{$general->cur_sym}} {{$general->float_max_amount}}</td>
  </tr>

  <tr> 
    <td>Minimum Duration</td>
    <td>{{$general->float_min_tenure}} Days</td>
  </tr>
  <tr> 
    <td>Maximum Duration</td>
    <td>{{$general->float_max_tenure}} Days</td>
  </tr>
  
  <hr>
  
  <tr> 
    <td>Interest Rate</td>
    <td><a>{{$general->float_int_percent}} %</a></td>
  </tr>
                                  @push('script')           
                                <script>
                                 function myFunction() {
                                 var duration = $("#duration option:selected").attr('data-duration');
                                 var amount = $('#amount').val();
                                 var interest = "{{$general->float_int_percent}}"/100*amount
                                 var calcint = interest*duration
                                 var total = +amount + +calcint;
                                  document.getElementById("interest").innerHTML = "{{$general->cur_sym}}"+interest;
                                  document.getElementById("interestdays").innerHTML = "{{$general->cur_sym}}"+calcint;
                                  document.getElementById("total").innerHTML = total;
                                  document.getElementById("totalamount").innerHTML = "{{$general->cur_sym}}"+amount;
                                  };
                                </script>
                                @endpush
<tr>
    <hr>
</tr>                            
  <tr> 
    <td>Amount Requested</td>
    <td><a id="totalamount">{{$general->cur_sym}}0.00</a></td>
  </tr>
  <tr> 
    <td>Calculated Interest</td>
    <td><a id="interest" class="text-danger">{{$general->cur_sym}}0.00</a></td>
  </tr>
  <tr> 
    <td>Calculated Interest <small class="text-danger" >(based on selected days)</small></td>
    <td><a id="interestdays"class="text-danger">{{$general->cur_sym}}0.00</a></td>
  </tr>
  <tr> 
    <td>Total Amount</td>
    <td><a id="total">{{$general->cur_sym}}0.00</a></td>
  </tr>
</table>


                                            </div>
                                            <div class="text-end mt-4">
                                            <button type="submit" class="btn btn-primary">Request Float</button>
                                        </div>
                                        </div>
                                        
                                    </form>
                                </div>

                            </div>
                        </div> 
@endsection

@section('scripts')
@endsection

