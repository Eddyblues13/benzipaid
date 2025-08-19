@include('admin.header')
<div class="main-panel bg-light">
	<div class="content bg-light">
		<div class="page-inner">
			<div class="mt-2 mb-4">
				<h1 class="title1 text-dark">Referral/Other Bonus Settings</h1>
			</div>
			<div>
			</div>
			<div>
			</div>
			<div class="row">
				<div class="col-md-8 offset-md-2">
					<form method="post" action="javascript:void(0)" id="refform">
						<input type="hidden" name="_token" value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon"> <input
							type="hidden" name="_method" value="PUT">
						<div class="form-group">
							<h5 class="text-dark">Direct Referral Commission (%) </h5>
							<input type="text" class="form-control bg-light text-dark" name="ref_commission" value="40"
								required>
						</div>

						<div class="form-group">
							<h5 class="text-dark">Indirect Referral Commission 1 (%) </h5>
							<input type="text" class="form-control bg-light text-dark" name="ref_commission1" value="30"
								required>
						</div>

						<div class="form-group">
							<h5 class="text-dark">Indirect Referral Commission 2 (%) </h5>
							<input type="text" class="form-control bg-light text-dark" name="ref_commission2" value="20"
								required>
						</div>

						<div class="form-group">
							<h5 class="text-dark">Indirect Referral Commission 3 (%) </h5>
							<input type="text" class="form-control bg-light text-dark" name="ref_commission3" value="10"
								required>
						</div>

						<div class="form-group">
							<h5 class="text-dark">Indirect Referral Commission 4 (%) </h5>
							<input type="text" class="form-control bg-light text-dark" name="ref_commission4" value="5"
								required>
						</div>

						<div class="form-group">
							<h5 class="text-dark">Indirect Referral Commission 5 (%) </h5>
							<input type="text" class="form-control  bg-light text-dark" name="ref_commission5" value="1"
								required>
						</div>

						<div class="form-group">
							<h5 class="text-dark">Registration Bonus(R)</h5>
							<input type="text" class="form-control bg-light text-dark" name="signup_bonus" value="0"
								required>
						</div>
						<div class="form-group">
							<input type="submit" class="px-5 btn btn-primary btn-lg" value="Update">
							<input type="hidden" name="id" value="1">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script>
		// Submit email preference form
	$('#refform').on('submit', function() {
		//alert('love');
		$.ajax({
			url: "https://lockestocks.com/account/admin/dashboard/update-bonus",
			type: 'POST',
			data: $('#refform').serialize(),
			success: function(response) {
				if (response.status === 200) {
					$.notify({
						// options
						icon: 'flaticon-alarm-1',
						title: 'Success',
						message: response.success,
					},{
						// settings
						type: 'success',
						allow_dismiss: true,
						newest_on_top: false,
						placement: {
							from: "top",
							align: "right"
						},
						offset: 20,
						spacing: 10,
						z_index: 1031,
						delay: 5000,
						timer: 1000,
						animate: {
							enter: 'animated fadeInDown',
							exit: 'animated fadeOutUp'
						},
	
					});
				} else {
					
				}
			},
			error: function(error) {
				console.log(error);
			},
		});
	});
	</script>

	@include('admin.footer')