@include('admin.header')

<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            <div class="mt-2 mb-4">
                <h1 class="title1 text-dark">Edit Plan</h1>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="{{ route('plans.update', $plan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name" class="text-dark">Plan Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $plan->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="min_deposit" class="text-dark">Minimum Deposit</label>
                            <input type="number" name="min_deposit" class="form-control"
                                value="{{ $plan->min_deposit }}" required>
                        </div>
                        <div class="form-group">
                            <label for="max_deposit" class="text-dark">Maximum Deposit</label>
                            <input type="number" name="max_deposit" class="form-control"
                                value="{{ $plan->max_deposit }}" required>
                        </div>
                        <div class="form-group">
                            <label for="percentage" class="text-dark">Percentage</label>
                            <input type="number" step="0.01" name="percentage" class="form-control"
                                value="{{ $plan->percentage }}" required>
                        </div>
                        <div class="form-group">
                            <label for="duration" class="text-dark">Duration</label>
                            <input type="text" name="duration" class="form-control" value="{{ $plan->duration }}"
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Plan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')