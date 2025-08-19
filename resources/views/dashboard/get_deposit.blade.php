@include('dashboard.header')
<div class="main-content">

<div class="page-content">
    <div class="container-fluid">
    @if(session('message'))
   <div class="alert alert-success mb-2">{{session('message')}}</div>
    @endif

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-15">Make Deposit  <iconify-icon inline icon='cryptocurrency-color:usdt' class='' width='20px'></iconify-icon> </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                        </ol>
                    </div>
                </div>
            </div>
        </div>          
       
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">    
                        <h4 class="card-title mb-4"></h4>
                        <form method="post" action="{{route('make.deposit')}}" >
											 {{csrf_field()}}
                            <div class="row mb-4">
                                <label for="horizontal-number-input" class="col-sm-3 col-form-label">Amount</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="amount" name="amount" placeholder="Amount" onkeyup="showHint(this.value)" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type = "number" maxlength = "15">
                                     <p id="txtHint"> &nbsp; .</p>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-9">
                                    <div>
                                        <button id="send_pin"  class="btn btn-primary btn-rounded waves-effect waves-light" type="submit">Send</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <p class="response"></p>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
        </div>
    </div>

@include('dashboard.footer')
