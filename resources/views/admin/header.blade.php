<!DOCTYPE html>
<html lang="en">

<head>
    <script type="text/javascript" src="https://js.stripe.com/v3/"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="ialsmxvxbFVMvehWybzdppDZtGxGJ4kODeqmi07p">
    <title> Velmo Grand Bank | User Dashboard</title>
    <link rel="icon" href="{{asset('user/account/storage/app/public/photos/uPYDzhfavicon.png1677339254')}}"
        type="image/png" />
    <link rel="icon" href="{{ asset('account/cloud/uploads/favicon.png')}}" type="image/png" />

    <!-- Fonts and icons -->
    <script src="{{asset('user/account/dash/js/plugin/webfont/webfont.min.js')}}"></script>
    <!-- Sweet Alert -->
    <script src="{{asset('user/account/dash/js/plugin/sweetalert/sweetalert.min.js ')}}"></script>
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{asset('user/account/dash/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/account/dash/css/fonts.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/account/dash/css/atlantis.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/account/dash/css/customs.css')}}">
    <link rel="stylesheet" href="{{asset('user/account/dash/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('user/account/dash/css/atlantis.min.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/dt-1.10.21/af-2.3.5/b-1.6.3/b-flash-1.6.3/b-html5-1.6.3/b-print-1.6.3/r-2.2.5/datatables.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- Bootstrap Notify -->
    <script src="{{asset('user/account/dash/js/plugin/bootstrap-notify/bootstrap-notify.min.js ')}}"></script>
    <script src="{{asset('user/account/dash/js/plugin/sweetalert/sweetalert.min.js ')}}"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.1/dist/alpine.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.2.1/dist/chart.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Livewire Styles -->
    <link rel="stylesheet" href="{{asset('user/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        [wire\:loading],
        [wire\:loading\.delay],
        [wire\:loading\.inline-block],
        [wire\:loading\.inline],
        [wire\:loading\.block],
        [wire\:loading\.flex],
        [wire\:loading\.table],
        [wire\:loading\.grid] {
            display: none;
        }

        [wire\:offline] {
            display: none;
        }

        [wire\:dirty]:not(textarea):not(input):not(select) {
            display: none;
        }

        input:-webkit-autofill,
        select:-webkit-autofill,
        textarea:-webkit-autofill {
            animation-duration: 50000s;
            animation-name: livewireautofill;
        }

        @keyframes livewireautofill {
            from {}
        }
    </style>

    <script>
        // Add your client ID and secret
            var PAYPAL_CLIENT = 'iidjdjdj';
            var PAYPAL_SECRET = 'jijdjkdkdk';
            
            // Point your server to the PayPal API
            var PAYPAL_ORDER_API = 'https://api.paypal.com/v2/checkout/orders/';
    </script>
    <script src="https://www.paypal.com/sdk/js?client-id=iidjdjdj"></script>
    <style type="text/css">
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;

            color: white;
            text-align: center;
        }
    </style>
</head>

