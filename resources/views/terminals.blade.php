@extends('layouts.sidebar')


@section('content')


<div class="card">
<div class="card-body">
<div class="table-top">
<div class="search-set">
<div class="search-path">
<a class="btn btn-filter" id="filter_search">
<img src="{{asset('components/img/icons/filter.svg')}}" alt="img">
<span><img src="{{asset('components/img/icons/closes.svg')}}" alt="img"></span>
</a>
</div>
<div class="search-input">
<a class="btn btn-searchset"><img src="{{asset('components/img/icons/search-white.svg')}}" alt="img"></a>
</div>
</div>
<div class="wordset">
<ul>
<li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="{{asset('components/img/icons/pdf.svg')}}" alt="img"></a>
</li>
<li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="{{asset('components/img/icons/excel.svg')}}" alt="img"></a>
</li>
<li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="{{asset('components/img/icons/printer.svg')}}" alt="img"></a>
</li>
</ul>
</div>
</div> 

<div class="table-responsive">
<table class="table  datanew">
<thead>
<tr>
<th>
</th> <tr>
  <th>SN</th>
 <th>Terminal ID</th>
  <th>Serial Number</th>
  <th>Sub Agent Assigned</th>
 <th>Status</th>
  <th>Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
@foreach($datas as $data)
<tr>

                                            <td>
                                                {{$i++}}
                                            </td>
                                            <td>
                                                {{$data->terminal_id}}
                                            </td>
                                            <td>
                                                {{$data->serial_number}}
                                            </td>
                                            <td>
                                            {{@App\Models\User::whereId($data->sub_agent_id)->first()->firstname ?? "Not Assigned"}}
                                            {{@App\Models\User::whereId($data->sub_agent_id)->first()->lastname ?? "Not Assigned"}}

                                            </td>
                                            <td>
                                            @if($data->status == 1)
                                                    <badge class="badge bg-success">Active</badge>
                                                    @else
                                                    <badge class="badge bg-danger">Not Active</badge>
                                                    @endif
                                            </td>
                                            <td>
                                                {{$data->created_at}}
                                            </td>
<td>
<button  data-bs-toggle="modal" data-bs-target="#myModal{{$data->id}}" class="btn btn-sm btn-primary">Assign</button>
                                                @if($data->status == 1)
                                                    <a class="btn btn-sm btn-primary" href="{{route('terminalsTransaction', $data->id)}}">View Transactions</a>
                                                @endif
</td>
</tr>

<!-- The Modal -->
<div class="modal" id="myModal{{$data->id}}">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Assign Terminal</h4><br>
      </div>

      <br>

      <div class="modal-header">
      <a class="text-danger">
        Please ensure you check very well before assigning Terminal to a sub agent. We will not be liable to any loss arising from you assigning Terminal to a wrong sub agent
        </a>
      </div>
      <form action="" method="POST">
      @csrf
      <!-- Modal body -->
      <div class="modal-body">
        <div class="form-group">
        <label>Select Sub Agent</label>
        <select  name="agent" class="form-control">
        <option  select disabled>Please Select A Sub Agent</option>
        @foreach($subagent as $datas)
        <option value="{{$datas->id}}">{{$datas->firstname}} {{$datas->lastname}}</option>
        @endforeach
        </select>
      </div>

      <div class="form-group">
        <label>Serial Number</label>
        <input name="serialnumber" value="{{$data->serial_number}}" readonly class="form-control" >
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Assign</button>
      </div>
    </form>

    </div>
  </div>
</div>
<!-- END MODAL-->
@endforeach
</tbody>
</table>
</div>
</div>
</div>
   
@endsection

@section('scripts')
   
@endsection
