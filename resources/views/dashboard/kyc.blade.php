@include('dashboard.header')

<!-- Sidebar end -->

<!-- Content body start -->
<div class="content-body">
                    <script>
                    @if(Auth::user()->kyc_status == '1')
                    toastr.options = {
                        "closeButton": true,
                        "progressBar": true
                    }
                    toastr.success("Kyc status verified");
                    @else
                    toastr.options = {
                        "closeButton": true,
                        "progressBar": true
                    }
                    toastr.warning("kyc not verified, please verify your kyc documents");
                    @endif
                </script>
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
        
        <!-- Upload KYC Section -->
        <div class="card mb-4">
            <div class="card-body">
                <h4 class="text-black font-w600">Upload KYC Documents</h4>
                <p>Please upload the required documents to complete your KYC verification. Make sure the documents are clear and readable.</p>

                <!-- KYC Upload Form -->
                <form action="{{ route('upload.kyc') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Full Name -->
                    <div class="mb-3">
                        <label for="full_name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" value="{{Auth::user()->first_name}} {{Auth::user()->last_name}}" placeholder="{{Auth::user()->first_name}} {{Auth::user()->last_name}}" required>
                    </div>

                    <!-- Upload ID Document -->
                    <div class="mb-3">
                        <label for="id_document" class="form-label">Upload ID Document</label>
                        <input class="form-control" type="file" id="id_document" name="id_document" accept="image/*,application/pdf" required>
                        <div class="form-text">Upload a clear image or PDF of your ID document (e.g., passport, driver's license).</div>
                    </div>

                    <!-- Upload Proof of Address -->
                    <div class="mb-3">
                        <label for="proof_address" class="form-label">Upload Proof of Address</label>
                        <input class="form-control" type="file" id="proof_address" name="proof_address" accept="image/*,application/pdf" required>
                        <div class="form-text">Upload a clear image or PDF of your proof of address (e.g., utility bill, bank statement).</div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Upload KYC Documents</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Content body end -->



@include('dashboard.footer')
