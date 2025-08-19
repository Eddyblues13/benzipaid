@include('dashboard.header')

<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    @if (session('error'))
    <div class="alert alert-danger" role="alert">
        <b>Error!</b>{{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif (session('status'))
    <div class="alert alert-success" role="alert">
        <b>Success!</b> {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="container-fluid">
        <h2 class="text-black font-w600 mb-0 me-auto mb-2 pe-3">Visual Card</h2>

        <div class="row">
            <div class="col-xl-4">
                <div class="row">
                    <!-- Additional content can be added here -->
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Specifically Designed for Online Transactions</h4>
                    </div>
                    <div class="card-body">
                        @forelse($details as $details)
                        <div class="card">
                            <div class="container mt-4 d-flex justify-content-center main">
                                <div class="card">
                                    <div class="px-3 pt-3">
                                        <label for="card number" class="d-flex justify-content-between">
                                            <span class="labeltxt">CARD NUMBER</span>
                                            <img decoding="async" src="img/icon.png" width="25" class="image">
                                        </label>
                                        <input type="text" name="number" class="form-control inputtxt"
                                            placeholder="{{implode(' ', str_split($details->card_number, 4))}}"
                                            readonly>
                                    </div>
                                    <div class="d-flex justify-content-between px-3 pt-4">
                                        <div>
                                            <label for="date" class="exptxt">Expiry</label>
                                            <input type="text" name="number"
                                                value="{{\Carbon\Carbon::parse($details->card_expiry)->format('m/d')}}"
                                                class="form-control expiry"
                                                placeholder="{{\Carbon\Carbon::parse($details->card_expiry)->format('m/y')}}"
                                                readonly>
                                        </div>
                                        <div>
                                            <label for="cvv" class="cvvtxt">CVV /CVC</label>
                                            <input type="text" name="number" class="form-control cvv"
                                                placeholder="{{$details->card_cvc}}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <!-- Card start -->
                        <div class="card">
                            <div class="card-body">
                                <i class="bi bi-plus-square"></i>
                                <p>The Imperial Premium Virtual {{Auth::user()->id}} Card is a digital payment card
                                    designed to facilitate frequent online shoppers with a secure and flexible
                                    alternative to physical payment cards. The virtual card is instantly issued upon
                                    request.</p>
                                <div class="btn-group align-items-center">
                                    <a href="{{route('request.card', Auth::user()->id)}}" class="btn btn-success active"
                                        aria-current="page">Request for</a>
                                    <a href="{{route('request.card', Auth::user()->id)}}" class="btn btn-success">a
                                        New</a>
                                    <a href="{{route('request.card', Auth::user()->id)}}"
                                        class="btn btn-success">Virtual Card</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card end -->
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
    Content body end
***********************************-->
@include('dashboard.footer')