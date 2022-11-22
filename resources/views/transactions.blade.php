@extends('layouts.sidebar')

@push('styles')

@endpush
@section('styles')
@endsection

@section('content')
    
                <div class="card-body">
                <form class="form" id="filter_form" method="get">
                    <div class="row">

                     
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
                    <br> 
                    <br> 
                    <br> <br>
                    <hr>
                         </div>
                                             <table id="example"  class="table table-center table-hover">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th>S/N</th>
                                                    @if(canSee('agents'))
                                                    <th>Agent Code</th>
                                                    @endif
                                                     <th>Type</th>
                                                    <th>Amount</th>
                                                    <th>Remark</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($datas as $data)
                                                <tr>
                                                    <td>{{$data->id}}</td>
                                                    @if(canSee('agents'))
                                                    <td>{{$data->uuid}}</td>
                                                    @endif
                                                    <td>{{$data->type}}</td>
                                                    <td>₦{{number_format($data->amount,2)}}</td>
                                                    <td>{{$data->remark}}</td>
                                                    <td>
                                                    @if($data->status == 1)
                                                    <badge class="badge bg-success">Successful</badge>
                                                    @else
                                                    <badge class="badge bg-danger">Not Successful</badge>
                                                    @endif
                                                    </td>
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
@endsection

@push('script')
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>

@endpush
@section('scripts') 
 @endsection
