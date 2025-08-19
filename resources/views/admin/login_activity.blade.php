@include('admin.header')
<!-- End Sidebar -->
<div class="main-panel">
	<div class="content bg-light ">
		<div class="page-inner">
			<div class="mt-2 mb-4">
				<h1 class="title1 text-dark d-inline">{{$user->name}} login activities</h1>
				<div class="d-inline">
					<div class="float-right btn-group">
						<a class="btn btn-primary btn-sm" href=""> <i class="fa fa-arrow-left"></i> back</a>
					</div>
				</div>
			</div>
			<div>
			</div>
			<div>
			</div>
			<div class="mb-5 row">
				<div class="mb-4 col-md-12">
					<a class="btn btn-danger btn-sm" href=""> <i class="fa fa-trash"></i> Clear Data</a>
				</div>
				<div class="col-md-12 card shadow p-4 bg-light">
					<div class="table-responsive" data-example-id="hoverable-table">
						<table id="ShipTable" class="table table-hover text-dark">
							<thead>
								<tr>

									<th>IP Address</th>
									<th>Device/OS/Browser</th>
									<th>Date/Time logged in</th>
								</tr>
							</thead>
							<tbody>
								@foreach($activity as $activity)
								<tr>

									<td>{{$activity->ip_address}}</td>
									<td>{{$activity->user_agent}}</td>
									<td>{{ \Carbon\Carbon::parse($activity->last_activity)->format('D, M j, Y g:i A') }}
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