@include('admin.header')
<!-- End Sidebar -->
<div class="main-panel bg-light">
    <div class="content bg-light">
        <div class="page-inner">
            <div class="mt-2 mb-4">
                <h1 class="title1 text-dark">Crypto Assets/Exchnage Settings</h1>
            </div>
            <div>
            </div>
            <div>
            </div>
            <div class="mb-5 row">
                <div class="col-md-12">
                    <div class="card p-3 p-md-5 shadow-lg bg-light">
                        <div class="row">
                            <div class="form-group col-12 d-inline">
                                <h5 class="text-dark">Use this Feature</h5>
                                <div class="selectgroup">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="crypto" id="cryptoyes" value="true"
                                            class="selectgroup-input" checked="">
                                        <span class="selectgroup-button">On</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="crypto" id="cryptono" value="false"
                                            class="selectgroup-input">
                                        <span class="selectgroup-button">Off</span>
                                    </label>
                                </div>
                                <div>
                                    <small class="text-dark">Your users will not be able to see/use this service if
                                        turned off</small>
                                </div>
                                <script>
                                    document.getElementById("cryptoyes").checked= true;
                                </script>
                            </div>
                            <div class="col-md-6 offset-md-3">

                                <form action="https://lockestocks.com/account/admin/dashboard/exchangefee"
                                    method="post">
                                    <input type="hidden" name="_token" value="s195WfZZZJb3SUAWuuGNZ9Eo2OT4S0jZ1ogZrdon">
                                    <div class=" form-group">
                                        <h5 class="text-dark">Exchange Fee</h5>
                                        <input type="text" name="fee" value="2" class="text-dark form-control bg-light"
                                            id="">
                                    </div>
                                    <div class=" form-group">
                                        <h5 class="text-dark">ZAR/USD Rate</h5>
                                        <input type="number" name="rate" value="500" step=".0"
                                            class="text-dark form-control bg-light" placeholder="450">
                                        <small class="text-dark">This rate will be used to calculate your users crypto
                                            equivilent in your chosen currency.</small>
                                    </div>

                                    <div class=" form-group">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                            <div class="mt-3 col-12">
                                <div class=" table-responsive">
                                    <table class="table table-hover text-dark">
                                        <thead>
                                            <tr>
                                                <th scope="col">Asset Name</th>
                                                <th scope="col">Asset Symbol</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Bitcoin</td>
                                                <td>BTC</td>
                                                <td>
                                                    <span class="badge badge-success">enabled </span>
                                                </td>
                                                <td>
                                                    <a href="https://lockestocks.com/account/admin/dashboard/setcryptostatus/btc/disabled"
                                                        class="btn btn-danger btn-sm">Disable</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Ethereum</td>
                                                <td>ETH</td>
                                                <td>
                                                    <span class="badge badge-success">enabled </span>
                                                </td>
                                                <td>
                                                    <a href="https://lockestocks.com/account/admin/dashboard/setcryptostatus/eth/disabled"
                                                        class="btn btn-danger btn-sm">Disable</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Litecoin</td>
                                                <td>LTC</td>
                                                <td>
                                                    <span class="badge badge-success">enabled </span>
                                                </td>
                                                <td>
                                                    <a href="https://lockestocks.com/account/admin/dashboard/setcryptostatus/ltc/disabled"
                                                        class="btn btn-danger btn-sm">Disable</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Chainlink</td>
                                                <td>LINK</td>
                                                <td>
                                                    <span class="badge badge-success">enabled </span>
                                                </td>
                                                <td>
                                                    <a href="https://lockestocks.com/account/admin/dashboard/setcryptostatus/link/disabled"
                                                        class="btn btn-danger btn-sm">Disable</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Binance Coin</td>
                                                <td>BNB</td>
                                                <td>
                                                    <span class="badge badge-success">enabled </span>
                                                </td>
                                                <td>
                                                    <a href="https://lockestocks.com/account/admin/dashboard/setcryptostatus/bnb/disabled"
                                                        class="btn btn-danger btn-sm">Disable</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Aave</td>
                                                <td>AAVE</td>
                                                <td>
                                                    <span class="badge badge-success">enabled </span>
                                                </td>
                                                <td>
                                                    <a href="https://lockestocks.com/account/admin/dashboard/setcryptostatus/aave/disabled"
                                                        class="btn btn-danger btn-sm">Disable</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tether</td>
                                                <td>USDT</td>
                                                <td>
                                                    <span class="badge badge-success">enabled </span>
                                                </td>
                                                <td>
                                                    <a href="https://lockestocks.com/account/admin/dashboard/setcryptostatus/usdt/disabled"
                                                        class="btn btn-danger btn-sm">Disable</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Bitcoin Cash</td>
                                                <td>BCH</td>
                                                <td>
                                                    <span class="badge badge-success">enabled </span>
                                                </td>
                                                <td>
                                                    <a href="https://lockestocks.com/account/admin/dashboard/setcryptostatus/bch/disabled"
                                                        class="btn btn-danger btn-sm">Disable</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Ripple</td>
                                                <td>XRP</td>
                                                <td>
                                                    <span class="badge badge-success">enabled </span>
                                                </td>
                                                <td>
                                                    <a href="https://lockestocks.com/account/admin/dashboard/setcryptostatus/xrp/disabled"
                                                        class="btn btn-danger btn-sm">Disable</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Stellar</td>
                                                <td>XLM</td>
                                                <td>
                                                    <span class="badge badge-success">enabled </span>
                                                </td>
                                                <td>
                                                    <a href="https://lockestocks.com/account/admin/dashboard/setcryptostatus/xlm/disabled"
                                                        class="btn btn-danger btn-sm">Disable</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Ada</td>
                                                <td>ADA</td>
                                                <td>
                                                    <span class="badge badge-success">enabled </span>
                                                </td>
                                                <td>
                                                    <a href="https://lockestocks.com/account/admin/dashboard/setcryptostatus/ada/disabled"
                                                        class="btn btn-danger btn-sm">Disable</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div>
                                    <small class="text-dark">Be sure that non of your users have balances greater than 0
                                        in thier asset account before you disable the asset.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#cryptoyes').on('click', function() {
                // let truevalue = $('#cryptoyes').val()
                let uurl = "https://lockestocks.com/account/admin/dashboard/useexchange"  + '/' + 'true';
                $.ajax({
                    url: uurl,
                    type: 'GET',
                    
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

            $('#cryptono').on('click', function() {
                // let truevalue = $('#cryptoyes').val()
                let uurl = "https://lockestocks.com/account/admin/dashboard/useexchange"  + '/' + 'false';
                $.ajax({
                    url: uurl,
                    type: 'GET',
                    
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