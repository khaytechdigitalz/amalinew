@extends("layouts.sidebar")

@section('content')
@push('styles')

@endpush


<div class="row">
<div class="col-lg-12 col-sm-12 col-12">
<div class="dash-widget">
<div class="dash-widgetimg">
<span><img src="{{asset('components/img/icons/dash1.svg')}}" alt="img"></span>
</div>
<div class="dash-widgetcontent">
<h5>₦<span class="counters" data-counts="{{$wallet}}">{{number_format($wallet,2)}}</span></h5>
<h6>Wallet Balance</h6>
</div>
</div>
</div>

<div class="col-lg-6 col-sm-6 col-12 d-flex">
<div class="dash-count das1">
<div class="dash-counts">
<h4>{{$customer}}</h4>
<h5>Total Customers</h5>
</div>
<div class="dash-imgs">
<i data-feather="user-check"></i>
</div>
</div>
</div>
<div class="col-lg-6 col-sm-6 col-12 d-flex">
<div class="dash-count das2">
<div class="dash-counts">
<h4>{{$trans_count}}</h4>
<h5>Transaction Count</h5>
</div>
<div class="dash-imgs">
<i data-feather="file-text"></i>
</div>
</div>
</div>
@if(canSee('agents'))
<div class="col-lg-6 col-sm-6 col-12 d-flex">
<div class="dash-count das4">
<div class="dash-counts">
<h4>{{$terminals}}</h4>
<h5>Teminals</h5>
</div>
<div class="dash-imgs">
<i data-feather="printer"></i>
</div>
</div>
</div>


<div class="col-lg-6 col-sm-6 col-12 d-flex">
<div class="dash-count das3">
<div class="dash-counts">
<h4>{{$agentfloat}}</h4>
<h5>Total Float <small>(Sub Agents)</small></h5>
</div>
<div class="dash-imgs">
<i data-feather="file"></i>
</div>
</div>
</div>

@endif

</div>
<div class="row">
<div class="col-lg-12 col-sm-12 col-12 d-flex">
<div class="card flex-fill">
<div class="card-header pb-0 d-flex justify-content-between align-items-center">
<h5 class="card-title mb-0">Transaction Chart</h5>
<div class="graph-sets">
<ul>
<li>
<span>Credit</span>
</li>
<li>
<span>Debit</span>
</li>
</ul>
<div class="dropdown">
<button class="btn btn-white btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
 2022 <img src="{{asset('components/img/icons/dropdown.svg')}}" alt="img" class="ms-2">
</button>
<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
<li>
<a href="javascript:void(0);" class="dropdown-item">{{date('Y')}}</a>
</li> 
</ul>
</div>
</div>
</div>
<div class="card-body">
<div id="sales_charts"></div>
</div>
</div>
</div>
 
</div>
<div class="card mb-0">
<div class="card-body">
<h4 class="card-title">Recent Transaction</h4>

<div class="table-responsive dataview">

<form class="form" id="filter_form" method="get">
                     
                    <div class="row"> 
                        <div class="col-xl-4 col-sm-6 col-12">
                            <label for="search"> From Date </label>
                            <div class="input-group">
                                <input type="date" name="from" class="form-control" placeholder="search...">
                            </div>
                        </div>
 
                    
                        <div class="col-xl-4 col-sm-6 col-12">
                            <label for="search"> To Date </label>
                            <div class="input-group">
                                <input type="date" name="to" class="form-control"  placeholder="search...">
                            </div>
                        </div>
                    
                        <div class="col-xl-4 col-sm-6 col-12">
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
                     <div class="col-xl-4 col-sm-6 col-12">
                       <br>
                        <div class="input-group">
                        <button type="submit" class="btn btn-primary btn-sm">Filter Transaction</button>      
                        </div>
                    </div>
                    </form>


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
                                                @foreach($trans as $data)
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
<script>
'use strict';

$(document).ready(function() {

	function generateData(baseval, count, yrange) {
		var i = 0;
		var series = [];
		while (i < count) {
			var x = Math.floor(Math.random() * (750 - 1 + 1)) + 1;;
			var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;
			var z = Math.floor(Math.random() * (75 - 15 + 1)) + 15;

			series.push([x, y, z]);
			baseval += 86400000;
			i++;
		}
		return series;
	}

 
if($('#sales_charts').length > 0) {
	var options = {
		series: [{
		name: 'Sales',
		data: [{{$cjan}}, {{$cfeb}}, {{$cmar}}, {{$capr}}, {{$cmay}}, {{$cjun}}, {{$cjul}}, {{$caug}},{{$csep}},{{$coct}},{{$cnov}},{{$cdec}} ],
	  }, {
		name: 'Purchase',
		data: [{{$djan}}, {{$dfeb}}, {{$dmar}}, {{$dapr}}, {{$dmay}}, {{$djun}}, {{$djul}}, {{$daug}},{{$dsep}},{{$doct}},{{$dnov}},{{$ddec}}]
	  }],
	  colors: ['#28C76F', '#EA5455'],
		chart: {
		type: 'bar',
		height: 300,
		stacked: true,
		
		zoom: {
		  enabled: true
		}
	  },
	  responsive: [{
		breakpoint: 280,
		options: {
		  legend: {
			position: 'bottom',
			offsetY: 0
		  }
		}
	  }],
	  plotOptions: {
		bar: {
		  horizontal: false,
		  columnWidth: '20%',
		  endingShape: 'rounded'
		},
	  },
	  xaxis: {
		categories: [' JAN ', 'FEB', 'MAR', 'APR',
		  'MAY', 'JUN' , 'JUL' , 'AUG','SEP','OCT','NOV','DEC'
		],
	  },
	  legend: {
		position: 'right',
		offsetY: 40
	  },
	  fill: {
		opacity: 1
	  }
	  };

	  var chart = new ApexCharts(document.querySelector("#sales_charts"), options);
	  chart.render();
	}

  
});
</script>

@endpush
