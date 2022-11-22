@extends("admin.layout.sidebar")
@section('content')
@push('styles')
@endpush

<div class="row">

<div class="col-lg-4 col-sm-6 col-12 d-flex">
<div class="dash-count">
<div class="dash-counts">
<h4>₦{{number_format($balance,2)}}</h4>
<h5>All Wallet Balance</h5>
</div>
<div class="dash-imgs">
<i data-feather="user"></i>
</div>
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12 d-flex">
<div class="dash-count das1">
<div class="dash-counts">
<h4>{{$agent}}</h4>
<h5>Total Agents</h5>
</div>
<div class="dash-imgs">
<i data-feather="user-check"></i>
</div>
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12 d-flex">
<div class="dash-count das2">
<div class="dash-counts">
<h4>{{$trx}}</h4>
<h5>Transaction Count</h5>
</div>
<div class="dash-imgs">
<i data-feather="file-text"></i>
</div>
</div>
</div>
 
<form class="form" id="filter_form" method="get">
                    <div class="row">

                     
                        <h5 class="text-secondary">Recent Transactions</h5>
                        <!-- search -->
                             
                                <div class="card card-table">
                                
                                    <div class="card-body">
                                    
                    <div class="table-responsive">
                    <br>
                    <h6>Filter Transaction</h6>
                    <div class="row">
 
                        <div class="col-xl-3 col-sm-6 col-12">
                            <label for="search"> From Date </label>
                            <div class="input-group">
                                <input type="date" name="from" class="form-control" placeholder="search...">
                                
                            </div>
                        </div>
 
                    
                        <div class="col-xl-3 col-sm-6 col-12">
                            <label for="search"> To Date </label>
                            <div class="input-group">
                                <input type="date" name="to" class="form-control"  placeholder="search...">
                                 
                            </div>
                        </div>
                    
                        <div class="col-xl-3 col-sm-6 col-12">
                        <label for="search"> Type </label>
                        <div class="input-group">
                           <select name="type" class="form-control">
                           <option value="Credit">Credit</option>
                           <option value="Debit">Debit</option>
                           <option value="Bills">Bills</option>
                           <option value="Airtime">Airtime</option>
                           <option value="Cable TV">Cable TV</option>
                           <option value="Internet Data">Internet Data</option>
                           </select>
                             
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                       <br>
                        <div class="input-group">
                        <button type="submit" class="btn btn-primary btn-sm">Filter Transaction</button>

                             
                        </div>
                    </div>
                    <hr>
                         </div>
                                             <table id="example"  class="table table-center table-hover datatable">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Agent Code</th>
                                                    <th>Type</th>
                                                    <th>Amount</th>
                                                    <th>Remark</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($trans as $data)
                                                <tr>
                                                    <td>{{$data->id}}</td>
                                                    <td>{{$data->uuid}}</td>
                                                    <td>{{$data->type}}</td>
                                                    <td>₦{{number_format($data->amount,2)}}</td>
                                                    <td>{{$data->remark}}</td>
                                                    <td>{{$data->status}}</td>
                                                    <td>{{$data->created_at}}</td>
                                                </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
    </div>



@endsection 
@push('script')

@endpush