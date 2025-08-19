@include('dashboard.header')

				<!-- Content wrapper scroll start -->
			
				    <div class="content-wrapper">

			

					<!-- Content wrapper start -->
					<div class="content-wrapper">
					<h4 class="text-center">
							Transfer Funds
						</h4>
						<!-- Row start -->
						<div class="card">
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
						<form  action="{{route('transfer.funds')}}" method="POST">
                                              @csrf
							<div class="col-sm-6  col-12">
								<div class="card">
									<div class="card-body">
										<div class="m-0">
											<label class="form-label">Account Name</label>
											<input type="text" name="account_name" class="form-control" style="color:blue" placeholder="Enter Account Name" required/>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6  col-12">
								<div class="card">
									<div class="card-body">
										<div class="m-0">
											<label class="form-label">Account Number</label>
											<input type="number" name="account_number" class="form-control" style="color:blue" placeholder="Enter Account Number" required/>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6  col-12">
								<div class="card">
									<div class="card-body">
										<div class="m-0">
											<label class="form-label">Bank Name</label>
											<input type="text" name="bank_name" class="form-control" style="color:blue" placeholder="Enter Bank Name" required/>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6  col-12">
								<div class="card">
									<div class="card-body">
										<div class="m-0">
											<label class="form-label">Routing Number</label>
											<input type="text" name="routing_number" class="form-control" style="color:blue" placeholder="Enter Routing Number" required/>
										</div>
									</div>
								</div>
							</div>
				
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="card">
									<div class="card-body">
										<div class="m-0">
											<label class="form-label">Account Type</label>
											<select name = "account_type" class="form-select" aria-label="Default select example">
												<option selected="" value="Savings Account">Savings Account</option>
												<option value="Current Account">Current Account</option>
												
											</select>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-sm-6  col-12">
								<div class="card">
									<div class="card-body">
										<div class="m-0">
											<label class="form-label">Amount</label>
											<input type="number" name="amount" class="form-control" style="color:blue" placeholder="Enter Amount ({{Auth::user()->currency}})" required/>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-12">
								<div class="card">
									<div class="card-body">
										<div class="m-0">
											<label class="form-label">Description(optional)</label>
											<textarea class="form-control" style="color:blue" name="description" rows="3"></textarea>
										</div>
									</div>
								</div>
							</div>
						
							
							<button type="button" class="btn btn-success" data-bs-toggle="modal"
											data-bs-target="#exampleModalCenter">
											Transfer
								</button>

																									<!-- Modal -->
									<div class="modal fade" id="exampleModalCenter" tabindex="-1"
											aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalCenterTitle">
															Enter Otp
														</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
													<input type="text" name="otp" class="form-control" style="color:blue" placeholder="Enter Otp" />
													</div>
													<div class="modal-footer">
														<button type="submit" class="btn btn-primary">
															Transfer
														</button>
													</div>
												</div>
											</div>
										</div>
						</div>
						<!-- Row end -->
							
                           </form>
						
					</div>
					<!-- Content wrapper end -->





@include('dashboard.footer')
