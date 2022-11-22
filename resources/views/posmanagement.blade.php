@extends('layouts.sidebar')

@section('content')
 

        <div id="filter_inputs" class="card filter-card">
            <div class="card-body pb-0">
                <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label>Customer</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label>Payment Mode</label>
                            <select class="select">
                                <option>Payment Mode</option>
                                <option>Cash</option>
                                <option>Cheque</option>
                                <option>Card</option>
                                <option>Online</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-center table-hover datatable">
                                <thead class="thead-light">
                                <tr>
                                    <th>Terminal ID</th>
                                    <th>Agent Assigned</th>
                                    <th>Serial No</th>
                                    <th>Status</th>
                                    <th class="text-right">Action</th>
                                </tr>
                                </thead>
                                jkhsdgdsg
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
@endsection

@section('scripts') 
@endsection
