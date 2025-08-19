@include('admin.header')
<div class="main-panel bg-light">
    <div class="content bg-light">
        <div class="page-inner">
            @if(session('message'))
            <div class="alert alert-success mb-2">{{ session('message') }}</div>
            @endif

            <div class="mt-2 mb-5">
                <h1 class="title1 d-inline text-dark">Process Withdrawal Request</h1>
                <div class="d-inline">
                    <div class="float-right btn-group">
                        <a class="btn btn-primary btn-sm" href="{{ route('manage.withdrawals.page') }}">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
            </div>

            <div class="mb-5 row">
                <div class="col-lg-8 offset-lg-2 card p-md-4 p-2 bg-light shadow">
                    <div class="mb-3">
                        @if($withdrawal_details->status === "0")
                        <h4 class="text-dark">Send Funds to {{ $withdrawal_details->user->name }} through their payment
                            details below</h4>
                        @elseif($withdrawal_details->status === "1")
                        <h4 class="text-success">Payment Completed</h4>
                        @endif
                    </div>

                    <div class="">
                        @if ($withdrawal_details->withdrawal_method === "Bank Transfer")
                        <div class="mb-3 form-group">
                            <h5 class="text-dark">Bank Name</h5>
                            <input type="text" class="form-control readonly text-dark bg-light"
                                value="{{ $withdrawal_details->user->bank_name }}" readonly>
                        </div>
                        <div class="mb-3 form-group">
                            <h5 class="text-dark">Account Name</h5>
                            <input type="text" class="form-control readonly text-dark bg-light"
                                value="{{ $withdrawal_details->user->account_name }}" readonly>
                        </div>
                        <div class="mb-3 form-group">
                            <h5 class="text-dark">Account Number</h5>
                            <input type="text" class="form-control readonly text-dark bg-light"
                                value="{{ $withdrawal_details->user->account_number }}" readonly>
                        </div>
                        @elseif($withdrawal_details->withdrawal_method === "Bitcoin")
                        <div class="mb-3 form-group">
                            <h5 class="text-dark">Bitcoin Address</h5>
                            <input type="text" class="form-control readonly text-dark bg-light"
                                value="{{ $withdrawal_details->user->btc_address }}" readonly>
                        </div>
                        @elseif($withdrawal_details->withdrawal_method === "Ethereum")
                        <div class="mb-3 form-group">
                            <h5 class="text-dark">Ethereum Address</h5>
                            <input type="text" class="form-control readonly text-dark bg-light"
                                value="{{ $withdrawal_details->user->eth_address }}" readonly>
                        </div>
                        @elseif($withdrawal_details->withdrawal_method === "USDT Coin")
                        <div class="mb-3 form-group">
                            <h5 class="text-dark">USDT Address</h5>
                            <input type="text" class="form-control readonly text-dark bg-light"
                                value="{{ $withdrawal_details->user->usdt_address }}" readonly>
                        </div>
                        @endif
                    </div>

                    <div class="mt-1">
                        <form action="{{ url('approve-withdrawal/'.$withdrawal_details->id) }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <h6 class="text-dark">Action</h6>
                                    <select name="status" id="action" class="bg-light text-dark mb-2 form-control">
                                        <option value="1">Paid</option>
                                        <option value="0">Reject</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row d-none" id="emailcheck">
                                <div class="col-md-12 form-group">
                                    <div class="selectgroup">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="emailsend" id="dontsend" value="false"
                                                class="selectgroup-input" checked>
                                            <span class="selectgroup-button">Don't Send Email</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="emailsend" id="sendemail" value="true"
                                                class="selectgroup-input">
                                            <span class="selectgroup-button">Send Email</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row d-none" id="emailtext">
                                <div class="form-group col-md-12">
                                    <h6 class="text-dark">Subject</h6>
                                    <input type="text" name="subject" id="subject"
                                        class="bg-light text-dark form-control">
                                </div>
                                <div class="form-group col-md-12">
                                    <h6 class="text-dark">Enter Reasons for rejecting this withdrawal request</h6>
                                    <textarea class="bg-light text-dark form-control" rows="3"
                                        placeholder="Type in here" name="reason" id="message"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="email" value="{{ $withdrawal_details->user->email }}">
                                <input type="hidden" name="amount" value="{{ $withdrawal_details->amount }}">
                                @if($withdrawal_details->status === "0")
                                <input type="submit" class="px-3 btn btn-primary" value="Process">
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let action = document.getElementById('action');
        $('#action').change(function(){
            if (action.value === "Reject") {
                document.getElementById('emailcheck').classList.remove('d-none');
            } else {
                document.getElementById('emailcheck').classList.add('d-none');
                document.getElementById('emailtext').classList.add('d-none');
                document.getElementById('dontsend').checked = true;
                document.getElementById('subject').removeAttribute('required');
                document.getElementById('message').removeAttribute('required');
            }
        });

        $('#sendemail').click(function(){
            document.getElementById('emailtext').classList.remove('d-none');
            document.getElementById('subject').setAttribute('required', '');
            document.getElementById('message').setAttribute('required', '');
        });

        $('#dontsend').click(function(){
            document.getElementById('emailtext').classList.add('d-none');
            document.getElementById('subject').removeAttribute('required');
            document.getElementById('message').removeAttribute('required');
        });
    </script>

    @include('admin.footer')