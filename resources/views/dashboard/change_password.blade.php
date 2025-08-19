@include('dashboard.header')

				<!-- Content wrapper scroll start -->
				<div class="content-wrapper-scroll">

					<!-- Main header starts -->
					<div class="main-header d-flex align-items-center justify-content-between position-relative">
						<div class="d-flex align-items-center justify-content-center">
							<div class="page-icon">
								<i class="bi bi-columns-gap"></i>
							</div>
							<div class="page-title d-none d-md-block">
								<h5>Change Password</h5>
							</div>
						</div>
						<!-- Live updates start -->
					</div>
					<!-- Main header ends -->

					<!-- Content wrapper start -->
					<div class="content-wrapper">
					<h4 class="text-center">
							Change Password
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
						<form  action="{{ route('update-password') }}" method="POST">
                                              @csrf
							<div class="col-sm-6  col-12">
								<div class="card">
									<div class="card-body">
										<div class="m-0">
											<label class="form-label">Current password:</label>
                                            <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                                                 placeholder="Old Password">
                                @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6  col-12">
								<div class="card">
									<div class="card-body">
										<div class="m-0">
											<label class="form-label">new_password</label>
                                <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                    placeholder="New Password">
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6  col-12">
								<div class="card">
									<div class="card-body">
										<div class="m-0">
											<label class="form-label">Confirm Password</label>
                                            <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                                    placeholder="Confirm New Password">
										</div>
									</div>
								</div>
							</div>			
                            <button type="submit" class="btn btn-primary">
										Update Password
							</button>

						
						<!-- Row end -->
							
                           </form>
						


					</div>
					<!-- Content wrapper end -->

				</div>
				<!-- Content wrapper scroll end -->

@include('dashboard.footer')
