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
                                    <h4 class="mb-sm-0 font-size-15">Deposit<i class="bx bx-transfer">
                                    </i> </h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12">
                <div class="card" style="border-top-left-radius:30px; border-top-right-radius: 30px; ">
                                    
            <!----------Card Starts HERE------------>
                <div class="payment-title" style="margin:10px">
                    <b>you are to send ETH to the wallet address below or simply contact support for barcode for fast payment</b>
              
                <hr>
                <p>Amount in Dollar: <b>${{number_format($amount, 2, '.', ',')}}</b></p>
                <p>Amount in ETH: <b>{{$eth}} ETH</b></P>
                </div>  
                                
                             
            <center>
            													
            <div class='col-sm-6'>
        
                    <div class='mt-4'>
                        <div>
                        <img src="images/swift.png"  style ="width:300px;">
                          
                            <input class='form-control ' value="sdbcnxcjnxxcjkjzsjbzxjzxjkjkzxj" id="myInput1"  name='image'  type='text'>
                        </div>
                    </div>
                </div>
                <button type='submit' onclick="copyAdr1()" class='btn btn-primary btn-sm btn-rounded shadow' 
                > Copy Address</button>
          
       
            </center>                                                  
                        </div>
               

                    </div> <!-- container-fluid -->
                </div>
    <!---------Card ENDs Here------------->
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">
                                             <!-- <p class="response"></p> -->
                                        </h4>
                             
            <center>
            <form class='form-horizontal' action ="{{ route('make.payment')}}" method='POST' id='id_load' enctype='multipart/form-data'>
                         @csrf													
            <div class='col-sm-6'>
            <input type="hidden" name="amount" value="{{$amount}}">
                    <div class='mt-4'>
                        <div>
                            <label for='formFileLg' class='form-label'>Upload Proof</label>
                            <input class='form-control form-control-lg' id='imgInp' accept='image' name='image' onchange='return fileValidation()' type='file'>
                        </div>
                    </div>
                </div>
                <button type='submit' class='btn btn-primary btn-sm btn-rounded shadow' 
                > <ion-icon class='fa fa-camera'> Upload </ion-icon></button>
            </form>
       
            </center>                                                  
                        </div>
               

                    </div> <!-- container-fluid -->
                </div>
                                <!-- end card -->
                            </div>
                        </div>
                    </div>
                    <script>
function fileValidation() {
            var fileInput = document.getElementById('imgInp');
            var filePath = fileInput.value;
            
            var img = document.getElementById("imgInp");
            // Allowing file type
            
            // var allowedExtensions = /(\.jpg)$/i;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
              
            if (!allowedExtensions.exec(filePath)){
                 $(".response").html("<div class='alert alert-warning alert-dismissible fade show' role='alert'><i class='mdi mdi-alert-outline me-2'></i>Unsupported image format (JPG / JPEG format only) <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
                fileInput.value = '';
                return false;
            } 
            
            if(img.files[0].size > 1509155){
            $(".response").html("<div class='alert alert-warning alert-dismissible fade show' role='alert'><i class='mdi mdi-alert-outline me-2'></i>Image size too large maximum, allowed.. 1.24mb <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
            fileInput.value = '';
                return false;
            }
            
    }


    function copyAdr1(){
        var copyText = document.getElementById("myInput1");
         copyText.select();


        /* Copy the text inside the text field */
        document.execCommand("copy");
         copyText.setSelectionRange(0, 99999);
         navigator.clipboard.writeText(copyText.value);
    }
    </script>
@include('dashboard.footer')
