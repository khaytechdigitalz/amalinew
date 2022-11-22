@extends("admin.layout.sidebar")
@section('content')


<div class="row">

<div class="col-lg-6 col-sm-6 col-12 d-flex">
<div class="dash-count das1">
<div class="dash-counts">
<h4>{{$verified}} </h4>
<h5>Total Verified</h5>
<a href="{{route('admin.kycs.successful')}}" class="btn btn-primary btn-sm"> View</a>

</div>
<div class="dash-imgs">
<i data-feather="user-check"></i>
</div>
</div>
</div>
<div class="col-lg-6 col-sm-6 col-12 d-flex">
<div class="dash-count das3">
<div class="dash-counts">
<h4>{{$unverified}}</h4>
<h5>Total Unverified</h5>
<a href="{{route('admin.kycs.rejected')}}" class="btn btn-primary btn-sm">View </a>

</div>
<div class="dash-imgs">
<i data-feather="user-x"></i>
</div>
</div>
</div> 
     


            <div class="card-body">
                <form class="form" id="filter_form" method="get">
                    <div class="row">
                        <h5 class="text-secondary">{{$title}}</h5>

                        <div class="row">
                            <div class="col-sm-12">
                        <br>
                        

                        <hr>
                                <div class="card card-table">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                        <table class="table table-center table-hover datatable">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>SN</th>
                                        <th>Agent</th>  
                                        <th>Status</th>
                                        <th>Date</th> 
                                        <th>Action</th> 
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($all as $data)
                                    @php
                                    $user = App\Models\User::whereId($data->user_id)->first();
                                    @endphp

                                        <tr>
                                            <td>
                                            {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                {{$user->firstname ?? ""}}
                                                {{$user->lastname ?? ""}}<br>
                                                <small>{{$user->email ?? ""}}</small>
                                            </td>  
                                            <td>
                                               @if($data->status == 1)
                                                    <badge class="badge bg-primary"> Verified </badge>
                                                @else
                                                    <badge class="badge bg-danger"> Pending </badge>
                                                @endif
                                            </td>
                                            <td>
                                                {{$data->created_at}}
                                            </td> 
                                            <td>
                                            <a href="{{route('admin.viewkyc',$data->id)}}" class="btn btn-primary btn-sm"> 
                                             View
                                            </a>
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
                </form>
            </div>
        </div>
    </div>

 
@endsection

@section('scripts')
    @endsection
