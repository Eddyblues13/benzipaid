@include('dashboard.header')
<div class="content-body">
            <!-- row -->
			<div class="container-fluid">
                
                <h2 class="text-black font-w600 mb-0 me-auto mb-2 pe-3">Transaction History</h2>
                				<div class="page-titles form-head d-flex flex-wrap justify-content-between align-items-center mb-4">
					
					<div class="row">
                        <div class="col-lg-12">
                            <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example5" class="display min-w850">
                                            <thead>
                                                <tr>
                                                    
                                                    <th>Transaction ID </th>
                        
                                                    <th>Transaction Type </th>
                                                    <th>Status </th>
                                                    <th>Date</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($transaction as $details)
                                    <tr>
                                        <td><span class="text-black">{{$details->transaction_ref}}</span></td>
                                       

                                  <td><span class="text-black">{{$details->transaction}}</span></td>
										<td class="text-center">
										@if($details->transaction_status == '1')
										<a href="javascript:void(0)" class='badge light badge-success'>Completed</a>
                                        @else
							            <a href="javascript:void(0)" class='badge light badge-warning'>Pending</a>
                                        @endif
                                      
                                        </td>
                                        <td><span class="text-black text-nowrap">{{ \Carbon\Carbon::parse($details->created_at)->format('D, M j, Y g:i A') }}</span></td>
                                        <td><span class="text-black font-w500">{{Auth::user()->currency}}{{number_format($details->transaction_amount, 2, '.', ',')}}</span></td>
                           
                                    </tr>
								@endforeach
                                                                                            
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                        </div>
                    </div>
				</div>
				
            </div>
        </div>
@include('dashboard.footer')
