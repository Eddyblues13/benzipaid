@include('admin.header')
<div class="main-panel bg-light">
    <div class="content bg-light">
        <div class="page-inner">
            @if(session('message'))
            <div class="alert alert-success mb-2">{{session('message')}}</div>
            @endif
            <div class="mt-2 mb-4">
                <h1 class="title1 d-inline text-dark">Update Payment method</h1>
                <div class="d-inline">
                    <div class="float-right btn-group">
                        <a class="btn btn-primary btn-sm" href="{{route('payment.settings')}}"> <i
                                class="fa fa-arrow-left"></i> back</a>
                    </div>
                </div>
            </div>
            <div>
            </div>
            <div>
            </div>
            <div class="mb-5 row">
                <div class="col-md-8 offset-md-2">
                    <form method="POST" action="{{route('update.payment',$payment->id)}}" enctype="multipart/form-data">
                        {{ csrf_field()}}
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <h6 class="text-dark">Name</h6>
                                <input type="text" class="form-control bg-light text-dark" name="name"
                                    placeholder="Payment method name" value="{{$payment->name}}" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <h6 class="text-dark">Minimum Amount</h6>
                                <input type="number" value="{{$payment->min_amount}}"
                                    class="form-control bg-light text-dark" name="min_amount" id="minamount" required>
                                <small class="text-dark">Required but only applies to withdrawal</small>
                            </div>
                            <div class="form-group col-md-6">
                                <h6 class="text-dark">Maximum Amount</h6>
                                <input type="number" value="{{$payment->max_amount}}"
                                    class="form-control bg-light text-dark" name="max_amount" id="maxamount" required>
                                <small class="text-dark">Required but only applies to withdrawal</small>
                            </div>
                            <div class="form-group col-md-6">
                                <h6 class="text-dark">Charges</h6>
                                <input type="number" value="{{$payment->charges}}"
                                    class="form-control bg-light text-dark" name="charges" id="charges" required>
                                <small class="text-dark">Required but only applies to withdrawal</small>
                            </div>
                            <div class="form-group col-md-6">
                                <h6 class="text-dark">Charges Type</h6>
                                <select name="charge_type" class="form-control bg-light text-dark" required>
                                    <option value="{{$payment->charge_type}}">{{$payment->charge}}</option>
                                    <option value="percentage">Percentage(%)</option>
                                    <option value="fixed">Fixed($)</option>
                                </select>
                                <small class="text-dark">Required but only applies to withdrawal</small>
                            </div>
                            <div class="form-group col-md-6">
                                <h6 class="text-dark">Type</h6>
                                <select name="type" id="methodtype" class="form-control bg-light text-dark" required>
                                    <option value="{{$payment->type}}">{{$payment->type}}</option>
                                    <option value="currency">Currency</option>
                                    <option value="crypto">Crypto</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <h6 class="text-dark">Image url</h6>
                                <input type="text" value="" class="form-control bg-light text-dark" name="url" id="url">
                            </div>

                            <div class="form-group col-md-6 currency">
                                <h6 class="text-dark">Bank Name</h6>
                                <input type="text" value="{{$payment->bank_name}}"
                                    class="form-control bg-light text-dark currinput" name="bank" id="bank">
                            </div>
                            <div class="form-group col-md-6 currency">
                                <h6 class="text-dark">Account Name</h6>
                                <input type="text" value="{{$payment->account_name}}"
                                    class="form-control bg-light text-dark currinput" name="account_name"
                                    id="acnt_name">
                            </div>
                            <div class="form-group col-md-6 currency">
                                <h6 class="text-dark">Account Number</h6>
                                <input type="number" value="{{$payment->account_number}}"
                                    class="form-control bg-light text-dark currinput" name="account_number"
                                    id="acnt_number">
                            </div>
                            <div class="form-group col-md-6 currency">
                                <h6 class="text-dark">Swift/Other Code</h6>
                                <input type="text" value="{{$payment->code}}"
                                    class="form-control bg-light text-dark currinput" name="swift" id="swift">
                            </div>


                            <div class="form-group col-md-6 d-none crypto">
                                <h6 class="text-dark">Wallet Address</h6>
                                <input type="text" value="{{$payment->wallet_address}}"
                                    class="form-control bg-light text-dark cryptoinput" name="wallet_address"
                                    id="walletaddress">
                            </div>
                            <div class="form-group col-md-6 d-none crypto">
                                <h6 class="text-dark">Barcode</h6>
                                <input type="file" name="bar_code" id=""
                                    class="form-control bg-light text-dark cryptoinput">

                            </div>
                            <div class="form-group col-md-6 d-none crypto">
                                <h6 class="text-dark">Wallet Address Network Type</h6>
                                <input type="text" value="{{$payment->type}}"
                                    class="form-control bg-light text-dark cryptoinput" name="wallet_type"
                                    id="wallettype">
                            </div>
                            <div class="form-group col-md-6">
                                <h6 class="text-dark">Status</h6>
                                <select name="status" id="status" class="form-control bg-light text-dark" required>
                                    <option value="{{$payment->status}}" selected>{{$payment->status}}</option>
                                    <option value="enabled">Enable</option>
                                    <option value="disabled">Disable</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <h6 class="text-dark">Type for</h6>
                                <select name="type_for" id="status" class="form-control bg-light text-dark" required>
                                    <option value="{{$payment->type_for}}" selected>{{$payment->type_for}}</option>
                                    <option value="withdrawal">Withdrawal</option>
                                    <option value="deposit">Deposit</option>
                                    <option value="both">Both</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <h6 class="text-dark">Optional Note</h6>
                                <input type="text" value="{{$payment->note}}" class="form-control bg-light text-dark"
                                    name="note" placeholder="Payment may take up to 24 hours">
                            </div>

                            <div class="form-group col-md-12">
                                <button type="submit" class="px-4 btn btn-primary">Save Changes</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        let methodtype = document.getElementById('methodtype');
    let currtype = document.querySelectorAll('.currency');
    let currinput = document.querySelectorAll('.currinput');
    let cryptotype = document.querySelectorAll('.crypto');
    let cryptoinput = document.querySelectorAll('.cryptoinput');
    
    currinput[0].setAttribute('required','');
    currinput[1].setAttribute('required','');
    currinput[2].setAttribute('required','');
    methodtype.addEventListener('change', sortfields);

    if(methodtype.value == 'currency'){
        cryptotype.forEach(element => {
            element.classList.add('d-none');
        });
        currinput[0].setAttribute('required','');
        currinput[1].setAttribute('required','');
        currinput[2].setAttribute('required','');

        cryptoinput[0].removeAttribute('required','');
        cryptoinput[2].removeAttribute('required','');
        
        currtype.forEach(curr => {
            curr.classList.remove('d-none');
        });

    }else{
        cryptoinput[0].setAttribute('required','');
        cryptoinput[2].setAttribute('required','');

        currinput[0].removeAttribute('required','');
        currinput[1].removeAttribute('required','');
        currinput[2].removeAttribute('required','');

        cryptotype.forEach(element => {
            element.classList.remove('d-none');
        });

        currtype.forEach(curr => {
            curr.classList.add('d-none');
        });
    }

    function sortfields() {
        if(methodtype.value == 'currency'){
            cryptotype.forEach(element => {
                element.classList.add('d-none');
            });
            currinput[0].setAttribute('required','');
            currinput[1].setAttribute('required','');
            currinput[2].setAttribute('required','');

            cryptoinput[0].removeAttribute('required','');
            cryptoinput[2].removeAttribute('required','');
            
            currtype.forEach(curr => {
                curr.classList.remove('d-none');
            });

        }else{
            cryptoinput[0].setAttribute('required','');
            cryptoinput[2].setAttribute('required','');

            currinput[0].removeAttribute('required','');
            currinput[1].removeAttribute('required','');
            currinput[2].removeAttribute('required','');

            cryptotype.forEach(element => {
                element.classList.remove('d-none');
            });

            currtype.forEach(curr => {
                curr.classList.add('d-none');
            });
        }
    }
    </script>


    @include('admin.footer')