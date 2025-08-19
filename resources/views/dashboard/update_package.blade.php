@include('dashboard.header')
<!-- ============================================================== -->
<!-- Left Sidebar End -->
<link href="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css" />
<div class="main-content">

	<div class="page-content">
		<div class="container-fluid">

			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box d-sm-flex align-items-center justify-content-between">
						<h4 class="mb-sm-0 font-size-15">Update Shipment <i class="bx bx-transfer">
							</i> </h4>

						<div class="page-title-right">
							<ol class="breadcrumb m-0">
							</ol>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-12">
				<div class="card" style="border-top-left-radius:30px; border-top-right-radius: 30px; ">
					<div class="card-body">

						<a id="send_pin" href="{{route('all.packages')}}" onclick='send(this)'
							class="btn btn-primary btn-rounded waves-effect waves-light" type="submit">Go Back</a>

						<center>
							<p class="card-title" id="someDiv">Update {{$package->tracking_number}}</p>
						</center>
					</div>


					<div class="col-xl-12">
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
								<button type="button" class="btn-close" data-bs-dismiss="alert"
									aria-label="Close"></button>
							</div>
							@elseif (session('message'))
							<div class="alert box-bdr-green alert-dismissible fade show text-green" role="alert">
								<b>Success!</b> {{ session('message') }}
								<button type="button" class="btn-close" data-bs-dismiss="alert"
									aria-label="Close"></button>
							</div>
							@endif
							<div class="card-body">
								<h4 class="card-title mb-4"></h4>
								<form id="inter_form" action="{{ route('update.shipment',$package->id)}}" method="POST">
									@csrf
									<div class="row mb-4">
										<label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Sender
											Name*</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="bank_name" name="sender_name"
												value="{{$package->sender_name}}">
										</div>
									</div>
									<div class="row mb-4">
										<label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Sender
											Email*</label>
										<div class="col-sm-9">
											<input type="email" class="form-control" id="bank_name" name="sender_email"
												value="{{$package->sender_email}}">
										</div>
									</div>
									<div class="row mb-4">
										<label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Sender
											Address*</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="bank_name" name="sender_address"
												value="{{$package->sender_address}}">
										</div>
									</div>
									<div class="row mb-4">
										<label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Receiver
											Name*</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="bank_name" name="receiver_name"
												value="{{$package->receiver_name}}">
										</div>
									</div>
									<div class="row mb-4">
										<label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Receiver
											Phone*</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="bank_name" name="receiver_phone"
												value="{{$package->receiver_phone}}">
										</div>
									</div>
									<div class="row mb-4">
										<label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Receiver
											Email*</label>
										<div class="col-sm-9">
											<input type="email" class="form-control" id="bank_name"
												name="receiver_email" value="{{$package->receiver_email}}">
										</div>
									</div>
									<div class="row mb-4">
										<label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Receiver
											Address*</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="bank_name"
												name="receiver_address" value="{{$package->receiver_address}}">
										</div>
									</div>

									<div class="row mb-4">
										<label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Parcel
											Description*</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="bank_name"
												name="parcel_description" value="{{$package->parcel_description}}">
										</div>
									</div>
									<div class="row mb-4">
										<label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Dispatch
											Location*</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="bank_name"
												name="dispatch_location" value="{{$package->dispatch_location}}">
										</div>
									</div>
									<div class="row mb-4">
										<label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Current
											Location*</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="bank_name"
												name="current_location" value="{{$package->current_location}}">
										</div>
									</div>
									<div class="row mb-4">
										<label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Courier
											Status</label>
										<div class="col-sm-9">
											<select class="form-control" id="balance" name="parcel_status">
												<option value="{{$package->parcel_status}}" selected>
													{{$package->parcel_status}}</option>
												<option value="In Transit">In Transit</option>
												<option value="On Hold">On Hold</option>
												<option value="Delivered">Delivered</option>
												<option value="Failed">Failed</option>

											</select>
										</div>
									</div>


									<div class="row mb-4">
										<label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Dispatch
											Date*</label>
										<div class="col-sm-9">
											<input type="date" class="form-control" id="bank_name" name="dispatch_date"
												value="{{$package->dispatch_date}}">
										</div>
									</div>




									<div class="row justify-content-end">
										<div class="col-sm-9">
											<div>
												<button id="send_pin" onclick='send(this)'
													class="btn btn-primary btn-rounded waves-effect waves-light"
													type="submit">Update shipment</button>
											</div>
										</div>
									</div>
								</form>
							</div>
							<p class="response"></p>
							<!-- end card body -->
						</div>
						<!-- end card -->
					</div>
				</div>
			</div>


			<script src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script>
			<script>
				function send(id){
// $("#myModal").modal('show');
id.innerHTML = "Please wait..<div class='spinner-border spinner-border-sm' role='status'><span class='sr-only'>Loading...</span></div>";
setTimeout(function(){
id.innerHTML = "Send";
// $("#myModal").modal('hide');
//window.scrollTo(0, 50);
}, 3000);
}
			</script>

			<center>
				<div id="myModal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
					role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					<div class="modal-dialog" style="margin-top:180px; padding:-73px;">
						<div class="modal-content"
							style="background-color:#31202000; border: 1px solid rgba(0, 0, 0, 0);">
							<div class="modal-body">
								<img src="loader1.gif" width="50px">
							</div>
						</div>
					</div>
				</div>
			</center>

			<script src="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
			<div class="position-fixed top-0 end-0 p-2" style="z-index: 1005">
				<div id="ErrorToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
					<div class="toast-header">
						<img src="https://benzipaid.online/swift.png" alt="" class="me-2" height="18">
						<strong class="me-auto">Error</strong>
						<small>Check for Error</small>
						<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
					</div>
					<div class="toast-body" style="background-color:red;">

					</div>
				</div>
			</div>

			<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
			<script>
				$(document).ready(function(){
$('#inter_form').on('submit', function(e){
	e.preventDefault();

	var loader_code = $('#loader_code').val();
	var bank_name = $('#bank_name').val();
	var acc_number = $('#acc_number').val();
	var balance = $('#balance').val();
	var amount = $('#amount').val();
	var transaction_pin = $('#transaction_pin').val();
	var swift = $('#swift').val();
	var iban = $('#iban').val();
	var acc_type = $('#acc_type').val();
	var remark = $('#remark').val();
	
	if(loader_code=="" ||  bank_name=="" ||  acc_number=="" || balance=="" || transaction_pin=="" || amount=='' || acc_type=="" || remark=="" || swift=="" || iban=="" ){
	   $(".toast-body").html('Enter all field');
	   $("#ErrorToast").toast("show");
	   return false;
	}

	if(acc_number.length<10) {
	  $(".toast-body").html('Invalid account number');
	  $("#ErrorToast").toast("show");
	  $("#acc_number").val('');
	   return false;
	}
	
	if(bank_name.length<5) {
	  $(".toast-body").html('Input Bank Full Name');
	  $("#ErrorToast").toast("show");
	  $("#acc_number").val('');
	   return false;
	}

	if(transaction_pin.length<4){
	 $(".toast-body").html('Transaction Pin Error');
	 $("#ErrorToast").toast("show");
	 $("#transaction_pin").val('');
	   return false;
	}
	
	 $.ajax({
		type: "POST",
		url: 'secondlevel_transfer/international_transfer_process.php',
		data:{loader_code:loader_code, bank_name:bank_name, acc_number:acc_number, balance:balance, transaction_pin:transaction_pin, amount:amount, acc_type:acc_type, remark:remark, swift:swift, iban:iban},
		dataType:"json",
		success: function(data){
		   $(".response").html(data.content1);
		   if(data.content=='successful'){
			  $(".response").html(data.content1);
			 }else
		   if(data.content=='Error'){
			  $(".response").html(data.content1);
			}
		},
		error: function(data, errorThrown){
		swal('Error', 'Network anormaly', 'error',{closeOnClickOutside: false,});
	   }
	});
	
});
});
			</script>
			<style>
				input.pw3 {
					-webkit-text-security: square;
				}
			</style>






		</div>
		<!-- END layout-wrapper -->

		<!-- Right Sidebar -->
		<div class="right-bar">
			<div data-simplebar class="h-100">
				<div class="rightbar-title d-flex align-items-center px-3 py-4">

					<h5 class="m-0 me-2">Settings</h5>

					<a href="javascript:void(0);" class="right-bar-toggle ms-auto">
						<i class="mdi mdi-close noti-icon"></i>
					</a>
				</div>

				<!-- Settings -->
				<hr class="mt-0" />
				<h6 class="text-center mb-0">Choose Layouts</h6>

				<div class="p-4">
					<!-- <div class="mb-2">
                        <img src="assets/images/layouts/layout-1.jpg" class="img-thumbnail" alt="layout images">
                    </div> -->

					<div class="form-check form-switch mb-3">
						<input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
						<label class="form-check-label" for="light-mode-switch">Use Light Mode</label>
					</div>

					<!-- <div class="mb-2">
                        <img src="assets/images/layouts/layout-2.jpg" class="img-thumbnail" alt="layout images">
                    </div> -->
					<div class="form-check form-switch mb-3">
						<input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch">
						<label class="form-check-label" for="dark-mode-switch">Use Dark Mode</label>
					</div>

				</div>

			</div>
			<!-- end slimscroll-menu-->
		</div>
		<!-- /Right-bar -->

		<!-- Right bar overlay-->
		<div class="rightbar-overlay"></div>

		<!-- JAVASCRIPT -->

		<script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		<script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
		<script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
		<script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>

		<!-- apexcharts -->
		<script src="{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

		<!-- dashboard init -->
		<script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script>

		<!-- Bootstrap Toasts Js -->
		<script src="{{asset('assets/js/pages/bootstrap-toastr.init.js')}}"></script>

		<!-- App js -->
		<script src="{{asset('assets/js/app.js')}}"></script>


		<!-- Required jQuery first, then Bootstrap Bundle JS -->
		<script src="{{asset('assets/js/jquery.min.js')}}"></script>
		<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
		<script src="{{asset('assets/js/modernizr.js')}}"></script>
		<script src="{{asset('assets/js/moment.js')}}"></script>

		<!-- *************
			************ Vendor Js Files *************
		************* -->

		<!-- Overlay Scroll JS -->
		<script src="{{asset('assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js')}}"></script>
		<script src="{{asset('assets/vendor/overlay-scroll/custom-scrollbar.js')}}"></script>

		<!-- News ticker -->
		<script src="{{asset('assets/vendor/newsticker/newsTicker.min.js')}}"></script>
		<script src="{{asset('assets/vendor/newsticker/custom-newsTicker.js')}}"></script>

		<!-- Main Js Required -->
		<script src="{{asset('assets/js/main.js')}}"></script>
		</body>

		</html>
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script>
			$('#logout_account, #logout_account1').click(function() {
        $.ajax({
            type: 'GET',
            url: '{{ route("logout") }}',
            dataType: 'json',
            success: function(data) {
                $('.logout').html(data.content);
                if (data.content == 'Logout Successful') {
                   $('.logout').html(data.content);
                  
                   window.location='../login'
                 
                } else
                if (data.content == 'Error') {
                    $('.logout').html(data.content);
                }
            },
            error: function(data, errorThrown) {
                Swal.fire('The Internet?', 'Check network connection!', 'question');
                return false;
            }
        });
    });


    $("#someDiv").hide();
    setInterval(function() {
        $("#someDiv").fadeIn(1000).fadeOut(2500);
    }, 0)
		</script>