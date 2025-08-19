@include('dashboard.header')

<div class="content-body">
    <div class="container-fluid">
        <h2>VAT CODE</h2>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Balance: {{ Auth::user()->currency }}{{ number_format($balance, 2, '.', ',') }}
                </h4>
            </div>
            <div class="card-body">
                <div class="alert alert-warning">Enter a valid VAT CODE for this transaction.</div>

                <!-- Hidden input fields for session data -->


                <!-- Input field for VAT CODE -->
                <div class="form-group">
                    <input type="number" id="vatCode" name="vatCode" class="form-control form-control-lg" required>
                </div>

                <div id="loadingOtp" style="display:none;">Loading...</div>
                <button id="proceedToOtp" class="btn btn-primary w-100">Proceed</button>
            </div>
        </div>
    </div>
</div>

@include('dashboard.footer')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const proceedToOtp = document.getElementById('proceedToOtp');
        
        proceedToOtp.addEventListener('click', function () {
            const vatCode = document.getElementById('vatCode').value;
            document.getElementById('loadingOtp').style.display = 'block';

            fetch("{{ route('validate.vatCode') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                body: JSON.stringify({ 
                    vatCode: vatCode,
                   
                })
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('loadingOtp').style.display = 'none';
                if (data.success) {
                    window.location.href = "{{ route('loading') }}"; // Redirect to loading page
                } else {
                    toastr.error(data.message);
                }
            })
            .catch(error => {
                document.getElementById('loadingOtp').style.display = 'none';
                toastr.error('An error occurred while validating the VAT CODE.');
            });
        });
    });
</script>