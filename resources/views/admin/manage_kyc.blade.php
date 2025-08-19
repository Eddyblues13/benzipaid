@include('admin.header')

<div class="main-panel bg-light">
	<div class="content bg-light">
		<div class="page-inner">
			@if(session('message'))
			<div class="alert alert-success mb-2">{{ session('message') }}</div>
			@endif
			<div class="mt-2 mb-4">
				<h1 class="title1 text-dark"> Benzipaid Account Verification List</h1>
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
									<th>KYC Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($kyc as $kyc)
								<tr>
									<th scope="row">{{ $kyc->id }}</th>
									<td>{{ $kyc->first_name }} {{ $kyc->last_name }}</td>
									<td>{{ $kyc->email }}</td>
									@if($kyc->kyc_status == '1')
									<td>Verified</td>
									@elseif($kyc->kyc_status == '0')
									<td>Not Verified</td>
									@elseif($kyc->kyc_status == '2')
									<td>Declined</td>
									@endif
									<td>
										<a href="#" data-toggle="modal" data-target="#viewKycIdModal{{ $kyc->id }}"
											class="btn btn-light btn-sm">
											<i class="fa fa-eye"></i> ID
										</a>
										<a href="#" data-toggle="modal"
											data-target="#viewKycPassportModal{{ $kyc->id }}"
											class="btn btn-light btn-sm">
											<i class="fa fa-eye"></i> Passport
										</a>

										<form action="{{ route('admin.kyc.approve', $kyc->id) }}" method="POST"
											class="d-inline">
											@csrf
											<button class="btn btn-success">Approve</button>
										</form>
										<form action="{{ route('admin.kyc.reject', $kyc->id) }}" method="POST"
											class="d-inline">
											@csrf
											<button class="btn btn-danger">Reject</button>
										</form>
									</td>
								</tr>

								<!-- View KYC ID Modal -->
								<div id="viewKycIdModal{{ $kyc->id }}" class="modal fade" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header bg-light">
												<h4 class="modal-title text-dark">KYC Verification - ID Document View
												</h4>
												<button type="button" class="close text-dark"
													data-dismiss="modal">&times;</button>
											</div>
											<div class="modal-body bg-light">
												<img src="{{ Storage::url($kyc->id_document) }}" alt="ID Document"
													class="img-fluid" />
											</div>
										</div>
									</div>
								</div>
								<!-- /View KYC ID Modal -->

								<!-- View KYC Passport Modal -->
								<div id="viewKycPassportModal{{ $kyc->id }}" class="modal fade" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header bg-light">
												<h4 class="modal-title text-dark">KYC Verification - Address View</h4>
												<button type="button" class="close text-dark"
													data-dismiss="modal">&times;</button>
											</div>
											<div class="modal-body bg-light">
												<img src="{{ Storage::url($kyc->proof_address) }}" alt="Passport Photo"
													class="img-fluid" />
											</div>
										</div>
									</div>
								</div>
								<!-- /View KYC Passport Modal -->

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