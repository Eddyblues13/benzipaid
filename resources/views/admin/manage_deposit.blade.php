@include('admin.header')

<div class="main-panel bg-light">
	<div class="content bg-light">
		<div class="page-inner">
			@if(session('message'))
			<div class="alert alert-success mb-2">{{ session('message') }}</div>
			@endif
			<div class="mt-2 mb-4">
				<h1 class="title1 text-dark"> Velmo Grand Bank Account Verification List</h1>
			</div>

			<div class="mb-5 row">
				<div class="col-12">
					<small class="text-dark">If you can't see the image, try switching your uploaded location to
						another option from your admin settings page.</small>
				</div>
				<div class="col-12 card p-4 bg-light shadow">
					<div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table">
						<table id="ShipTable" class="table table-hover text-dark">
							<thead>
								<tr>
									<th>ID</th>
									<th>Full Name</th>
									<th>Email</th>
									<th>deposit type</th>
									<th>deposit Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($deposit as $deposit)
								<tr>
									<th scope="row">{{ $deposit->id }}</th>
									<td>{{ $deposit->first_name }} {{ $deposit->last_name }}</td>
									<td>{{ $deposit->email }}</td>
									<td>{{ $deposit->deposit_type }}</td>
									@if($deposit->status == '1')
									<td>Verified</td>
									@elseif($deposit->status == '0')
									<td>Not Verified</td>
									@elseif($deposit->status == '2')
									<td>Declined</td>
									@endif
									<td>
										<a href="#" data-toggle="modal"
											data-target="#viewdepositIdModal{{ $deposit->id }}"
											class="btn btn-light btn-sm">
											<i class="fa fa-eye"></i> Front Cheque
										</a>
										<a href="#" data-toggle="modal"
											data-target="#viewdepositPassportModal{{ $deposit->id }}"
											class="btn btn-light btn-sm">
											<i class="fa fa-eye"></i> Back Cheque
										</a>

										<form action="{{ route('admin.deposit.approve', $deposit->id) }}" method="POST"
											class="d-inline">
											@csrf
											<button class="btn btn-success">Approve</button>
										</form>
										<form action="{{ route('admin.deposit.reject', $deposit->id) }}" method="POST"
											class="d-inline">
											@csrf
											<button class="btn btn-danger">Reject</button>
										</form>
									</td>
								</tr>

								<!-- View deposit ID Modal -->
								<div id="viewdepositIdModal{{ $deposit->id }}" class="modal fade" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header bg-light">
												<h4 class="modal-title text-dark">deposit Verification - Front Cheque
													View
												</h4>
												<button type="button" class="close text-dark"
													data-dismiss="modal">&times;</button>
											</div>
											<div class="modal-body bg-light">
												<img src="{{ Storage::url($deposit->front_cheque) }}" alt="ID Document"
													class="img-fluid" />
											</div>
										</div>
									</div>
								</div>
								<!-- /View deposit ID Modal -->

								<!-- View deposit Passport Modal -->
								<div id="viewdepositPassportModal{{ $deposit->id }}" class="modal fade" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header bg-light">
												<h4 class="modal-title text-dark">deposit Verification - Back Cheque
												</h4>
												<button type="button" class="close text-dark"
													data-dismiss="modal">&times;</button>
											</div>
											<div class="modal-body bg-light">
												<img src="{{ Storage::url($deposit->back_cheque) }}"
													alt="Passport Photo" class="img-fluid" />
											</div>
										</div>
									</div>
								</div>
								<!-- /View deposit Passport Modal -->

								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@include('admin.footer')