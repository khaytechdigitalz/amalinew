@extends('layouts.sidebar')

@section('styles')
 @endsection

@section('content')
    
            <div class="row">


            <div class="col-lg-6 col-sm-6 col-12 d-flex">
<div class="dash-count das1">
<div class="dash-counts">
<h4>{{$terminal->terminal_id}}</h4>
<h5>Terminal ID</h5>
</div>
<div class="dash-imgs">
<i data-feather="printer"></i>
</div>
</div>
</div>

              

<div class="col-lg-6 col-sm-6 col-12 d-flex">
<div class="dash-count das3">
<div class="dash-counts">
<h4>{{$terminal->serial_number}}</h4>
<h5>Terminal Serial Number</h5>
</div>
<div class="dash-imgs">
<i data-feather="user-check"></i>
</div>
</div>
</div>

<div class="col-lg-6 col-sm-6 col-12 d-flex">
<div class="dash-count das2">
<div class="dash-counts">
<h4>{{\Carbon\Carbon::parse($terminal->created_at)->format('Y-m-d')}}</h4>
<h5>Terminal Createion Date</h5>
</div>
<div class="dash-imgs">
<i data-feather="calendar"></i>
</div>
</div>
</div>
 
                

            </div>


            <div class="row">
                <div class="col-sm-12">
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


                    <div class="card card-table">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-center table-hover datatable">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Reference</th>
                                        <th>Amount</th>
                                        <th>Transaction Type</th>
                                        <th>Balance</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($transactions->list as $data)
                                        <tr>
                                            <td>
                                                {{$data->reference}}
                                            </td>
                                            <td>
                                                {{$data->amount}}
                                            </td>
                                            <td>
                                                {{$data->transactionType}}
                                            </td>
                                            <td>
                                                {{number_format($data->balance)}}
                                            </td>
                                            <td>
                                                {{$data->timeCreated}}
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
@endsection

@section('scripts')
@endsection
