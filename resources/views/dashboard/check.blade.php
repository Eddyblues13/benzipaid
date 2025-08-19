@include('dashboard.header')

<!-- Sidebar end -->

<!-- Content body start -->
<div class="content-body">
            @if (session('error'))
        <div class="alert alert-danger" role="alert">
				<b>Error!</b>{{ session('error') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert"
																aria-label="Close"></button>
	   </div>
        @elseif (session('status'))
		<div class="alert alert-success" role="alert">
		<b>Success!</b> {{ session('status') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
        @endif
    <div class="container-fluid">
        
        <!-- Upload Check Section -->
        <div class="card mb-4">
            <div class="card-body">
                <h4 class="text-black font-w600">Upload a Check</h4>
                <p>Please provide the necessary details below to upload your check. Ensure both the front and back sides of the check are clear and readable.</p>

                <!-- Check Upload Form -->
                <form action="{{ route('upload.check') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="form-group mb-3">
                                <label>Amount</label>
                                                    <input id="pin_amount" type="number" name="amount" class="form-control" placeholder="Enter Amount" required>
                                                </div>
                    <!-- Write-up Section -->
                    <div class="mb-3">
                        <label for="check_description" class="form-label">Check Description</label>
                        <textarea class="form-control" id="check_description" name="check_description" rows="3" placeholder="Provide a brief description or any important information about this check..." required></textarea>
                    </div>

                    <!-- Front Side of the Check -->
                    <div class="mb-3">
                        <label for="check_front" class="form-label">Upload Front Side</label>
                        <input class="form-control" type="file" id="check_front" name="check_front" accept="image/*" required>
                        <div class="form-text">Upload a clear image of the front side of the check.</div>
                    </div>

                    <!-- Back Side of the Check -->
                    <div class="mb-3">
                        <label for="check_back" class="form-label">Upload Back Side</label>
                        <input class="form-control" type="file" id="check_back" name="check_back" accept="image/*" required>
                        <div class="form-text">Upload a clear image of the back side of the check.</div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Upload Check</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Content body end -->



@include('dashboard.footer')
