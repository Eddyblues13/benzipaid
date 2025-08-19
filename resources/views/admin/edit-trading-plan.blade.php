@include('admin.header')

<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            @if(session('message'))
            <div class="alert alert-success mb-2">{{ session('message') }}</div>
            @endif
            <div class="mt-2 mb-4">
                <h1 class="title1 text-dark">Edit Trading Plan</h1>
            </div>
            <div class="mb-5 row">
                <div class="col-lg-12">
                    <div class="p-3 card bg-light">
                        <form action="{{ route('admin.update-trading-plan', $tradingPlan->id) }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Plan Name</h5>
                                    <input class="form-control text-dark bg-light" value="{{ $tradingPlan->name }}"
                                        type="text" name="name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Minimum Amount ($)</h5>
                                    <input class="form-control text-dark bg-light"
                                        value="{{ $tradingPlan->min_amount }}" type="number" name="min_amount" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Maximum Amount ($)</h5>
                                    <input class="form-control text-dark bg-light"
                                        value="{{ $tradingPlan->max_amount }}" type="number" name="max_amount" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5 class="text-dark">Investment Duration</h5>
                                    <input class="form-control text-dark bg-light" value="{{ $tradingPlan->duration }}"
                                        type="text" name="duration" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="submit" class="btn btn-primary" value="Update Plan">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')