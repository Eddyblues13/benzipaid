@include('admin.header')
<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            @if(session('message'))
            <div class="alert alert-success mb-2">{{session('message')}}</div>
            @endif
            <div class="mt-2 mb-4">
                <h1 class="title1 text-dark">Add stock</h1>
            </div>
            <div>
            </div>
            <div>
            </div>
            <div class="mb-5 row">
                <div class="col-lg-12 ">
                    <div class="p-3 card bg-light">
                        <form action="{{route('save-stock')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field()}} <div class="form-row">
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">stock Name</h5>
                                    <input class="form-control text-dark bg-light" placeholder="Enter trader name"
                                        type="text" name="stock_name" required>
                                </div>
                                <!-- <div class="form-group col-md-6">
                                            <h5 class="text-dark">Trading Default Amount ($)</h5> 
                                            <input class="form-control text-dark bg-light" placeholder="Enter Plan price" type="text" name="price" required>   
                                            <small class="text-dark">This is the maximum amount a user can pay to copy this trader</small>
                                       </div>-->
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Minimum buying amount ($)</h5>
                                    <input placeholder="Enter Plan minimum price"
                                        class="form-control text-dark bg-light" type="text" name="stock_min_amount"
                                        required>
                                    <small class="text-dark">This is the minimum amount a user can pay to copy this
                                        trader</small>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Maximum buyin amount ($)</h5>
                                    <input class="form-control text-dark bg-light" placeholder="Enter  maximum price"
                                        type="text" name="stock_max_amount" required>

                                </div>

                                <div class="form-group col-md-6">
                                    <h5 class="text-dark"> stock JS</h5>
                                    <input class="form-control text-dark bg-light" placeholder="paste" type="text"
                                        name="stock_js" required>

                                </div>-
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Stock graph</h5>
                                    <input class="form-control text-dark bg-light" placeholder="stock graph" type="text"
                                        name="stock_graph" required>

                                </div>

                                <input class="form-control text-dark bg-light" placeholder="Enter Additional Gift Bonus"
                                    type="hidden" name="gift" value="0" required>

                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Top up Interval</h5>
                                    <select class="form-control text-dark bg-light" name="top_up_interval">
                                        <option>Monthly</option>
                                        <option>Weekly</option>
                                        <option>Daily</option>
                                        <option>Hourly</option>
                                        <option>Every 30 Minutes</option>
                                    </select>
                                    <small class="text-dark">This specifies how often the system should add profit(ROI)
                                        to user account.</small>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Top up Type</h5>
                                    <select class="form-control text-dark bg-light" name="top_up_type">
                                        <option>Percentage</option>
                                        <option>Fixed</option>
                                    </select>
                                    <small class="text-dark">This specifies if the system should add profit in
                                        percentage(%) or a fixed amount.</small>
                                </div>

                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Top up Amount (in % or $ as specified above)</h5>
                                    <input class="form-control text-dark bg-light" placeholder="top up amount"
                                        type="text" name="top_up_amount" required>
                                    <small class="text-dark">This is the amount the system will add to users account as
                                        profit, based on what you selected in topup type and topup interval
                                        above.</small>
                                </div>



                                <!-- <div class="form-group col-md-6">
                                        <h5 class="text-dark">Investment Duration</h5> 
                                           <input class="form-control text-dark bg-light" placeholder="eg 1 Days, 2 Weeks, 1 Months" type="text" name="expiration" required> 
                                                  <small class="text-dark">This specifies how long the investment plan will run. Please strictly follow the guide on <a href="" data-toggle="modal" data-target="#durationModal">how to setup investment duration</a> else it may not work. </small> 
                                            
                                       </div>-->

                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Investment Duration</h5>
                                    <select class="form-control text-dark bg-light" name="investment_duration" required>
                                        <option value=""> Choose</option>
                                        <option value="2 Weeks">2 Weeks </option>
                                        <option value="1 Days">1 Daily </option>
                                        <option value="1 Weeks">1 Week </option>
                                        <option value="1 Months">1 Month </option>
                                        <option value="2 Months">2 Months </option>
                                        <option value="1 years">1 year </option>
                                        <option value="3 Months">3 Months </option>
                                    </select>


                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">status</h5>
                                    <select class="form-control text-dark bg-light" name="top_up_status" required>
                                        <option value=""> Choose</option>
                                        <option value="closed">closed </option>
                                        <option value="Open">Open </option>
                                    </select>


                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Shares</h5>
                                    <input class="form-control text-dark bg-light" placeholder="Enter shares"
                                        type="text" name="performance" required>

                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Volume</h5>
                                    <input class="form-control text-dark bg-light" placeholder="volume" type="text"
                                        name="copier_roi" required>

                                </div>
                                <!--
                                           <div class="form-group col-md-6">
                                             <h5 class="text-dark">Risk Index</h5> 			 
                                             <input class="form-control text-dark bg-light" placeholder="Enter risk" type="text" name="risk_Index" required> 
                                          
                                       </div>
                                          <div class="form-group col-md-6">
                                             <h5 class="text-dark">Performance</h5> 			 
                                             <input class="form-control text-dark bg-light" placeholder="Enter Trader Performance" type="text" name="performance" required> 
                                          
                                       </div>
                                        <div class="form-group col-md-6">
                                             <h5 class="text-dark">Total copied traders</h5> 			 
                                             <input class="form-control text-dark bg-light" placeholder="Enter total copied traders" type="text" name="investors" required> 
                                          
                                       </div> 
                                         <div class="form-group col-md-6">
                                             <h5 class="text-dark">Active traders</h5> 			 
                                             <input class="form-control text-dark bg-light" placeholder="Enteractive traders" type="text" name="activet" required> 
                                          
                                       </div>
                                         <div class="form-group col-md-6">
                                             <h5 class="text-dark">Trader country</h5> 			 
                                             <input class="form-control text-dark bg-light" placeholder="Enter years of exprience" type="text" name="country" required> 
                                          
                                       </div>-->
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">about stock</h5>
                                    <input class="form-control text-dark bg-light"
                                        placeholder="Enter years of exprience" type="text" name="years_of_experience"
                                        required>

                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">picture</h5>
                                    <input class="form-control text-dark bg-light" placeholder="upload image"
                                        type="file" name="image" required>

                                </div>

                                <div class="form-group col-md-12">

                                    <input type="submit" class="btn btn-primary" value="Add Plan">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="durationModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body bg-light">
                    <h5 class="text-dark">FIRSTLY, Always preceed the time frame with a digit, that is do not write the
                        number in letters, <br> <br> SECONDLY, always add space after the number, <br> <br> LASTLY, the
                        first letter of the timeframe should be in CAPS and always add 's' to the timeframe even if your
                        duration is just a day, month or year.</h5>
                    <h2 class="text-dark">Eg, 1 Days, 3 Weeks, 1 Hours, 48 Hours, 4 Months, 1 Years, 9 Months</h2>

                </div>
            </div>
        </div>
    </div>
    <div id="topupModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body bg-light">

                </div>
            </div>
        </div>
    </div>

    <script>
        function getduration(id, event){
                    event.preventDefault();
                    document.getElementById('duridden').value = id;
                }
    </script>
    @include('admin.footer')