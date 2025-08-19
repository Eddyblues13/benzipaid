<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> Velmo Grand Bank| ACCOUNT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="./assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="./assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="./assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    <!-- Include a required theme -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Welcome Back !</h5>
                                        <p>Sign in to continue to GlobalTb.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>

                        <div class="card-body pt-0">
                            <div class="auth-logo">
                                <a class="auth-logo-light">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="assets/images/logo-light.svg" alt="" class="rounded-circle"
                                                height="34">
                                        </span>
                                    </div>
                                </a>

                                <a class="auth-logo-dark">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="assets/images/logo.svg" alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">
                                <p class="response"></p>


                                <form class="form-horizontal" action="{{ route('login') }}" method="POST">
                                    @csrf

                                    @if (session('status'))
                                    <div class="alert alert-success text-success" style="color: green;" role="alert">
                                        {{ session('status') }}
                                    </div>
                                    @elseif (session('error'))
                                    <div class="alert alert-danger text-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                    @endif
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Email</label>
                                        <input type="text" name="email" class="form-control" id="email"
                                            placeholder="Email">
                                        @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Enter password" aria-label="Password"
                                                aria-describedby="password-addon" id="password">
                                            @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                            <button class="btn btn-light " type="button" id="password-addon"><i
                                                    class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                    </div>

                                    <!--  <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="remember-check">
                                            <label class="form-check-label" for="remember-check">
                                                Remember me
                                            </label>
                                        </div> -->

                                    <div class="mt-3 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Log
                                            In</button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <h5 class="font-size-14 mb-3">Sign in with</h5>
                                        <p>Don't have an account ? <a href="{{ route('register') }}"
                                                class="fw-medium text-primary"> Signup now </a> </p>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <a href="{{ route('password.request') }}" class="text-muted"><i
                                                class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">

                        <div>
                            <p>Don't have an account ? <a href="{{ route('register') }}" class="fw-medium text-primary">
                                    Signup now </a> </p>
                            <p>©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Copyright
                                <i class="bx bx-check-shield text-success"></i> Velmo Grand Bank
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end account-pages -->

    <!-- JAVASCRIPT -->
    <script src="./assets/libs/jquery/jquery.min.js"></script>
    <script src="./assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="./assets/libs/simplebar/simplebar.min.js"></script>
    <script src="./assets/libs/node-waves/waves.min.js"></script>

    <!-- validation init -->
    <script src="./assets/js/pages/validation.init.js"></script>

    <!-- App js -->
    <script src="./assets/js/app.js"></script>
    <!-- Bootstrap Toasts Js -->
    <script src="assets/js/pages/bootstrap-toastr.init.js"></script>

    <script>
        Swal.fire({
            html: `
                <div class="swal-title" style="font-size: 20px; color: red;">Access Denied</div>
                <div class="swal-text" style="font-size: 16px;">
                    Hi {{ Auth::user()->first_name }} {{ Auth::user()->middle_name }} {{ Auth::user()->last_name }},
                    Your internet banking account is currently inactive. Kindly contact our live customer care representative.
                </div>
                <button id="homeButton" class="btn btn-primary" style="margin-top: 15px;">Go to Home</button>
            `,
            icon: "error",
            showConfirmButton: false,
            didRender: () => {
                // Add event listener for the "Home" button
                document.getElementById("homeButton").addEventListener("click", function() {
                    window.location.href = "/"; // Redirect to the homepage
                });
            }
        });
    </script>

</body>

</html>
<div class="position-fixed top-0 end-0 p-2" style="z-index: 1005">
    <div id="ErrorToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="https://globaltb.online/user/logo.png" alt="" class="me-2" height="18">
            <strong class="me-auto">Error</strong>
            <small>Now..</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" style="background-color:red;">
            Hello, world! This is a toast message.
        </div>
    </div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('#login_form').on('submit', function(e) {
            e.preventDefault();
            $(".response").html("Loading...<div class='spinner-border spinner-border-sm' role='status'><span class='sr-only'>Loading...</span></div>")
            var email = $('#email').val();
            var password = $('#password').val();

            if (email == '' || password == '') {
                $(".toast-body").html('Enter all field');
                $("#ErrorToast").toast("show");
                $(".response").html("")
                return false;
            }
            $.ajax({
                type: "POST",
                url: '{{ route("login.custom") }}',
                data: $(this).serialize(),
                dataType: "json",
                success: function(data) {
                    //alert('error');
                    $(".response").html(data.content);
                    if (data.content == 'Successful') {
                        $(".response").html(data.message);
                        window.location = data.redirect;

                    } else
                    if (data.content == 'Error') {
                        $(".response").html(data.message);
                        window.location = data.redirect;
                    }
                },
                error: function(data, errorThrown) {
                    Swal.fire('The Internet?', 'Check network connection!', 'question');
                }
            });
        });
    });
</script>

<script>
    function login(id) {
        id.innerHTML = "Verifying account..";
        setTimeout(function() {
            id.innerHTML = "Log in";
        }, 3000);
    }
</script>