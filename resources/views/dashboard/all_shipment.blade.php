@include('dashboard.header')
<!-- Content wrapper scroll start -->
<div class="main-content">

<div class="page-content">
    <div class="container-fluid">
				            @if (session('error'))
                              <div class="alert box-bdr-red alert-dismissible fade show text-red" role="alert">
															<b>Error!</b>{{ session('error') }}
											<button type="button" class="btn-close" data-bs-dismiss="alert"
																aria-label="Close"></button>
									</div>
                                    @elseif (session('status'))
									<div class="alert box-bdr-green alert-dismissible fade show text-green" role="alert">
															<b>Success!</b> {{ session('status') }}
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
									</div>
                                  @endif

	

					<!-- Content wrapper start -->
					<div class="content-wrapper">

						<!-- Row start -->
						
											<div class="col-sm-12 col-12">
												<h4>Packages</h4>
								<div class="card">
									<div class="card-body">
									<a id="send_pin" href="{{route('dashboard')}}" onclick='send(this)' class="btn btn-primary btn-rounded waves-effect waves-light" type="submit">Go Back to Dashboard</a>
		
										<div class="table-responsive">
											<table class="table table-bordered m-0">
												<thead>
												  
													<tr>
														<th>ID</th>
														<th>Tracking Number</th>
														<th>Status</th>
														<th>Action</th>
														
														
													</tr>

												</thead>
												<tbody>
                                                @foreach($packages as $package)
													<tr>
												      <th>{{$package->id}}</t>
														<th>{{$package->tracking_number}}</t>
														<th>{{$package->parcel_status}}</t>
														<td><a href="{{url('edit-package/'.$package->id)}}"><span class="badge shade-blue">EDIT PACKAGE</span></a></td>
														<td><a href="{{url('delete-package/'.$package->id)}}"  onclick="confirm('Are you sure you want to delete this package?')"><span class="badge shade-red">DELETE PACKAGE</span></a></td>

														
													</tr>
													
												@endforeach
													
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Row end -->

                        
					</div>
					<!-- Content wrapper end -->

				</div>
				<!-- Content wrapper scroll end -->
                </div>
@include('dashboard.footer')
