@include('admin.header')

<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            <div class="mt-2 mb-4">
                <h1 class="title1 text-dark">Add New Investment Plan</h1>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="{{ route('plans.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="text-dark">Plan Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Plan Name" required>
                        </div>
                        <div class="form-group">
                            <label for="min_deposit" class="text-dark">Minimum Deposit</label>
                            <input type="number" name="min_deposit" class="form-control"
                                placeholder="Enter Minimum Deposit" required>
                        </div>
                        <div class="form-group">
                            <label for="max_deposit" class="text-dark">Maximum Deposit</label>
                            <input type="number" name="max_deposit" class="form-control"
                                placeholder="Enter Maximum Deposit" required>
                        </div>
                        <div class="form-group">
                            <label for="percentage" class="text-dark">Percentage</label>
                            <input type="number" step="0.01" name="percentage" class="form-control"
                                placeholder="Enter Percentage (%)" required>
                        </div>
                        <div class="form-group">
                            <label for="duration" class="text-dark">Duration</label>
                            <input type="text" name="duration" class="form-control"
                                placeholder="Enter Duration (e.g. 30 days)" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Plan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')