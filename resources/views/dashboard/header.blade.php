<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content=" Benzipaid">
    <meta name="robots" content="noindex, nofollow">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=" Benzipaid : ">
    <meta property="og:title" content=" Benzipaid : ">
    <meta property="og:description" content=" Benzipaid : ">
    <meta property="og:image" content="admin71.Linit Wavetb.com/images/favicon.png">
    <meta name="format-detection" content="telephone=no">
    <title> Benzipaid - Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link href="{{asset('vendor/jqvmap/css/jqvmap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('vendor/chartist/css/chartist.min.css')}}">
    <link href="{{asset('vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <link href="{{asset('vendor/libs/fontawesome-icons.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/nucleusicons@1.0.0/css/nucleus-icons.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




    <!-- toastr-->
    <link href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
     alpha/css/bootstrap.css')}}" rel="stylesheet">

    <script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js')}}"></script>

    <link rel="stylesheet" type="text/css"
        href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css')}}">

    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js')}}"></script>





    <style>
        .grid-container h6 {
            font-size: 12px;
            font-weight: bold;
        }

        .withdraw-icon {
            color: #fff;
            text-align: center;
            padding: 10px;
            border-radius: 10px;
            font-size: 18px;
            font-weight: bolder;
            max-width: 50px;
            margin: auto;
        }

        .grid-container-two .d-block span {
            font-weight: bold;
            font-size: 12px;
        }

        a {
            color: unset;
        }
    </style>


</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="{{route('dashboard')}}" class="brand-logo">

                <img style="height: 60px;" src="{{asset('asset/img/logo.png')}}" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->


        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                                <div class="input-group search-area d-lg-inline-flex d-none">
                                    <div class="input-group-append">
                                        <button class="input-group-text search_icon search_icon"><i
                                                class="fa fa-pie-chart"></i></button>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Search here...">
                                </div>
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0)" role="button" data-bs-toggle="dropdown">
                                    <div class="header-info">
                                        <span class="text-black">Hello, <strong>{{Auth::user()->first_name}}
                                                {{Auth::user()->last_name}}</strong></span>
                                    </div>
                                    <img src="{{ asset('uploads/display/' . (Auth::user()->display_picture ? Auth::user()->display_picture : 'avatar.png')) }}"
                                        width="20" alt="">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="{{route('profile')}}" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary"
                                            width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <span class="ms-2">Profile </span>
                                    </a>

                                    <a href="{{route('transactions')}}" class="dropdown-item ai-icon">
                                        <svg width="18" height="18" viewBox="0 0 34 34" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M26.9165 1.41669H7.08317C5.58028 1.41669 4.13894 2.01371 3.07623 3.07642C2.01353 4.13912 1.4165 5.58046 1.4165 7.08335V17C1.4165 17.3757 1.56576 17.7361 1.83144 18.0018C2.09711 18.2674 2.45745 18.4167 2.83317 18.4167H9.9165V31.1667C9.91583 31.4376 9.99289 31.7031 10.1385 31.9316C10.2842 32.1601 10.4923 32.342 10.7382 32.4559C10.9847 32.5693 11.2585 32.6096 11.5273 32.5719C11.796 32.5343 12.0482 32.4202 12.254 32.2434L16.2915 28.7867L20.329 32.2434C20.5856 32.4628 20.9122 32.5834 21.2498 32.5834C21.5875 32.5834 21.9141 32.4628 22.1707 32.2434L26.2082 28.7867L30.2457 32.2434C30.5023 32.4628 30.8289 32.5834 31.1665 32.5834C31.3715 32.5819 31.574 32.5385 31.7615 32.4559C32.0074 32.342 32.2155 32.1601 32.3612 31.9316C32.5068 31.7031 32.5838 31.4376 32.5832 31.1667V7.08335C32.5832 5.58046 31.9862 4.13912 30.9234 3.07642C29.8607 2.01371 28.4194 1.41669 26.9165 1.41669ZM4.24984 15.5834V7.08335C4.24984 6.33191 4.54835 5.61124 5.0797 5.07988C5.61105 4.54853 6.33172 4.25002 7.08317 4.25002C7.83462 4.25002 8.55529 4.54853 9.08664 5.07988C9.61799 5.61124 9.9165 6.33191 9.9165 7.08335V15.5834H4.24984ZM29.7498 28.0925L27.129 25.84C26.8724 25.6205 26.5458 25.4999 26.2082 25.4999C25.8705 25.4999 25.5439 25.6205 25.2873 25.84L21.2498 29.2967L17.2123 25.84C16.9557 25.6205 16.6292 25.4999 16.2915 25.4999C15.9538 25.4999 15.6273 25.6205 15.3707 25.84L12.7498 28.0925V7.08335C12.7481 6.08812 12.4842 5.1109 11.9848 4.25002H26.9165C27.668 4.25002 28.3886 4.54853 28.92 5.07988C29.4513 5.61124 29.7498 6.33191 29.7498 7.08335V28.0925ZM26.9165 8.50002C26.9165 8.87574 26.7673 9.23608 26.5016 9.50175C26.2359 9.76743 25.8756 9.91669 25.4998 9.91669H16.9998C16.6241 9.91669 16.2638 9.76743 15.9981 9.50175C15.7324 9.23608 15.5832 8.87574 15.5832 8.50002C15.5832 8.1243 15.7324 7.76396 15.9981 7.49829C16.2638 7.23261 16.6241 7.08335 16.9998 7.08335H25.4998C25.8756 7.08335 26.2359 7.23261 26.5016 7.49829C26.7673 7.76396 26.9165 8.1243 26.9165 8.50002ZM26.9165 14.1667C26.9165 14.5424 26.7673 14.9027 26.5016 15.1684C26.2359 15.4341 25.8756 15.5834 25.4998 15.5834H16.9998C16.6241 15.5834 16.2638 15.4341 15.9981 15.1684C15.7324 14.9027 15.5832 14.5424 15.5832 14.1667C15.5832 13.791 15.7324 13.4306 15.9981 13.165C16.2638 12.8993 16.6241 12.75 16.9998 12.75H25.4998C25.8756 12.75 26.2359 12.8993 26.5016 13.165C26.7673 13.4306 26.9165 13.791 26.9165 14.1667ZM26.9165 19.8334C26.9165 20.2091 26.7673 20.5694 26.5016 20.8351C26.2359 21.1008 25.8756 21.25 25.4998 21.25H16.9998C16.6241 21.25 16.2638 21.1008 15.9981 20.8351C15.7324 20.5694 15.5832 20.2091 15.5832 19.8334C15.5832 19.4576 15.7324 19.0973 15.9981 18.8316C16.2638 18.5659 16.6241 18.4167 16.9998 18.4167H25.4998C25.8756 18.4167 26.2359 18.5659 26.5016 18.8316C26.7673 19.0973 26.9165 19.4576 26.9165 19.8334Z"
                                                fill="#858585"></path>
                                        </svg>
                                        <span class="ms-2">Transactions </span>
                                    </a>
                                    <a href="{{route('logOut')}}" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger"
                                            width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12"></line>
                                        </svg>
                                        <span class="ms-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
                <ul class="metismenu" id="menu">
                    <li><a class="has-arrow ai-icon" href="{{route('dashboard')}}" aria-expanded="false">
                            <i class="fa fa-drivers-license-o"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>

                    </li>
                    <li>
                        <a class="has-arrow ai-icon" href="{{route('inter.bank.transfer')}}" aria-expanded="false">
                            <i class="fa fa-credit-card"></i>
                            <span class="nav-text">Bank Transfer</span>
                        </a>

                    </li>
                    <li>
                        <a class="has-arrow ai-icon" href="{{route('crypto')}}" aria-expanded="false">
                            <i class="fa fa-google-wallet"></i>
                            <span class="nav-text">Crypto Withdrawal</span>
                        </a>

                    </li>
                    <li>
                        <a class="has-arrow ai-icon" href="{{route('paypal')}}" aria-expanded="false">
                            <i class="fa fa-paypal"></i>
                            <span class="nav-text">Paypal Withdrawal</span>
                        </a>

                    </li>
                    <li><a class="has-arrow ai-icon" href="{{route('skrill')}}" aria-expanded="false">
                            <i class="fa fa-spinner"></i>
                            <span class="nav-text">Skrill Withdrawal</span>
                        </a>
                    </li>
                    <li><a class="has-arrow ai-icon" href="{{route('check.page')}}" aria-expanded="false">
                            <i class="fa fa-spinner"></i>
                            <span class="nav-text">Check Deposit</span>
                        </a>
                    </li>
                    <li>
                        <a class="has-arrow ai-icon" href="{{route('card')}}" aria-expanded="false">
                            <i class="fa fa-credit-card"></i>
                            <span class="nav-text">Virtual Cards</span>
                        </a>

                    </li>
                    <li><a class="has-arrow ai-icon" href="{{route('loan')}}" aria-expanded="false">
                            <i class="fa fa-pie-chart"></i>
                            <span class="nav-text">Loans</span>
                        </a>

                    </li>
                    <li><a class="has-arrow ai-icon" href="{{route('logOut')}}" aria-expanded="false">
                            <i class="fa fa-cogs"></i>
                            <span class="nav-text">Logout</span>
                        </a>

                    </li>

                </ul>


            </div>
        </div>
        <div class="gtranslate_wrapper"></div>
        <script>
            window.gtranslateSettings = {"default_language":"en","detect_browser_language":true,"wrapper_selector":".gtranslate_wrapper","switcher_horizontal_position":"right","switcher_vertical_position":"top","alt_flags":{"en":"usa","pt":"brazil","es":"colombia","fr":"quebec"}}
        </script>
        <script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>