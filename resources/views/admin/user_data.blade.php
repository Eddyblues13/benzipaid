@include('admin.header')
<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            @if(session('message'))
            <div class="alert alert-success mb-2">{{session('message')}}</div>
            @endif
            <!-- Success Message -->
@if(session('message'))
    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
        {{ session('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<!-- Validation Errors -->
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

            <div>
            </div>
            <div>
            </div> <!-- Beginning of  Dashboard Stats  -->
            <div class="row">
                <div class="col-md-12">
                    <div class="p-3 card bg-light">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <h1 class="d-inline text-primary">{{$user->name}}</h1>
                                    <span></span>
                                    <div class="d-inline">
                                        <div class="float-right btn-group">
                                            <a class="btn btn-primary btn-sm" href="{{route('manage.users.page')}}"> <i
                                                    class="fa fa-arrow-left"></i> back</a> &nbsp;
                                            <button type="button" class="btn btn-secondary dropdown-toggle btn-sm"
                                                data-toggle="dropdown" data-display="static" aria-haspopup="true"
                                                aria-expanded="false">
                                                Actions
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-lg-right">
                                                <a href="#" data-toggle="modal" data-target="#creditModal"
                                                    class="dropdown-item">Credit Account</a>
                                                <a class="dropdown-item" href="">Transaction History</a>
                                                <a href="#" data-toggle="modal" data-target="#debitModal"
                                                    class="dropdown-item">Debit Account</a>
                                                <a class="dropdown-item" href="">Login Activity</a>
                                                <a href="#" data-toggle="modal" data-target="#resetpswdModal"
                                                    class="dropdown-item">Reset Password</a>
                                                <a href="#" data-toggle="modal" data-target="#clearacctModal"
                                                    class="dropdown-item">Clear Account</a>

                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                    data-target="#accountSuspension">Account Suspension</a>

                                                <a href="#" data-toggle="modal" data-target="#accountverificationModal"
                                                    class="dropdown-item">Account Verification</a>

                                                <a href="#" data-toggle="modal" data-target="#edituser"
                                                    class="dropdown-item">Edit</a>
                                                <a href="#" data-toggle="modal" data-target="#sendmailtooneuserModal"
                                                    class="dropdown-item">Send Email</a>
                                                <a href="#" data-toggle="modal" data-target="#switchuserModal"
                                                    class="dropdown-item text-success">Gain Access</a>
                                                <a href="#" data-toggle="modal" data-target="#deleteModal"
                                                    class="dropdown-item text-danger">Delete {{$user->first_name}}
                                                    {{$user->last_name}}</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3 mt-4 border rounded row text-dark">
                                <div class="col-md-3">
                                    <h5 class="text-bold">Total Balance</h5>
                                    <p>${{number_format($total_balance, 2, '.', ',')}}</p>
                                </div>
                                <div class="col-md-3">
                                    <h5>Total Credits</h5>
                                    <p>${{number_format($credit_transfers, 2, '.', ',')}}</p>
                                </div>
                                <div class="col-md-3">
                                    <h5>Total Debits</h5>
                                    <p>${{number_format($debit_transfers, 2, '.', ',')}}</p>
                                </div>
                                <div class="col-md-3">
                                    <h5>User Account Status</h5>
                                    @if($user->user_status == 1)
                                    <span class="badge badge-success">Active</span>
                                    @else
                                    <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mt-3 row text-dark">
                                <div class="col-md-12">
                                    <h5>USER INFORMATION</h5>
                                </div>
                            </div>
                            <div class="p-3 border row text-dark">
                                <div class="col-md-4 border-right">
                                    <h5>Fullname</h5>
                                </div>
                                <div class="col-md-8">
                                    <h5>{{$user->first_name}} {{$user->last_name}}</h5>
                                </div>
                            </div>
                            <div class="p-3 border row text-dark">
                                <div class="col-md-4 border-right">
                                    <h5>Email Address</h5>
                                </div>
                                <div class="col-md-8">
                                    <h5>{{$user->email}}</h5>
                                </div>
                            </div>
                            <div class="p-3 border row text-dark">
                                <div class="col-md-4 border-right">
                                    <h5>VAT Code</h5>
                                </div>
                                <div class="col-md-8">
                                    <h5>{{$user->first_code}}</h5>
                                </div>

                                <a class="btn btn-sm btn-primary d-inline" href="#" data-toggle="modal"
                                    data-target="#vatCodeModal">Update VAT Code</a>
                            </div>
                            <div class="p-3 border row text-dark">
                                <div class="col-md-4 border-right">
                                    <h5>Mobile Number</h5>
                                </div>
                                <div class="col-md-8">
                                    <h5>{{$user->phone_number}}</h5>
                                </div>
                            </div>
                            <div class="p-3 border row text-dark">
                                <div class="col-md-4 border-right">
                                    <h5>Password</h5>
                                </div>
                                <div class="col-md-8">
                                    <h5>{{$user->access}}</h5>
                                </div>
                            </div>
                            <div class="p-3 border row text-dark">
                                <div class="col-md-4 border-right">
                                    <h5>Nationality</h5>
                                </div>
                                <div class="col-md-8">
                                    <h5>{{$user->country}}</h5>
                                </div>
                            </div>
                            <div class="p-3 border row text-dark">
                                <div class="col-md-4 border-right">
                                    <h5>Account Number</h5>
                                </div>
                                <div class="col-md-8">
                                    <h5>{{$user->a_number}}</h5>
                                </div>
                            </div>

                            <div class="p-3 border row text-dark">
                                <div class="col-md-4 border-right">
                                    <h5>Registered</h5>
                                </div>
                                <div class="col-md-8">
                                    <h5>{{ \Carbon\Carbon::parse($user->created_at)->format('D, M j, Y g:i A') }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- set user tin code Modal-->
    <div id="vatCodeModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title text-dark">VAT CODE</h4>
                    <button type="button" class="close text-dark" data-dismiss="modal">&times;</button>
                </div>
          <div class="modal-body bg-light">
    <p class="text-dark">Set {{$user->first_name}} {{$user->last_name}} VAT Code</p>
    <form style="padding:3px;" role="form" method="post" action="{{ route('vat-code') }}">
        @csrf

        <!-- Hidden input for user ID -->
        <input type="hidden" name="user_id" value="{{ $user->id }}">

        <div class="form-group">
            <input type="number" name="vat_code" class="form-control bg-light text-dark"
                placeholder="{{ $user->first_code }}" required>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Set Code">
        </div>
    </form>
</div>

            </div>
        </div>
    </div>


    <!-- Credit Modal first -->
    <div id="creditModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title text-dark">Credit {{$user->name}}
                        account.</strong></h4>
                    <button type="button" class="close text-dark" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body bg-light">
                    <form action="{{ route('credit') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <!-- User ID: Automatically filled, hidden -->
                        <input type="hidden" class="form-control" name="user_id" value="{{ $user->id }}">


                        <!-- User Name: Automatically filled, hidden -->
                        <input type="hidden" class="form-control" name="name"
                            value="{{ $user->first_name }} {{ $user->last_name }}">


                        <!-- User Email: Automatically filled, hidden -->
                        <input type="hidden" class="form-control" name="email" value="{{ $user->email }}">


                        <!-- Total Balance: Automatically filled, hidden -->
                        <input type="hidden" class="form-control" name="balance" value="{{ $total_balance }}">


                        <!-- Amount Input Field -->
                        <div class="form-group">
                            <label class="text-dark">Amount</label>
                            <input class="form-control bg-light text-dark" placeholder="Enter amount to credit"
                                type="number" name="amount" required>
                            <small class="text-muted">Enter the amount you want to credit to the user's account.</small>
                        </div>

                        <!-- Transfer Scope Dropdown -->
                        <div class="form-group">
                            <label class="text-dark">Transfer Scope</label>
                            <select class="form-control bg-light text-dark" name="type" required>
                                <option value="" selected disabled>Select Transfer Type</option>
                                <option value="Check Deposit">Check Deposit</option>
                                <option value="International Transfer">International Transfer</option>
                                <option value="Local Transfer">Local Transfer</option>
                            </select>
                            <small class="text-muted">Choose the type of transaction for this credit. This can be a
                                check deposit, international, or local transfer.</small>
                        </div>

                        <!-- Description Text Field -->
                        <div class="form-group">
                            <label class="text-dark">Description</label>
                            <textarea class="form-control bg-light text-dark" name="description"
                                placeholder="Enter a description for this transaction" rows="3"></textarea>
                            <small class="text-muted">Provide additional information about the credit transaction (e.g.,
                                reason for the credit, notes, etc.).</small>
                        </div>

                        <!-- Email Notification Dropdown -->
                        <div class="form-group">
                            <label class="text-dark">Send Email Notification</label>
                            <select class="form-control bg-light text-dark" name="t_type" required>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                            <small class="text-muted">Select whether to send an email notification to the user about
                                this transaction.</small>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
    <!-- /credit for a plan Modal -->


    <!-- Debit Modal first -->
    <div id="debitModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title text-dark">Debit {{$user->name}}
                        account.</strong></h4>
                    <button type="button" class="close text-dark" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body bg-light">
                    <form action="{{ route('debit') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <!-- User ID: Automatically filled, hidden -->
                        <input type="hidden" class="form-control" name="user_id" value="{{ $user->id }}">


                        <!-- User Name: Automatically filled, hidden -->
                        <input type="hidden" class="form-control" name="name"
                            value="{{ $user->first_name }} {{ $user->last_name }}">


                        <!-- User Email: Automatically filled, hidden -->
                        <input type="hidden" class="form-control" name="email" value="{{ $user->email }}">


                        <!-- Total Balance: Automatically filled, hidden -->
                        <input type="hidden" class="form-control" name="balance" value="{{ $total_balance }}">


                        <!-- Amount Input Field -->
                        <div class="form-group">
                            <label class="text-dark">Amount</label>
                            <input class="form-control bg-light text-dark" placeholder="Enter amount to credit"
                                type="number" name="amount" required>
                            <small class="text-muted">Enter the amount you want to debit to the user's account.</small>
                        </div>

                        <!-- Transfer Scope Dropdown -->
                        <div class="form-group">
                            <label class="text-dark">Transfer Scope</label>
                            <select class="form-control bg-light text-dark" name="type" required>
                                <option value="" selected disabled>Select Transfer Type</option>
                                <option value="Check Deposit">Check Deposit</option>
                                <option value="International Transfer">International Transfer</option>
                                <option value="Local Transfer">Local Transfer</option>
                            </select>
                            <small class="text-muted">Choose the type of transaction for this credit. This can be a
                                check deposit, international, or local transfer.</small>
                        </div>

                        <!-- Description Text Field -->
                        <div class="form-group">
                            <label class="text-dark">Description</label>
                            <textarea class="form-control bg-light text-dark" name="description"
                                placeholder="Enter a description for this transaction" rows="3"></textarea>
                            <small class="text-muted">Provide additional information about the credit transaction (e.g.,
                                reason for the credit, notes, etc.).</small>
                        </div>

                        <!-- Email Notification Dropdown -->
                        <div class="form-group">
                            <label class="text-dark">Send Email Notification</label>
                            <select class="form-control bg-light text-dark" name="t_type" required>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                            <small class="text-muted">Select whether to send an email notification to the user about
                                this transaction.</small>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /deposit for a plan Modal -->




    <!-- Account verification Modal -->
    <div id="accountverificationModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title text-dark">You are about to verify {{$user->name}}'s account,
                        Ones you verify thier account they wil be able to access thier account.</strong></h4>
                    <button type="button" class="close text-dark" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body bg-light">
                    <a class="btn btn-success" href="{{ route('user.verification', $user->id) }}">Verify</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Account verification Modal -->

    <!-- Account suspension Modal -->
    <div id="accountSuspension" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title text-dark">You are about to suspend {{$user->name}}'s account,
                        Ones you verify thier account they wil not be able to access thier account.</strong></h4>
                    <button type="button" class="close text-dark" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body bg-light">
                    <a class="btn btn-success" href="{{ route('user.suspension', $user->id) }}">Account
                        Suspension</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Account suspension Modal -->




    <!-- Top Up Modal -->
    <div id="topupxModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title text-dark">Fund/Debit {{$user->first_name}} WALLET.</strong></h4>
                    <button type="button" class="close text-dark" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body bg-light">
                    <form action="" method="POST" enctype="multipart/form-data">
                        {{ csrf_field()}}
                        <div class="form-group">
                            <input class="form-control bg-light text-dark" placeholder="Enter amount" type="text"
                                name="amount" required>
                        </div>
                        <div class="form-group">
                            <h5 class="text-dark">Select Wallet to Credit/Debit</h5>
                            <select class="form-control bg-light text-dark" name="type" required>
                                <option value="" selected disabled>Select Wallet</option>
                                <option value="Bitcoin">Bitcoin</option>
                                <option value="Ethereum">Ethereum</option>
                                <option value="LTC">LTC</option>
                                <option value="BNB">BNB</option>
                                <option value="Doge">Doge</option>
                                <option value="USDT">USDT</option>
                                <option value="Dash">Dash</option>
                                <option value="Tron">Tron</option>
                                <option value="XRP">XRP</option>
                                <option value="EOS">EOS</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <h5 class="text-dark">Select credit to add, debit to subtract.</h5>
                            <select class="form-control bg-light text-dark" name="t_type" required>
                                <option value="">Select type</option>
                                <option value="Credit">Credit</option>
                                <option value="Debit">Debit</option>
                            </select>
                            <small> <b>NOTE:</b> You cannot debit deposit</small>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="user_id" value="151">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /deposit for a plan Modal -->












    <!-- send a single user email Modal-->
    <div id="sendmailtooneuserModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title text-dark">Send Email</h4>
                    <button type="button" class="close text-dark" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body bg-light">
                    <p class="text-dark">This message will be sent to {{$user->name}}</p>
                    <form style="padding:3px;" role="form" method="post" action="{{ route('admin.send.mail')}}">

                        @csrf
                        <input type="hidden" name="email" value="{{$user->email}}">
                        <div class=" form-group">
                            <input type="text" name="subject" class="form-control bg-light text-dark"
                                placeholder="Subject" required>
                        </div>
                        <div class=" form-group">
                            <textarea placeholder="Type your message here" class="form-control bg-light text-dark"
                                name="message" row="8" placeholder="Type your message here" required></textarea>
                        </div>
                        <div class=" form-group">

                            <input type="submit" class="btn btn-primary" value="Send">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Trading History Modal -->

    <div id="TradingModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title text-dark">Add Trading History for {{$user->first_name}} </h4>
                    <button type="button" class="close text-dark" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body bg-light">
                    <form role="form" method="post"
                        action="https://stockmarket-hq.com/account/admin/dashboard/AddHistory">
                        <input type="hidden" name="_token" value="kdEbfxRivvoFCKcDsPzyFFmWfvfFFzdQoWNWGi0E">
                        <div class="form-group">
                            <h5 class=" text-dark">Select Investment Plan</h5>
                            <select class="form-control bg-light text-dark" name="plan">
                                <option value="" selected disabled>Select Plan</option>
                                <option value="GME">GME</option>
                                <option value="Shopify">Shopify</option>
                                <option value="COCA-COLA">COCA-COLA</option>
                                <option value="MCDONALD">MCDONALD</option>
                                <option value="PayPal">PayPal</option>
                                <option value="META">META</option>
                                <option value="Google">Google</option>
                                <option value="Tesla">Tesla</option>
                                <option value="Microsoft">Microsoft</option>
                                <option value="Apple">Apple</option>
                                <option value="NETFLIX">NETFLIX</option>
                                <option value="AMAZON">AMAZON</option>
                                <option value="Jeff Paulson">Jeff Paulson</option>
                                <option value="Zack Whitney">Zack Whitney</option>
                                <option value="Nathaniel Forman">Nathaniel Forman</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <h5 class=" text-dark">Amount</h5>
                            <input type="number" name="amount" class="form-control bg-light text-dark">
                        </div>
                        <div class="form-group">
                            <h5 class=" text-dark">Type</h5>
                            <select class="form-control bg-light text-dark" name="type">
                                <option value="" selected disabled>Select type</option>
                                <option value="Bonus">Bonus</option>
                                <option value="ROI">ROI</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Add History">
                            <input type="hidden" name="user_id" value="151">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /send a single user email Modal -->

    <!-- Edit user Modal -->
    <div id="edituser" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title text-dark">Edit {{$user->name}} details.</strong>
                    </h4>
                    <button type="button" class="close text-dark" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body bg-light">
                    <form role="form" method="post" action="">
                        {{ csrf_field()}}
                        <div class="form-group">
                            <h5 class=" text-dark">Username</h5>
                            <input class="form-control bg-light text-dark" id="input1" value="{{$user->first_name}}"
                                type="text" name="username" required>
                            <small>Note: same username should be use in the referral link.</small>
                        </div>
                        <div class="form-group">
                            <h5 class=" text-dark">Fullname</h5>
                            <input class="form-control bg-light text-dark" value="{{$user->last_name}}" type="text"
                                name="name" required>
                        </div>
                        <div class="form-group">
                            <h5 class=" text-dark">Email</h5>
                            <input class="form-control bg-light text-dark" value="{{$user->email}}" type="text"
                                name="email" required>
                        </div>
                        <div class="form-group">
                            <h5 class=" text-dark">Phone Number</h5>
                            <input class="form-control bg-light text-dark" value="{{$user->phone}}" type="text"
                                name="phone" required>
                        </div>
                        <div class="form-group">
                            <h5 class=" text-dark">Country</h5>
                            <input class="form-control bg-light text-dark" value="{{$user->country}}" type="text"
                                name="country">
                        </div>
                        <div class="form-group">
                            <h5 class=" text-dark">Referral link</h5>
                            <input class="form-control bg-light text-dark"
                                value="https://stockmarket-hq.com/account/ref/eddyblues13" type="text" name="ref_link"
                                required>
                        </div>
                        <div class="form-group">

                            <input type="submit" class="btn btn-primary" value="Update">
                        </div>
                    </form>
                </div>
                <script>
                    $('#input1').on('keypress', function(e) {
                        return e.which !== 32;
                    });
                </script>
            </div>
        </div>
    </div>
    <!-- /Edit user Modal -->

<!-- Reset user password Modal -->
<div id="resetpswdModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <form action="{{ route('reset.password', $user->id) }}" method="POST">
                @csrf
                <div class="modal-header bg-light">
                    <h4 class="modal-title text-dark">Reset Password</h4>
                    <button type="button" class="close text-dark" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body bg-light">
                    <div class="form-group">
                        <label for="password" class="text-dark">New Password for <strong class="text-primary">{{ $user->first_name }}</strong></label>
                        <input type="password" name="password" id="password" class="form-control" required placeholder="Enter new password">
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="submit" class="btn btn-primary">Reset Now</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Reset user password Modal -->


    <!-- Switch useraccount Modal -->
    <div id="switchuserModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title text-dark">You are about to login as {{$user->first_name}}.</strong></h4>
                    <button type="button" class="close text-dark" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body bg-light">
                    <a class="btn btn-success" href="{{ route('users.impersonate', $user->id) }}">Proceed</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Switch user account Modal -->

    <!-- Clear account Modal -->
    <div id="clearacctModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title text-dark">Clear Account</strong></h4>
                    <button type="button" class="close text-dark" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body bg-light">
                    <p class="text-dark">You are clearing account for {{$user->first_name}} to $0.00</p>
                    <a class="btn btn-primary" href="{{route('clear.account',$user->id)}}">Proceed</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Clear account Modal -->

    <!-- Delete user Modal -->
    <div id="deleteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-light">

                    <h4 class="modal-title text-dark">Delete User</strong></h4>
                    <button type="button" class="close text-dark" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body bg-light p-3">
                    <p class="text-dark">Are you sure you want to delete {{$user->first_name}} Account? Everything
                        associated
                        with this account will be loss.</p>
                    <a class="btn btn-danger" href="{{ route('delete.user', $user->id) }}">Yes i'm sure</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete user Modal -->

    @include('admin.footer')