@extends('admin/layout.sidebar')
@section('content')
    
             
<div class="row">

                               
                                    <div class="card card-table">
                                        <div class="card-body">
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                Assign Terminal
                                </button>


                                            <div class="table-responsive">
                                                <table class="table table-center table-hover datatable">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th>Agent Code</th>
                                                        <th>Name</th>
                                                        <th>Terminals</th>
                                                        <th>Business Phone</th>
                                                        <th>Email</th>
                                                        <th>Date Registered</th>
                                                        <th>Action</th>
                                                    </tr>
                                                   
                                                    </thead>
                                                    @foreach($agents as $data)
                                                    @php
                                                    $i = 1;
                                                    $terminal = App\Models\Terminal::whereAgentId($data->id)->count();
                                                    @endphp
                                                    <tr> 
                                                        <td>{{$data->uuid}}</td>
                                                        <td>{{$data->firstname. " " .$data->lastname}}</td>
                                                        <td>{{$terminal}}</td>
                                                        <td>{{$data->phone}}</td>
                                                        <td>{{$data->email}}</td>
                                                        <td>{{$data->created_at}}</td>
                                                        <td><a  href="{{route('admin.view.agent',$data->id)}}" class="btn btn-sm btn-primary">View</a></td>
                                                    </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div> 

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Terminal To Agent</h4>
        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
      </div>
    <form method="post" action="{{route('admin.assignterminal')}}">
    {{ csrf_field() }}

      <!-- Modal body -->
      <div class="modal-body">
        <div class="form-group">
        <label class="label-text">Select Agent</label>
        <select name="agent" class="form-control">
        <option selected disabled>Please Select Master Agent</option>
        @foreach($agents as $data)
        <option value="{{$data->id}}">{{$data->firstname}} {{$data->lastname}}</option>
        @endforeach
        </select>
         </div>


        <div class="form-group">
        <label class="label-text">Serial Number</label>
        <input class="form-control" name="serialnumber" placeholder="Enter Serial Number">
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Assign Terminal</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>

    </div>
  </div>
</div>
@endsection
@section('scripts')
   
@endsection

