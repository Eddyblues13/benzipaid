@include('dashboard.header')

	<div class="content-wrapper-scroll">

					<!-- Main header starts -->
					<div class="main-header d-flex align-items-center justify-content-between position-relative">
						<div class="d-flex align-items-center justify-content-center">
							<div class="page-icon">
								<i class="bi bi-stickies"></i>
							</div>
							<div class="page-title d-none d-md-block">
								<h5>Invoice</h5>
							</div>
						</div>
						<!-- Live updates start -->
</div>
					<!-- Main header ends -->

					<!-- Content wrapper start -->
					<div class="content-wrapper">
						<!-- Row start -->
            @foreach($invoice as $invoice)
						<div class="row justify-content-center">
							<div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 col-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Invoice - {{$invoice->transaction_ref}}</div>
									</div>
                 
									<div class="card-body">
										<!-- Row start -->
										<div class="row align-items-center">
						
											<div class="col-xxl-10 col-xl-10 col-lg-9 col-md-9 col-sm-9 col-12">
												<p class="text-end m-0">
													Joyce Inc, 5678 St. <br />
													2900 Julia Street, Suite 900<br />
													Huntsville, Alabama, 35890
												</p>
											</div>
										</div>
										<!-- Row end -->

										<!-- Row start -->
										<div class="row gx-3">
											<div class="col-sm-12 col-12">
												<div class="d-flex justify-content-between my-4">
													<p class="m-0">
                          {{Auth::user()->address}}
													</p>

													<div>
														<p class="m-0">Invoice - {{$invoice->transaction_ref}}</p>
														<p class="m-0">{{ \Carbon\Carbon::parse($invoice->created_at)->format('D, M j, Y g:i A') }}</p>
														<span class="badge red">Overdue</span>
													</div>
												</div>
											</div>
										</div>
										<!-- Row end -->

										<!-- Row start -->
										<div class="row gx-3">
											<div class="col-12">
												<div class="table-responsive">
													<table class="table table-bordered">
														<thead>
															<tr>
																<th>Transaction Description</th>
																<th>Transaction ID</th>
																<th>Amount</th>
																<th>Date</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>
                                {{$invoice->transaction_description}}
																</td>
																<td>
																	<h6>{{$invoice->transaction_ref}}</h6>
																</td>
																<td>
																	<h6>{{number_format($invoice->amount, 2, '.', ',')}}</h6>
																</td>
																<td>
																	<h6>{{ \Carbon\Carbon::parse($invoice->created_at)->format('D, M j, Y g:i A') }}</h6>
																</td>
															</tr>
												
															<tr>
																<td colspan="2">&nbsp;</td>
																<td>
																	
																	<h5 class="mt-4 text-blue">Total {{Auth::user()->currency}}</h5>
																</td>
																<td>
																
																	<h5 class="mt-4 text-blue">{{number_format($invoice->amount, 2, '.', ',')}}</h5>
																</td>
															</tr>
															
														</tbody>
													</table>
												</div>
											</div>
										</div>
										<!-- Row end -->

										<!-- Row start -->
										<div class="row gx-3">
											<div class="col-sm-12 col-12">
												<div class="text-end">
									
													<button onclick="window.print()" class="btn btn-outline-dark ms-1">
														Print
													</button>
													
												</div>
											</div>
										</div>
										<!-- Row end -->
									</div>
								</div>
							</div>
						</div>
            @endforeach
						<!-- Row end -->

					</div>
					<!-- Content wrapper end -->

				</div>
@include('dashboard.footer')
