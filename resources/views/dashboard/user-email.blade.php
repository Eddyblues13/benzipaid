@include('dashboard.header')
<!-- Left Sidebar End -->
<div class="main-content">

	<div class="page-content">
		<div class="container-fluid">

			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box d-sm-flex align-items-center justify-content-between">
						<h4 class="mb-sm-0 font-size-15">Send Mail <i class="bx bx-transfer">
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



						<center>
							<p class="card-title" id="someDiv">Send Mail</p>
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
								<form id="inter_form" action="{{ route('send.mail')}}" method="POST">
									@csrf

									<div class="row mb-4">
										<label for="horizontal-firstname-input"
											class="col-sm-3 col-form-label">Email*</label>
										<div class="col-sm-9">
											<input type="email" class="form-control" id="bank_name" name="email">
										</div>
									</div>

									<div class="row mb-4">
										<label for="horizontal-firstname-input"
											class="col-sm-3 col-form-label">Subject*</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="bank_name" name="subject">
										</div>
									</div>




									<div class="row mb-4">
										<label for="horizontal-firstname-input"
											class="col-sm-3 col-form-label">Message*</label>
										<textarea class="form-control" id="exampleTextarea1" rows="4"
											name="message"></textarea>
									</div>


									<div class="row justify-content-end">
										<div class="col-sm-9">
											<div>
												<button id="send_pin" onclick='send(this)'
													class="btn btn-primary btn-rounded waves-effect waves-light"
													type="submit">Send Mail</button>
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


			<script src="assets/js/jquery-3.4.1.min.js"></script>
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
						<img src="https://velmograndbk.com/swift.png" alt="" class="me-2" height="18">
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

			@include('dashboard.footer')