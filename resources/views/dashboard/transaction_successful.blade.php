{{--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Receipt</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <style>
        .text-danger strong {
            color: #9f181c;
        }

        .receipt-main {
            background: #ffffff;
            border-bottom: 12px solid #333333;
            border-top: 12px solid #9f181c;
            margin-top: 50px;
            margin-bottom: 50px;
            padding: 40px 30px !important;
            position: relative;
            box-shadow: 0 1px 21px #acacac;
            color: #333333;
            font-family: 'Open Sans', sans-serif;
        }

        .receipt-main p {
            color: #333333;
            line-height: 1.42857;
        }

        .receipt-footer h1 {
            font-size: 15px;
            font-weight: 400 !important;
            margin: 0 !important;
        }

        .receipt-main::after {
            background: #414143;
            content: "";
            height: 5px;
            left: 0;
            position: absolute;
            right: 0;
            top: -13px;
        }

        .receipt-main thead {
            background: #414143;
            color: #fff;
        }

        .receipt-right h5 {
            font-size: 16px;
            font-weight: bold;
            margin: 0 0 7px 0;
        }

        .receipt-right p {
            font-size: 12px;
            margin: 0;
        }

        .receipt-main td,
        .receipt-main th {
            padding: 9px 20px;
            font-size: 13px;
        }

        .receipt-main td h2 {
            font-size: 20px;
            font-weight: 900;
            text-transform: uppercase;
        }

        .receipt-header-mid {
            margin: 24px 0;
        }

        #container {
            background-color: #dcdcdc;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="receipt-main col-md-6 col-md-offset-3">
                <div class="row">
                    <div class="receipt-header">
                        <div class="col-xs-6">
                            <div class="receipt-left">
                                <img class="img-responsive" alt="Company Logo" src="{{ asset('asset/img/logo.png') }}"
                                    style="width: 71px; border-radius: 43px;">
                            </div>
                        </div>
                        <div class="col-xs-6 text-right">
                            <div class="receipt-right">
                                <h5>Federal Global Truist Finance</h5>
                                <h4 class="text-success">Transaction Successful</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="receipt-header receipt-header-mid">
                        <div class="col-md-8 text-left">
                            <div class="receipt-right">
                                <h5>BENEFICIARY DETAILS</h5>
                                @if($transaction_data['transaction_type'] == 'bank')
                                <p><b>Account Number:</b> {{ $transaction_data['account_number'] }}</p>
                                <p><b>Account Name:</b> {{ $transaction_data['account_name'] }}</p>
                                <p><b>Bank Name:</b> {{ $transaction_data['bank_name'] }}</p>
                                <p><b>Routing/IBAN:</b> {{ $transaction_data['routing_number'] }}</p>
                                <p><b>Address:</b> Australia</p>
                                @elseif($transaction_data['transaction_type'] == 'paypal' ||
                                $transaction_data['transaction_type'] == 'skrill')
                                <p><b>Amount:</b> {{ Auth::user()->currency }} {{
                                    number_format($transaction_data['amount'], 2) }}</p>
                                <p><b>Email:</b> {{ $transaction_data['email'] }}</p>
                                @elseif($transaction_data['transaction_type'] == 'crypto')
                                <p><b>Wallet Type:</b> {{ $transaction_data['wallet_type'] }}</p>
                                <p><b>Wallet Address:</b> {{ $transaction_data['wallet_address'] }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>YOUR TRANSFER WAS SUCCESSFUL</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Transaction Reference:</td>
                                <td>{{ $transaction_data['transaction_id'] }}</td>
                            </tr>
                            <tr>
                                <td>Date:</td>
                                <td><span id="currentDate"></span></td>
                            </tr>
                            <tr>
                                <td>Amount Debited:</td>
                                <td>{{ Auth::user()->currency }} {{
                                    number_format($transaction_data['transaction_amount'], 2) }}</td>
                            </tr>
                            <tr>
                                <td>Handling & Charges:</td>
                                <td>{{ Auth::user()->currency }} 0</td>
                            </tr>
                            <tr>
                                <td class="text-right">
                                    <h2><strong>AVAILABLE BALANCE: </strong></h2>
                                </td>
                                <td class="text-left text-success">
                                    <h2><strong>{{ Auth::user()->currency }} {{ number_format($balance, 2) }}</strong>
                                    </h2>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="receipt-footer">
                        <div class="col-xs-8 text-left">
                            <button class="btn btn-primary" onclick="saveReceipt()">Save Receipt</button>
                        </div>
                        <div class="col-xs-4">
                            <a class="btn btn-success" href="{{ route('dashboard') }}">Home</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        function saveReceipt() {
			window.print();
		}

		function displayTodayDate() {
			const today = new Date();
			const day = String(today.getDate()).padStart(2, '0');
			const month = String(today.getMonth() + 1).padStart(2, '0');
			const year = today.getFullYear();
			const formattedDate = `${month}/${day}/${year}`;
			document.getElementById('currentDate').textContent = formattedDate;
		}

		document.addEventListener('DOMContentLoaded', displayTodayDate);
    </script>

</body>

</html> --}}


@include('dashboard.header')

<div class="content-body">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header bg-success text-white text-center">
                        <h4 class="card-title">Transaction Successful</h4>
                    </div>
                    <div class="card-body text-center">
                        <h5>Thank you, {{ Auth::user()->name }}!</h5>
                        <p>Your transaction has been processed successfully.</p>
                        {{-- <div class="my-4">
                            <h6>Transaction Details:</h6>
                            <p><strong>Amount:</strong> {{ Auth::user()->currency }}{{
                                number_format($transaction->transaction_amount, 2, '.', ',') }}</p>
                            <p><strong>Transaction ID:</strong> {{ $transaction->transaction_id }}</p>
                            <p><strong>Reference:</strong> {{ $transaction->transaction_ref }}</p>
                            <p><strong>Description:</strong> {{ $transaction->transaction_description }}</p>
                        </div>
                        <div class="alert alert-info">
                            A confirmation email has been sent to your registered email address.
                        </div> --}}
                        <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Back to Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('dashboard.footer')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        toastr.success('Transaction completed successfully!');
    });
</script>