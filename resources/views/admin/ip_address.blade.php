@include('admin.header')

<!-- End Sidebar -->
<div class="main-panel bg-light">
    <div class="content bg-light">
        <div class="page-inner">
            <div class="mt-2 mb-4">
                <h1 class="title1 text-dark">IP Address Blacklist</h1>
            </div>
            <div>
            </div>
            <div>
            </div>
            <div class="mb-5 row">
                <div class="col-md-12">
                    <div class="card p-1 p-md-5 shadow-lg bg-light text-dark">
                        <div class="row">
                            <div class="mb-3 col-md-8 offset-md-2">
                                <form method="post" action="javascript:void(0)" id="ipform">
                                    <input type="hidden" name="_token" value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                    <div class="form-group">
                                        <h6 class="text-dark">IP Address</h6>
                                        <input type="text" name="ipaddress" id="ipaddress"
                                            class="form-control bg-light text-dark">
                                        <small class="text-dark">This IP Address wont be able to access your
                                            website.</small>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="px-5 btn btn-primary btn-lg" value="Blacklist">
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-12">
                                <div class=" table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">IP-address</th>
                                                <th scope="col">Date blacklisted</th>
                                                <th scope="col">Option</th>
                                            </tr>
                                        </thead>
                                        <tbody id="showipaddress">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let textinput = document.getElementById('ipaddress');
    getallips();
    function getallips(){
        let url = "https://lockestocks.com/account/admin/dashboard/allipaddress";
        fetch(url)
        .then(function(res){
            return res.json();
        })
        .then(function (response){
            if(response.status === 200){
                document.getElementById('showipaddress').innerHTML = response.data;
            }
        })
        .catch(function(err){
            console.log(err);
        });
        
    }

    function deleteip(id){
        let url = "https://lockestocks.com/account/admin/dashboard/delete-ip"  + '/' + id;
        fetch(url)
        .then(function(res){
            return res.json();
        })
        .then(function (response){
            if(response.status === 200){
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
                getallips();
            }
        })
        .catch(function(err){
            console.log(err);
        });
    }
	// Submit email preference form
	$('#ipform').on('submit', function() {
		//alert('love');
		$.ajax({
			url: "https://lockestocks.com/account/admin/dashboard/add-ip",
			type: 'POST',
			data: $('#ipform').serialize(),
			success: function(response) {
				if (response.status === 200) {
                    textinput.value = "";
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
                    getallips();
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