@include('admin.header')
<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            @if(session('success'))
            <div class="alert alert-success mb-2">{{ session('success') }}</div>
            @endif
            <div class="mt-2 mb-4">
                <h1 class="title1 text-dark">Manage Transactions</h1>
            </div>
            <div>
            </div>
            <div>
            </div>
            <div class="mb-5 row">
                <div class="col-12">
                    <small class="text-dark">If you can't see some details, ensure the transaction data is correctly
                        filled.</small>
                </div>
                <div class="col-12 card shadow p-4 bg-light">
                    <div class="table-responsive" data-example-id="hoverable-table">
                        <table id="TransactionTable" class="table table-hover text-dark">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Client Name</th>
                                    <th>Client Email</th>

                                    <th>Transaction Reference</th>
                                    <th>Transaction Type</th>

                                    <th>Amount</th>

                                    <th>Status</th>
                                    <th>Date Created</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transactions as $transaction)
                                <tr>
                                    <th scope="row">{{ $transaction->id }}</th>
                                    <td>{{ $transaction->first_name }} {{ $transaction->last_name }}</td>
                                    <!-- Assuming relationship exists -->
                                    <td>{{ $transaction->email }}</td>

                                    <td>{{ $transaction->transaction_ref }}</td>
                                    <td>{{ $transaction->transaction_type }}</td>

                                    <td>${{ number_format($transaction->transaction_amount, 2, '.', ',') }}</td>

                                    <td>
                                        @if($transaction->transaction_status == 0)
                                        <span class="badge badge-danger">Pending</span>
                                        @elseif($transaction->transaction_status == 1)
                                        <span class="badge badge-success">Processed</span>
                                        @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($transaction->created_at)->format('D, M j, Y g:i A') }}
                                    </td>
                                    <td>

                                        <a href="{{ route('delete.transaction', $transaction->id) }}"
                                            class="btn btn-danger btn-sm m-1">Delete</a>
                                        @if($transaction->transaction_status == 0)
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('approve.transaction', $transaction->id) }}">Process</a>
                                        @endif
                                        <!-- Approve Button -->

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.footer')