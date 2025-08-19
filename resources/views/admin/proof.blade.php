@include('admin.header')

<div class="main-panel bg-light">
    <div class="content bg-light">
        <div class="page-inner">
            <div class="mt-2 mb-5">
                <h1 class="title1 d-inline text-dark">View Deposit Screenshot</h1>
                <div class="d-inline">
                    <div class="float-right btn-group">
                        <a class="btn btn-primary btn-sm" href="{{url('manage-deposit')}}"> <i
                                class="fa fa-arrow-left"></i> back</a>
                    </div>
                </div>
            </div>
            <div>
            </div>
            <div>
            </div>
            <div class="mb-5 row">
                <div class="col-lg-8 offset-lg-2 card p-4 bg-light shadow">
                    <img src="{{asset('user/uploads/deposits/'.$proof->proof)}}" alt="Proof of Payment"
                        class="img-fluid" />
                </div>
            </div>
        </div>
    </div>


    @include('admin.footer')