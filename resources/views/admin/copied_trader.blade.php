@include('admin.header')
<div class="main-panel">
	<div class="content bg-light">
		<div class="page-inner">
			@if(session('message'))
			<div class="alert alert-success mb-2">{{session('message')}}</div>
			@endif
			<div class="mt-2 mb-4">
				<h1 class="title1 text-dark d-inline"> Coppied traders</h1>
				<div class="d-inline">
					<div class="float-right btn-group">
						<a class="btn btn-primary btn-sm" "> <i class=" fa fa-arrow-left"></i> back</a>
					</div>
				</div>
			</div>
			<div>
			</div>
			<div>
			</div>
			<div class="mb-5 row">
				<div class="col card p-3 shadow bg-light">
					<div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table">
						<span style="margin:3px;">
							<table id="ShipTable" class="table table-hover text-dark">
								<thead>
									<tr>
										<th>Client name</th>
										<th>Trader Name</th>
										<th>Amount</th>
										<th>Active</th>
										<th>Duration</th>
										<th>Created on</th>
										<th>Expire At</th>
										<th>Option</th>
									</tr>
								</thead>
								<tbody>
									@foreach($trade as $trader)
									<tr>
										<td>{{$trader->name}}</td>
										<td>{{$trader->trader_name}}</td>
										<td>${{number_format($trader->amount, 2, '.', ',')}}</td>
										<td>
											@if($trader->status==='1')
											<span class="badge badge-danger">expired</span>
											@elseif($trader->status==='0')
											<span class="badge badge-success">yes</span>
											@endif
										</td>
										<td>{{$trader->trade_duration}}</td>
										<td>{{ \Carbon\Carbon::parse($trader->created_at)->format('D, M j, Y g:i A') }}
										</td>
										<td>{{ \Carbon\Carbon::parse($trader->expired_at)->format('D, M j, Y g:i A') }}
										</td>
										<td>
											<a href="{{url('delete-trade/'.$trader->id)}}"
												class="m-1 btn btn-info btn-sm"> Delete Plan</a>
											@if($trader->status==='0')
											<a href="{{url('expired-trade/'.$trader->id)}}"
												class="m-1 btn btn-danger btn-sm">Mark as Expired</a>
											@elseif($trader->status==='1')
											<a href="{{url('active-trade/'.$trader->id)}}"
												class="m-1 btn btn-success btn-sm">Mark as Active</a>
											@endif


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
	@include('admin.footer')