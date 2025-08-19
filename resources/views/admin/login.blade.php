<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="CrATpF4qseMdsrhXsXdzV2Al8jdRp6y5CWKqFYER">
    <title>stock market-hq | User Login</title>


    <link rel="icon" href="account/storage/app/public/photos/uPYDzhfavicon.png1677339254" type="image/png" />

    <link href="account/temp/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons -->
    <link href="account/temp/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="account/temp/css/line.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- Main Css -->
    <link href="account/temp/css/style.css" rel="stylesheet" type="text/css" />
    <link href="account/temp/css/colors/default.css" rel="stylesheet">


    <!-- Smartsupp Live Chat script -->
    <!-- Smartsupp Live Chat script -->
    <script type="text/javascript">
        var _smartsupp = _smartsupp || {};
        _smartsupp.key = '5a55bf595be90a374202c7cfcd973521cf83995c';
        window.smartsupp || (function(d) {
            var s, c, o = smartsupp = function() {
                o._.push(arguments)
            };
            o._ = [];
            s = d.getElementsByTagName('script')[0];
            c = d.createElement('script');
            c.type = 'text/javascript';
            c.charset = 'utf-8';
            c.async = true;
            c.src = 'https://www.smartsuppchat.com/loader.js?';
            s.parentNode.insertBefore(c, s);
        })(document);
    </script>
    <noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>

</head>

<body class="h-100 bg-soft-primary">
    <!-- Smartsupp Live Chat script -->
    <script type="text/javascript">
        var _smartsupp = _smartsupp || {};
        _smartsupp.key = '5a55bf595be90a374202c7cfcd973521cf83995c';
        window.smartsupp || (function(d) {
            var s, c, o = smartsupp = function() {
                o..push(arguments)
            };
            o. = [];
            s = d.getElementsByTagName('script')[0];
            c = d.createElement('script');
            c.type = 'text/javascript';
            c.charset = 'utf-8';
            c.async = true;
            c.src = 'https://www.smartsuppchat.com/loader.js?';
            s.parentNode.insertBefore(c, s);
        })(document);
    </script>

    <section class=" auth" style="background-color:black">
        <div class="container">
            <div class="pb-3 row justify-content-center">

                <div class="col-12 col-md-6 col-lg-6 col-sm-10 col-xl-6">
                    <div class="text-center">
                        <a href="/"><img src="account/storage/app/public/photos/uPYDzhlogo.jpg1677339253" alt="" class="mb-3 img-fluid auth__logo"style="width:180px"></a>
                    </div>

                    <div class="bg-white shadow card login-page roundedd border-1 ">
                        <div class="card-body">
                <x-validation-errors class="mb-4" />
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(Session::has('error-message'))
                    <p class="alert alert-info">{{ Session::get('error-message') }}</p>
                @endif
             @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
            @endif
                            <h4 class="text-center card-title">Admin Login</h4>
                            <form method="POST" action="{{ route('admin.login.store') }}">
                                   @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label><h4>Enter Email <span class="text-danger">*</span></h4></label>
                                            <div class="position-relative">
                                                <i data-feather="mail" class="fea icon-sm icons"></i>
                                                <input type="email" class="pl-5 form-control" name="email" :value="old('email')" id="email" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label><h4>Enter Password <span class="text-danger">*</span></h4></label>
                                            <div class="position-relative">
                                                <i data-feather="key" class="fea icon-sm icons"></i>
                                                <input type="password" class="pl-5 form-control" name="password" id="password" placeholder="Enter Password" required>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->

                                    <div class="col-lg-12">
                                        <div class="d-flex justify-content-between">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember">
                                                    <label class="custom-control-label" for="customCheck1">Remember
                                                        me</label>
                                                </div>
                                            </div>
                                            <p class="mb-0 forgot-pass">
                                                     @if (Route::has('password.request'))
                                       <a href="{{ route('password.request') }}" class="text-dark font-weight-bold">Forgot password ?</a>

                                                    @endif
                                            </p>
                                        </div>
                                    </div>
                                    <!--end col-->

                                    <div class="mb-0 col-lg-12">
                                        <button class="btn btn-primary btn-block pad" type="submit">Sign in</button>
                                    </div>
                                    <!--end col-->

                                    <div class="mt-4 text-center col-lg-12">
                                        <h6>Or Login With</h6>
                                        <div class="row">

                                            <!--end col-->
                                            <!--  <div class="mt-3 col-12">
                                                <a href="account/auth/google/redirect" class="btn btn-block btn-light"><i
                                                        class="mdi mdi-google text-danger"></i> Google</a>
                                            </div>-->
                                            <!--end col-->
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <!--end col-->

                                    <div class="text-center col-12">
                                        <p class="mt-3 mb-0"><small class="mr-2 text-dark">Don't have an account
                                                ?</small> <a href="{{route('register')}}" class="text-dark font-weight-bold">Sign Up</a></p>
                                    </div>
                                    <!--end col-->

                                    <div class="text-center col-12">
                                        <p class="mt-4 mb-0"><small class="mr-2 text-dark">&copy; Copyright  2023 &nbsp; stock market-hq &nbsp; All Rights Reserved.</small>
                                        </p>
                                    </div>
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                    </div>
                    <!---->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->




    <script src="account/temp/js/jquery-3.5.1.min.js"></script>
    <script src="account/temp/js/bootstrap.bundle.min.js"></script>

    <!-- SLIDER -->
    <script src="account/temp/js/owl.carousel.min.js"></script>
    <script src="account/temp/js/owl.init.js"></script>
    <!-- Icons -->
    <script src="account/temp/js/feather.min.js"></script>
    <script src="account/temp/js/bundle.js"></script>

    <script src="account/temp/js/app.js"></script>
    <script src="account/temp/js/widget.js"></script>


</body>

</html>