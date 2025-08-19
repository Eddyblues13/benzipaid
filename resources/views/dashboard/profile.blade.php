@include('dashboard.header')
<div class="content-body">
	<div class="container-fluid">
		<div class="form-head mb-4">
			<h2 class="text-black font-w600 mb-0">Profile</h2>
		</div>
		<!-- row -->
		<div class="row">
			@if (session('error'))
			<div class="alert alert-danger" role="alert">
				<b>Error!</b>{{ session('error') }}
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			@elseif (session('status'))
			<div class="alert alert-success" role="alert">
				<b>Success!</b> {{ session('status') }}
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			@endif
			<div class="col-lg-12">
				<div class="profile card card-body px-3 pt-3 pb-0">
					<div class="profile-head">
						<div class="photo-content">
							<div class="cover-photo rounded"></div>
						</div>
						<div class="profile-info">
							<div class="profile-photo">
								<img src="{{ asset('uploads/display/' . (Auth::user()->display_picture ? Auth::user()->display_picture : 'avatar.png')) }}"
									class="img-fluid rounded-circle" alt="">
							</div>
							<div class="profile-details">
								<div class="profile-name px-3 pt-2">
									<h4 class="text-primary mb-0">{{Auth::user()->first_name}}
										{{Auth::user()->last_name}}</h4>
									<p>Savings Account</p>
								</div>
								<div class="profile-email px-2 pt-2">
									<h4 class="text-muted mb-0">{{Auth::user()->email}}</h4>
									<p>Email</p>
								</div>
								<!--
										<div class="dropdown ms-auto">
											<a href="#" class="btn btn-primary light sharp" data-bs-toggle="dropdown" aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></a>
											<ul class="dropdown-menu dropdown-menu-end">
												<li class="dropdown-item"><i class="fa fa-user-circle text-primary me-2"></i> View profile</li>
												<li class="dropdown-item"><i class="fa fa-users text-primary me-2"></i> Add to btn-close friends</li>
												<li class="dropdown-item"><i class="fa fa-plus text-primary me-2"></i> Add to group</li>
												<li class="dropdown-item"><i class="fa fa-ban text-primary me-2"></i> Block</li>
											</ul>
										</div>-->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<!--
                    <div class="col-xl-4">
						<div class="row">
							<div class="col-xl-12">
								<div class="card">
									<div class="card-body">
										<div class="profile-statistics">
											<div class="text-center">
												<div class="row">
													<div class="col">
														<h3 class="m-b-0">150</h3><span>Follower</span>
													</div>
													<div class="col">
														<h3 class="m-b-0">140</h3><span>Place Stay</span>
													</div>
													<div class="col">
														<h3 class="m-b-0">45</h3><span>Reviews</span>
													</div>
												</div>
												<div class="mt-4">
													<a href="javascript:void(0);" class="btn btn-primary mb-1 me-1">Follow</a> 
													<a href="javascript:void(0);" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#sendMessageModal">Send Message</a>
												</div>
											</div>
											
											<div class="modal fade" id="sendMessageModal">
												<div class="modal-dialog modal-dialog-centered" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">Send Message</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
														</div>
														<div class="modal-body">
															<form class="comment-form">
																<div class="row"> 
																	<div class="col-lg-6">
																		<div class="mb-3">
																			<label class="text-black font-w600 form-label">Name <span class="required">*</span></label>
																			<input type="text" class="form-control" value="Author" name="Author" placeholder="Author">
																		</div>
																	</div>
																	<div class="col-lg-6">
																		<div class="mb-3">
																			<label class="text-black font-w600 form-label">Email <span class="required">*</span></label>
																			<input type="text" class="form-control" value="Email" placeholder="Email" name="Email">
																		</div>
																	</div>
																	<div class="col-lg-12">
																		<div class="mb-3">
																			<label class="text-black font-w600 form-label">Comment</label>
																			<textarea rows="8" class="form-control" name="comment" placeholder="Comment"></textarea>
																		</div>
																	</div>
																	<div class="col-lg-12">
																		<div class="mb-3 mb-0">
																			<input type="submit" value="Post Comment" class="submit btn btn-primary" name="submit">
																		</div>
																	</div>
																</div>
															</form>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-12">
								<div class="card">
									<div class="card-body">
										<div class="profile-blog">
											<h5 class="text-primary d-inline">Today Highlights</h5>
											<img src="images/profile/1.jpg" alt="" class="img-fluid mt-4 mb-4 w-100">
											<h4><a href="post-details.html" class="text-black">Darwin Creative Agency Theme</a></h4>
											<p class="mb-0">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-12">
								<div class="card">
									<div class="card-body">
										<div class="profile-interest">
											<h5 class="text-primary d-inline">Interest</h5>
											<div class="row mt-4 sp4" id="lightgallery">
												<a href="images/profile/2.jpg" data-exthumbimage="images/profile/2.jpg" data-src="images/profile/2.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
													<img src="images/profile/2.jpg" alt="" class="img-fluid">
												</a>
												<a href="images/profile/3.jpg" data-exthumbimage="images/profile/3.jpg" data-src="images/profile/3.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
													<img src="images/profile/3.jpg" alt="" class="img-fluid">
												</a>
												<a href="images/profile/4.jpg" data-exthumbimage="images/profile/4.jpg" data-src="images/profile/4.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
													<img src="images/profile/4.jpg" alt="" class="img-fluid">
												</a>
												<a href="images/profile/3.jpg" data-exthumbimage="images/profile/3.jpg" data-src="images/profile/3.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
													<img src="images/profile/3.jpg" alt="" class="img-fluid">
												</a>
												<a href="images/profile/4.jpg" data-exthumbimage="images/profile/4.jpg" data-src="images/profile/4.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
													<img src="images/profile/4.jpg" alt="" class="img-fluid">
												</a>
												<a href="images/profile/2.jpg" data-exthumbimage="images/profile/2.jpg" data-src="images/profile/2.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
													<img src="images/profile/2.jpg" alt="" class="img-fluid">
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-12">
								<div class="card">
									<div class="card-body">
										<div class="profile-news">
											<h5 class="text-primary d-inline">Our Latest News</h5>
											<div class="media pt-3 pb-3">
												<img src="images/profile/5.jpg" alt="image" class="me-3 rounded" width="75">
												<div class="media-body">
													<h5 class="m-b-5"><a href="post-details.html" class="text-black">Collection of textile samples</a></h5>
													<p class="mb-0">I shared this on my fb wall a few months back, and I thought.</p>
												</div>
											</div>
											<div class="media pt-3 pb-3">
												<img src="images/profile/6.jpg" alt="image" class="me-3 rounded" width="75">
												<div class="media-body">
													<h5 class="m-b-5"><a href="post-details.html" class="text-black">Collection of textile samples</a></h5>
													<p class="mb-0">I shared this on my fb wall a few months back, and I thought.</p>
												</div>
											</div>
											<div class="media pt-3 pb-3">
												<img src="images/profile/7.jpg" alt="image" class="me-3 rounded" width="75">
												<div class="media-body">
													<h5 class="m-b-5"><a href="post-details.html" class="text-black">Collection of textile samples</a></h5>
													<p class="mb-0">I shared this on my fb wall a few months back, and I thought.</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                    </div>-->
			<div class="col-xl-12">
				<div class="card">
					<div class="card-body">
						<div class="profile-tab">
							<div class="custom-tab-1">
								<ul class="nav nav-tabs">
									<li class="nav-item"><a href="#about-me" data-bs-toggle="tab"
											class="nav-link active show">Account</a>
									</li>
									<li class="nav-item"><a href="#my-posts" data-bs-toggle="tab"
											class="nav-link">Athentication</a>
									</li>
									<li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab"
											class="nav-link">Setting</a>
									</li>
									<li class="nav-item"><a href="#change-image" data-bs-toggle="tab"
											class="nav-link">Change Avatar</a>
									</li>
								</ul>
								<div class="tab-content">
									<div id="about-me" class="tab-pane fade active show">
										<div class="profile-about-me">
											<div class="pt-4 border-bottom-1 pb-3">
												<h4 class="text-primary">Account Description</h4>
												<p class="mb-2">Purpose </p>
											</div>
										</div>

										<div class="profile-lang  mb-5">
											<h4 class="text-primary mb-2">Account Number</h4>
											<a href="javascript:void(0);" class="text-muted pe-3 f-s-16"><i
													class="flag-icon flag-icon-us"></i>{{Auth::user()->a_number}}</a>
										</div>

										<div class="profile-lang  mb-5">
											<h4 class="text-primary mb-2">Account Type</h4>
											<a href="javascript:void(0);" class="text-muted pe-3 f-s-16"><i
													class="flag-icon flag-icon-us"></i>{{Auth::user()->account_type}}</a>
										</div>
										<div class="profile-personal-info">
											<h4 class="text-primary mb-4">Personal Information</h4>
											<div class="row mb-2">
												<div class="col-sm-3 col-5">
													<h5 class="f-w-500">Name <span class="pull-end">:</span>
													</h5>
												</div>
												<div class="col-sm-9 col-7"><span>{{Auth::user()->first_name}}
														{{Auth::user()->last_name}}</span>
												</div>
											</div>
											<div class="row mb-2">
												<div class="col-sm-3 col-5">
													<h5 class="f-w-500">Email <span class="pull-end">:</span>
													</h5>
												</div>
												<div class="col-sm-9 col-7"><span>{{Auth::user()->email}}</span>
												</div>
											</div>
											<div class="row mb-2">
												<div class="col-sm-3 col-5">
													<h5 class="f-w-500">Phone Number <span class="pull-end">:</span>
													</h5>
												</div>
												<div class="col-sm-9 col-7"><span>{{Auth::user()->phone_number}}</span>
												</div>
											</div>
											<div class="row mb-2">
												<div class="col-sm-3 col-5">
													<h5 class="f-w-500">Nationality <span class="pull-end">:</span></h5>
												</div>
												<div class="col-sm-9 col-7"><span>{{Auth::user()->country}}</span>
												</div>
											</div>
											<div class="row mb-2">
												<div class="col-sm-3 col-5">
													<h5 class="f-w-500">Address <span class="pull-end">:</span>
													</h5>
												</div>
												<div class="col-sm-9 col-7"><span>{{Auth::user()->address}}</span>
												</div>
											</div>



										</div>
									</div>
									<div id="my-posts" class="tab-pane fade">
										<div class="my-post-content pt-3">

											<form id="user_password" action="{{ route('update-password') }}"
												method="POST">
												@csrf
												<div id="user_password_response"></div>
												<div class="post-input">
													<div class="mb-3 row">
														<label class="col-sm-2 col-form-label">Current Password</label>
														<div class="col-sm-10">
															<input type="password" class="form-control form-control-sm"
																name="old_password">
															@error('old_password')
															<span class="text-danger">{{ $message }}</span>
															@enderror
														</div>
													</div>

													<div class="mb-3 row">
														<label class="col-sm-2 col-form-label">New Password</label>
														<div class="col-sm-10">
															<input type="password" class="form-control form-control-sm"
																name="new_password">
															@error('new_password')
															<span class="text-danger">{{ $message }}</span>
															@enderror
														</div>
													</div>

													<div class="mb-3 row">
														<label class="col-sm-2 col-form-label">Confirm Password</label>
														<div class="col-sm-10">
															<input type="password" class="form-control form-control-sm"
																name="new_password_confirmation">

														</div>
													</div>
													<div class="mt-4 w-100">
														<button id="btnPassword" type="submit"
															class="btn btn-success float-right">Save</button>

													</div>
												</div>
											</form>
										</div>
									</div>

									<div id="profile-settings" class="tab-pane fade">
										<div class="pt-3">
											<div class="settings-form">
												<h4 class="text-primary">Account Setting</h4>
												<form id="user_info" action="{{route('personal.details')}}"
													method="POST">
													@csrf
													<div id="user_info_response"></div>
													<div class="row">
														<div class="mb-3 col-md-6">
															<label class="form-label">First Name</label>
															<input type="text" name="first_name" class="form-control"
																value="{{Auth::user()->first_name}}">
														</div>
														<div class="mb-3 col-md-6">
															<label class="form-label">Last Name</label>
															<input type="text" name="last_name" class="form-control"
																value="{{Auth::user()->last_name}}">
														</div>
													</div>

													<div class="mb-3">
														<label class="form-label">Address</label>
														<textarea type="text" name="user_address"
															class="form-control">{{Auth::user()->address}}</textarea>
													</div>
													<div class="row">
														<div class="mb-3 col-md-4">
															<label class="form-label">Phone</label>
															<input type="text" name="user_phone" class="form-control"
																value="{{Auth::user()->phone_number}}">
														</div>

													</div>

													<button id="btn1" class="btn btn-primary" type="submit">Save
														Data</button>
												</form>
											</div>
										</div>
									</div>

									<div id="change-image" class="tab-pane fade">
										<form id="update___avatar" action="{{route('personal.dp')}}" method="POST"
											enctype="multipart/form-data">
											@csrf
											<div class="row">
												<div id="avatar_response" class="mb-5 mt-4"></div>

												<div class="mb-3 col-xl-12">
													<div class="d-flex align-items-center mb-3">
														<img class="me-3 rounded-circle me-0 me-sm-3"
															src="{{ asset('uploads/display/' . (Auth::user()->display_picture ? Auth::user()->display_picture : 'avatar.png')) }}"
															width="55" height="55" alt="">
														<div class="flex-grow-1">
															<h4 class="mb-0">{{Auth::user()->first_name}}
																{{Auth::user()->last_name}}</h4>
															<p class="mb-0">Max file size is 5mb
															</p>
														</div>
													</div>
													<div class="file-upload-wrapper" data-text="Change Photo">
														<input name="image" type="file" accept="image/*"
															class="file-upload-field" required>
													</div>
												</div>
												<div class="col-12">
													<button class="btn btn-success waves-effect">Save</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@include('dashboard.footer')