<body data-background-color="light">
    <div id="app">


        <!--/PayPal-->

        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            {tawk to codess}
        </script>
        <!--End of Tawk.to Script-->
        <div class="wrapper">
            <div class="main-header">
                <!-- Logo Header -->

                <div class="logo-header" data-background-color="blue">
                    <a href="{{route('admin.home')}}" class="logo" style="font-size: 27px; color:#fff;">
                        Velmo Grand Bank
                    </a>
                    <button class="ml-auto navbar-toggler sidenav-toggler" type="button" data-toggle="collapse"
                        data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <i class="fa fa-bars"></i>
                        </span>
                    </button>
                    <button class="topbar-toggler more"><i class="icon-options-vertical "></i></button>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>

                </div>
                <!-- End Logo Header -->

                <!-- Navbar Header -->
                <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue">

                    <div class="container-fluid">
                        <div class="collapse" id="search-nav">

                            <script>
                                document.getElementById('searchform').addEventListener('subit' searchuser);
                   function searchuser(){
                       console.log('ddj');
                       let url = "{{route('manage.users.page')}}";
                       window.location.href = url;
                   }
                            </script>
                        </div>
                        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">

                            <li class="nav-item dropdown hidden-caret">
                                <div id="google_translate_element"></div>
                            </li>
                            <li class="nav-item dropdown hidden-caret">
                                <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                                    <i class="text-white fa fa-user"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-user animated fadeIn">
                                    <div class="dropdown-user-scroll scrollbar-outer">
                                        <li>
                                            <a class="dropdown-item" href="#">Account Settings</a>
                                            <a class="dropdown-item" href="#">Change Password</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{route('logout')}}">
                                                Logout
                                            </a>
                                            <form id="logoutform" action="{{route('logout')}}" method="POST"
                                                style="display: none;">
                                                <input type="hidden" name="_token"
                                                    value="XJqa5hhY3cHbkWs5f3RwEgAuiPZvVNy9oH1FuvnJ">
                                            </form>
                                        </li>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>


            <script type="text/javascript">
                //create investment
        $("#styleform").on('change',function(){
        $.ajax({
            url: "https://stockmarket-hq.com/account/admin/dashboard/changestyle",
            type: 'POST',
            data:$("#styleform").serialize(),
            success: function (data) {
				location.reload(true);
            },
            error: function (data) {
                console.log('Something went wrong');
            },

        });
    });
    
            </script>
            <!-- Stored in resources/views/child.blade.php -->

            <!-- Sidebar -->
            <div class="sidebar sidebar-style-2" data-background-color="white">
                <div class="sidebar-wrapper scrollbar scrollbar-inner">
                    <div class="sidebar-content">
                        <div class="user">
                            <div class="info">
                                <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                    <span>
                                        Admin Test
                                        <span class="user-level"> Admin</span>

                                    </span>
                                </a>
                            </div>
                        </div>

                        <ul class="nav nav-primary">
                            <li class="nav-item active">
                                <a href="{{route('admin.home')}}">
                                    <i class="fas fa-home"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{route('manage.transactions.page')}}">
                                    <i class="fas fa-cubes " aria-hidden="true"></i>
                                    <p>Transactions</p>
                                </a>
                            </li>

                            <li class="nav-item    ">
                                <a href="{{route('manage.users.page')}}">
                                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                                    <p>Manage Users</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('admin.deposit.index')}}">
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                    <p>Check Deposits</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('admin.kyc.index')}}">
                                    <i class="fa fa-arrow-alt-circle-up" aria-hidden="true"></i>
                                    <p>KYC Applications</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="">
                                    <i class="fa fa-arrow-alt-circle-up" aria-hidden="true"></i>
                                    <p>Virtual Cards</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('admin.send.mail.form')}}">
                                    <i class="fa fa-arrow-alt-circle-up" aria-hidden="true"></i>
                                    <p>Send email</p>
                                </a>
                            </li>


                            <li class="nav-item  ">
                                <a data-toggle="collapse" href="#adm">
                                    <i class="fa fa-user"></i>
                                    <p>Administrator(s)</p>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="adm">
                                    <ul class="nav nav-collapse">
                                        <li>
                                            <a href="">
                                                <span class="sub-item">Add Manager</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span class="sub-item">Manage Administrator(s)</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item          ">
                                <a data-toggle="collapse" href="#settings">
                                    <i class="fa fa-cog"></i>
                                    <p>Settings</p>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="settings">
                                    <ul class="nav nav-collapse">
                                        <li>
                                            <a href="">
                                                <span class="sub-item">App Settings</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span class="sub-item">Referral Settings</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('payment.settings')}}">
                                                <span class="sub-item">Payment Settings</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span class="sub-item">Exchange Settings</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span class="sub-item">Subscription Settings</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span class="sub-item">Frontend Settings</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span class="sub-item">Terms and Privacy</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span class="sub-item">IP Address</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>


                            <!--   <li class="nav-item ">
                    <a href="https://stockmarket-hq.com/account/admin/dashboard/about">
                        <i class=" fa fa-info-circle" aria-hidden="true"></i>
                        <p>About Onlinetrader</p>
                    </a>
                </li>-->

                        </ul>
                    </div>
                </div>
            </div>