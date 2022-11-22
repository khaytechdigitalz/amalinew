@extends("admin.layout.sidebar")

@section('styles')
@endsection

@section('content')

<div class="row">
 
<div class="col-lg-4 col-sm-6 col-12 d-flex">
<div class="dash-count das1">
<div class="dash-counts">
<h4>{{$pending}}</h4>
<h5>Pending Loan</h5>
</div>
<div class="dash-imgs">
<i data-feather="user-check"></i>
</div>
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12 d-flex">
<div class="dash-count das2">
<div class="dash-counts">
<h4>{{$running}}</h4>
<h5>Active Loan</h5>
</div>
<div class="dash-imgs">
<i data-feather="printer"></i>
</div>
</div>
</div>
         
                         
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-center table-hover datatable">
                                    <thead class="thead-light">
                                    <tr>
                                        <th></th>  
                                        <th>Transaction Reference</th>  
                                        <th>Amount</th>
                                        <th>Interest</th>
                                        <th>Expected Payment</th>
                                        <th>Duration</th>
                                        <th>Status</th>
                                        <th>Date Requested</th>
                                        <th>Due Date</th>
                                      <th class="text-right">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($loan as $data)
                                        <tr>
                                            <td>
                                                {{$loop->iteration}}
                                            </td>  
                                            <td>
                                                {{$data->reference}}
                                            </td>  
                                            <td>
                                            ₦{{$data->amount}}
                                            </td>
                                            <td>
                                            ₦{{$data->interest}}
                                            </td>
                                            <td>
                                            ₦{{$data->total}}
                                            @if($data->paid > 0)
                                            <br>
                                            <p class="badge badge-ligh text-success">
                                            Total Paid: ₦{{$data->paid}}
                                            </p>
                                            @endif
                                            </td>
                                            <td>
                                            {{$data->duration}} Days
                                            </td>
                                            <td>
                                                @if($data->status == 0)
                                                    <span class="badge badge-warning"> Pending </span>
                                                @elseif($data->status == 1)
                                                    @if($data->expire < $now)
                                                     <span class="badge badge-danger"> Due Loan
                                                     </span>
                                                     @else
                                                      <span class="badge badge-danger"> Running </span>
                                                     @endif
                                                @elseif($data->status == 2)
                                                    <span class="badge badge-success"> Closed </span>
                                                @else
                                                    <span class="badge badge-danger"> Failed</span>
                                                @endif
                                            </td>
                                            <td>
                                            {!! date(' D, d M, Y', strtotime($data->created_at)) !!}
                                            </td>
                                            <td>
                                            {!! date(' D, d M, Y', strtotime($data->expire)) !!}<br>
                                           <b> {{ Carbon\Carbon::parse($data->expire)->diffForHumans() }}</b>
                                            </td>
                                            <td>
                                            <a href="{{url('admin/float')}}/{{$data->id}}" class="btn btn-sm btn-primary text-white" href="">View Loan</a>
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
        </div>
    </div>
@endsection

@section('scripts')
    
@endsection
