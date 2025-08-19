@include('dashboard.header')
<!-- Left Sidebar End -->
<link href="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css" />
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-15">Reset Password <i class="bx bx-transfer">
                            </i> </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="col-lg-12">
            <div class="card" style="border-top-left-radius:20px; border-top-right-radius: 20px;">
                <div class="card-body" style="border-radius-right: 100px;">
                    <h4 class="card-title mb-4">Re-set (Login Password)</h4>
                    <p class="password_change"></p>
                    <form id="password_change" action="{{ route('update-password') }}" method="POST">
                        @csrf
                        <div class="row">
                            @if (session('status'))
                            <div class="alert alert-success text-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @elseif (session('error'))
                            <div class="alert alert-danger text-danger" role="alert">
                                {{ session('error') }}
                            </div>
                            @endif
                            <div class="col-md-6">
                                <div class="form-floating mb-4">
                                    <input type="password" class="form-control" id="old_password" name="old_password">
                                    <label for="floatingemailInput">OLD PASSWORD</label>
                                    @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control pw2" id="new_password" name="new_password">
                            <label for="floatingnameInput">New PASSWORD</label>
                            @error('new_password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control pw3" id="new_password2"
                                name="new_password_confirmation">
                            <label for="floatingnameInput">RE-TYPE NEW PASSWORD</label>
                        </div>

                        <div>
                            <button type="submit" id="otp" onclick='send(this)'
                                class="btn btn-primary w-md">SAVE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script>
        function send(id){
id.innerHTML = "Please wait..<div class='spinner-border spinner-border-sm' role='status'><span class='sr-only'>Loading...</span></div>";
setTimeout(function(){
id.innerHTML = "SAVE";
}, 2000);
}

function otp(id){
id.innerHTML = "Please wait..<div class='spinner-border spinner-border-sm' role='status'><span class='sr-only'>Loading...</span></div>";
setTimeout(function(){
id.innerHTML = "Send<i class='bx bx-mail-send'></i>";
}, 3000);
}
    </script>

    <script src="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <div class="position-fixed top-0 end-0 p-2" style="z-index: 1005">
        <div id="ErrorToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="https://Linit Wavetb.com/swift.png" alt="" class="me-2" height="18">
                <strong class="me-auto">Error</strong>
                <small>Now..</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body" style="background-color:red;">

            </div>
        </div>
    </div>


    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function(){
$('#reset_otp').on('submit', function(e){
    e.preventDefault();

    var otp_code = $('#otp_code').val();
    var pin_one = $('#pin_one').val();
    var pin_two = $('#pin_two').val();
    
    if(otp_code=="" ||  pin_one=="" ||  pin_two==""){
       $(".toast-body").html('All field required');
       $("#ErrorToast").toast("show");
       return false;
    }

    
    if(pin_one.length < 4 || pin_two.length < 4){
     $(".toast-body").html('Enter a four(4) digit Transaction Pin !');
     $("#ErrorToast").toast("show");
     $("#pin_one, #pin_two").val('');
       return false;
    }

    if(pin_one!=pin_two){
     $(".toast-body").html('Pin mismatched !');
     $("#ErrorToast").toast("show");
     $("#pin_two").val('');
       return false;
    }
    
     $.ajax({ 
        type: "POST",
        url: 'process/reset_pin.php',
        //data:{otp_code:otp_code, pin_one:pin_one, pin_two:pin_two},
        data: $('form').serialize(),
        dataType:"json",
        success: function(data){
           $(".response").html(data.content);
           if(data.content=='successful'){
              $(".response").html(data.content);
             }else
           if(data.content=='Error'){
              $(".response").html(data.content);
            }
        },
        error: function(data, errorThrown){
        Swal.fire('The Internet?','Check network connection!','question');
       }
    });
    
});
});


$('#otp').click(function() {
$.ajax({
type: 'POST',
url: 'process/otp.php',
dataType:'json',
success: function(data){
$('.response_otp').html(data.content);
if(data.content=='Successful'){
  swal('Deleted', 'Deleted Successfully', 'error',{closeOnClickOutside: false,});
 }else
if(data.content=='Error'){
 $('.response_otp').html(data.content);
}
},
error: function(data, errorThrown){
Swal.fire('The Internet?','Check network connection!','question');
return false;
}
});
});


$(document).ready(function(){
$('#password_change').on('submit', function(e){
    e.preventDefault();

    var old_password = $('#old_password').val();
    var new_password = $('#new_password').val();
    var new_password2 = $('#new_password2').val();
    
    if(old_password=="" ||  new_password=="" ||  new_password2==""){
       $(".toast-body").html('All field required');
       $("#ErrorToast").toast("show");
       return false;
    }

    
    if(new_password.length < 5 || new_password2.length < 5){
     $(".toast-body").html('Enter A Stronger Password !');
     $("#ErrorToast").toast("show");
     $("#pin_one, #pin_two").val('');
       return false;
    }

    if(new_password!=new_password2){
     $(".toast-body").html('Password mismatched Check And Try Again!');
     $("#ErrorToast").toast("show");
     $("#pin_two").val('');
       return false;
    }
    
     $.ajax({ 
        type: "POST",
        url: 'process/reset_password.php',
        data: $('form').serialize(),
        dataType:"json",
        success: function(data){
           $(".password_change").html(data.content);
           if(data.content=='successful'){
              $(".password_change").html(data.content);
             }else
           if(data.content=='Error'){
              $(".password_change").html(data.content);
            }
        },
        error: function(data, errorThrown){
        Swal.fire('The Internet?','Check network connection!','question');
       }
    });
    
});
});

    </script>
    <style>
        input.pw2 {
            -webkit-text-security: square;
        }

        input.pw3 {
            -webkit-text-security: square;
        }
    </style>
    @include('dashboard.footer')