@include('admin.header')
<!-- Sidebar -->
<div class="sidebar sidebar-style-2" data-background-color="white">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            Admin Test
                            <span class="user-level"> Admin</span>

                        </span>
                    </a>
                </div>
            </div>

            <ul class="nav nav-primary">
                <li class="nav-item ">
                    <a href="https://lockestocks.com/account/admin/dashboard">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item   ">
                    <a href="https://lockestocks.com/account/admin/dashboard/plans">
                        <i class="fas fa-cubes " aria-hidden="true"></i>
                        <p>Add copy Trader</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="https://lockestocks.com/account/admin/dashboard/userplansx">
                        <i class="fas fa-cubes " aria-hidden="true"></i>
                        <p>Coppied Traders Investment</p>
                    </a>
                </li>

                <li class="nav-item   ">
                    <a href="https://lockestocks.com/account/admin/dashboard/stock">
                        <i class="fas fa-cubes " aria-hidden="true"></i>
                        <p>Add Stock</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="https://lockestocks.com/account/admin/dashboard/userstock">
                        <i class="fas fa-cubes " aria-hidden="true"></i>
                        <p>Purchased Stock</p>
                    </a>
                </li>


                <li class="nav-item    ">
                    <a href="https://lockestocks.com/account/admin/dashboard/manageusers">
                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                        <p>Manage Users</p>
                    </a>
                </li>

                <li class="nav-item   ">
                    <a href="https://lockestocks.com/account/admin/dashboard/mdeposits">
                        <i class="fa fa-download" aria-hidden="true"></i>
                        <p>Manage Deposits</p>
                    </a>
                </li>

                <li class="nav-item    ">
                    <a href="https://lockestocks.com/account/admin/dashboard/mwithdrawals">
                        <i class="fa fa-arrow-alt-circle-up" aria-hidden="true"></i>
                        <p>Manage Withdrawal</p>
                    </a>
                </li>


                <li class="nav-item  ">
                    <a data-toggle="collapse" href="#adm">
                        <i class="fa fa-user"></i>
                        <p>Administrator(s)</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="adm">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="https://lockestocks.com/account/admin/dashboard/addmanager">
                                    <span class="sub-item">Add Manager</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://lockestocks.com/account/admin/dashboard/madmin">
                                    <span class="sub-item">Manage Administrator(s)</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item     active     ">
                    <a data-toggle="collapse" href="#settings">
                        <i class="fa fa-cog"></i>
                        <p>Settings</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="settings">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="https://lockestocks.com/account/admin/dashboard/settings/app-settings">
                                    <span class="sub-item">App Settings</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://lockestocks.com/account/admin/dashboard/settings/referral-settings">
                                    <span class="sub-item">Referral Settings</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://lockestocks.com/account/admin/dashboard/settings/payment-settings">
                                    <span class="sub-item">Payment Settings</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://lockestocks.com/account/admin/dashboard/manage-crypto-assets">
                                    <span class="sub-item">Exchange Settings</span>
                                </a>
                            </li>
                            <li>
                                <a
                                    href="https://lockestocks.com/account/admin/dashboard/settings/subscription-settings">
                                    <span class="sub-item">Subscription Settings</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://lockestocks.com/account/admin/dashboard/frontpage">
                                    <span class="sub-item">Frontend Settings</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://lockestocks.com/account/admin/dashboard/privacy-policy">
                                    <span class="sub-item">Terms and Privacy</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://lockestocks.com/account/admin/dashboard/ipaddress">
                                    <span class="sub-item">IP Address</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <!--   <li class="nav-item ">
                    <a href="https://lockestocks.com/account/admin/dashboard/about">
                        <i class=" fa fa-info-circle" aria-hidden="true"></i>
                        <p>About Onlinetrader</p>
                    </a>
                </li>-->

            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
<div class="main-panel bg-light">
    <div class="content bg-light">
        <div class="page-inner">
            <div class="mt-2 mb-4">
                <h1 class="title1 text-dark">MT4 Subscription Settings</h1>
            </div>
            <div>
            </div>
            <div>
            </div>
            <div class="mb-5 row">
                <div class="col-md-8 offset-md-2">
                    <div class="card p-1 p-md-5 shadow-lg bg-light">
                        <form method="post" action="javascript:void(0)" id="subform">
                            <input type="hidden" name="_token" value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon"> <input
                                type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <h5 class="text-dark">Use MT4 Subscription Feature</h5>
                                <div class="selectgroup">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="subscription_service" id="subscripton" value="on"
                                            class="selectgroup-input" checked="">
                                        <span class="selectgroup-button">On</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="subscription_service" id="subscriptonoff" value="off"
                                            class="selectgroup-input">
                                        <span class="selectgroup-button">Off</span>
                                    </label>
                                </div>
                                <div>
                                    <small class="text-dark">Your users will not be able to see/use this service if
                                        turned off</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <h4 class="text-dark">Monthly Subscription Fee:</h4>
                                <input type="text" name="monthlyfee" class="form-control bg-light text-dark" value="30">
                            </div>

                            <div class="form-group">
                                <h4 class="text-dark">Quaterly Subscription Fee:</h4>
                                <input type="text" name="quaterlyfee" class="form-control bg-light text-dark"
                                    value="40">
                            </div>

                            <div class="form-group">
                                <h4 class="text-dark">Yearly Subscription Fee:</h4>
                                <input type="text" name="yearlyfee" class="form-control bg-light text-dark" value="80">
                            </div>

                            <div class="form-group">
                                <input type="submit" class="px-5 btn btn-primary btn-lg" value="Save">
                                <input type="hidden" name="id" value="1">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("subscriptonoff").checked= true;
    </script>
    <script>
        // Submit email preference form
	$('#subform').on('submit', function() {
		//alert('love');
		$.ajax({
			url: "https://lockestocks.com/account/admin/dashboard/updatesubfee",
			type: 'POST',
			data: $('#subform').serialize(),
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