<!DOCTYPE html>
<html lang="en-US" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <!-- Fav Icon -->
    <link rel="shortcut icon" href="{{ asset('path/to/favicon.ico') }}" type="image/x-icon">
    <!-- Page Title -->
    <title>Login | Admin</title>
    <!-- StyleSheets -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/dashlite.css?ver=2.4.0') }}">
    <link rel="stylesheet" href="{{ asset('admin/scss/sweetalert.css') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('admin/assets/css/theme.css?ver=2.4.0') }}">
</head>

<body class="nk-body npc-crypto bg-white pg-auth">
    <!-- app body @s -->
    <div class="nk-app-root">
        <div class="justify-center card-header">
            <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white">
                <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                    <a href="#" class="toggle btn-white btn btn-icon btn-light" data-target="athPromo"><em
                            class="icon ni ni-info"></em></a>
                </div>
                <div class="nk-block nk-block-middle nk-auth-body">
                    <center class="brand-logo pb-5">
                        <a href="" class="logo-link">
                            <img class="logo-light logo-img logo-img-lg" src="{{ asset('assets/img/logo1.png') }}"
                                alt="logo">
                            <img class="logo-dark logo-img logo-img-lg" src="{{ asset('assets/img/logo1.png') }}"
                                alt="logo-dark">
                        </a>
                    </center>

                    <br>
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h5 class="nk-block-title">Sign-In</h5>
                            <div class="nk-block-des alert alert-pro alert-primary">
                                <p class="alert-text">Login using your Email address and password.</p>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('admin.login') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="default-01">Email address</label>
                                <a class="link link-primary link-sm" tabindex="-1" href="#">Need Help?</a>
                            </div>
                            <input type="email"
                                class="form-control form-control-lg @error('email') is-invalid @enderror"
                                id="default-01" placeholder="Enter your Email address" name="email"
                                value="{{ old('email') }}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div><!-- .form-group -->

                        <div class="form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="password">Password</label>
                            </div>
                            <div class="form-control-wrap">
                                <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch"
                                    data-target="password">
                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                </a>
                                <input type="password"
                                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                                    id="password" placeholder="Enter your password" name="password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div><!-- .form-group -->

                        <div class="form-group">
                            <button class="btn btn-lg btn-primary btn-block" type="submit"
                                name="loginForm">Continue</button>
                        </div>
                    </form><!-- form -->
                </div><!-- .nk-block -->

                <div class="nk-block nk-auth-footer" style="margin-top:80px;">
                    <div class="mt-3">
                        <p>&copy; {{ date('Y') }}. All Rights Reserved.</p>
                    </div>
                </div><!-- .nk-block -->
            </div><!-- .nk-split-content -->
        </div><!-- .nk-split -->
    </div><!-- app body @e -->

    <!-- JavaScript -->
    <script src="{{ asset('admin/assets/js/bundle.js?ver=2.4.0') }}"></script>
    <script src="{{ asset('admin/assets/js/scripts.js?ver=2.4.0') }}"></script>
    <script src="{{ asset('admin/assets/js/vendors/sweetalert.js') }}"></script>
</body>

</html>