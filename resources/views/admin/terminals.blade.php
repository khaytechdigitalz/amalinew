@extends("admin.layout.sidebar")
@section('content')


<div class="row">

<div class="col-lg-4 col-sm-6 col-12 d-flex">
<div class="dash-count">
<div class="dash-counts">
<h4>{{$total}}</h4>
<h5>Total Terminals</h5>
</div>
<div class="dash-imgs">
<i data-feather="printer"></i>
</div>
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12 d-flex">
<div class="dash-count das1">
<div class="dash-counts">
<h4>{{$assigned}}</h4>
<h5>Total Assigned Terminals</h5>
</div>
<div class="dash-imgs">
<i data-feather="user-check"></i>
</div>
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12 d-flex">
<div class="dash-count das2">
<div class="dash-counts">
<h4>{{$unassigned}}</h4>
<h5>Unassigned Terminals</h5>
</div>
<div class="dash-imgs">
<i data-feather="file-text"></i>
</div>
</div>
</div>
 
              


            <div class="card-body">
                <div class="row">
                    <h5 class="text-secondary">{{$title}}</h5>

                    <div class="row">
                        <div class="col-sm-12">

                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-sm btn-primary">Create
                                New Terminal</a>

                            <br>


                            <!-- The Modal -->
                            <div class="modal" id="myModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Create New Terminal</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <form action="" method="POST">
                                        @csrf
                                        <!-- Modal body -->
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Enter Terminal ID</label>
                                                    <input class="form-control" name="terminalid">
                                                </div>

                                                <div class="form-group">
                                                    <label>Enter Serial Number</label>
                                                    <input class="form-control" name="serialnumber">
                                                </div>
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" class="btn btn-primary">Create</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <!-- END MODAL-->

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


                            <hr>
                            <div class="card card-table">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-center table-hover datatable">
                                            <thead class="thead-light">
                                            <tr>
                                                <th>SN</th>
                                                <th>Terminal ID</th>
                                                <th>Agent Assigned</th>
                                                <th>Sub Agent Assigned</th>
                                                <th>Serial Number</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($terminals as $data)
                                                <tr>
                                                    <td>
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td>
                                                        {{$data->terminal_id}}
                                                    </td>
                                                    <td>
                                                        <a href="{{route('admin.view.agent',@App\Models\User::whereId($data->agent_id)->first()->id ?? 0)}}">
                                                            {{@App\Models\User::whereId($data->agent_id)->first()->firstname ?? "Not Assigned"}}
                                                            {{@App\Models\User::whereId($data->agent_id)->first()->lastname ?? ""}}
                                                        </a>
                                                    </td>
                                                    <td>

                                                        {{@App\Models\User::whereId($data->sub_agent_id)->first()->firstname ?? "Not Assigned"}}
                                                        {{@App\Models\User::whereId($data->sub_agent_id)->first()->lastname ?? ""}}
                                                    </td>
                                                    <td>
                                                        {{$data->serial_number}}
                                                    </td>
                                                    <td>
                                                        @if($data->status == 1)
                                                            <span class="badge badge-primary"> Active </span>
                                                        @else
                                                            <span class="badge badge-danger"> Inactive </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{$data->created_at}}
                                                    </td>
                                                    <td>
                                                        <a href="{{route('admin.posterminal',$data->id)}}"
                                                           class="label label-primary">
                                                            @if($data->status == 1)
                                                                Deactivate
                                                            @else
                                                                Activate
                                                            @endif
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-primary"
                                                           href="{{route('admin.posmanagementTransaction', $data->id)}}">View
                                                            Transactions</a>
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
