@include('layouts.header')
<div class="switch-theme-mode">
    <label id="switch" class="switch">
        <input type="checkbox" onchange="toggleTheme()" id="slider">
        <span class="slider round"></span>
    </label>
</div>
<div class="content-wrapper">

    <div class="breadcrumb-wrap bg-spring">
        <img src="asset/img/breadcrumb/br-shape-1.png" alt="Image" class="br-shape-one xs-none">
        <img src="asset/img/breadcrumb/br-shape-2.png" alt="Image" class="br-shape-two xs-none">
        <img src="asset/img/breadcrumb/br-shape-3.png" alt="Image" class="br-shape-three moveHorizontal sm-none">
        <img src="asset/img/breadcrumb/br-shape-4.png" alt="Image" class="br-shape-four moveVertical sm-none">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-8 col-sm-8">
                    <div class="breadcrumb-title">
                        <h2>Services</h2>
                        <ul class="breadcrumb-menu list-style">
                            <li><a href="{{url('/')}}">Home </a></li>
                            <li>Services</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5 col-md-4 col-sm-4 xs-none">
                    <div class="breadcrumb-img">
                        <img src="asset/img/breadcrumb/br-shape-5.png" alt="Image"
                            class="br-shape-five animationFramesTwo">
                        <img src="asset/img/breadcrumb/br-shape-6.png" alt="Image" class="br-shape-six bounce">
                        <img src="asset/img/breadcrumb/breadcrumb-2.png" alt="Image">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="service-wrap ptb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="service-card style4">
                        <div class="service-info">
                            <div class="service-title">
                                <span><i class="flaticon-payment-method"></i></span>
                                <h3><a href="#">Online Banking</a></h3>
                            </div>
                            <p>When it comes to managing your personal or business accounts, you'll be able to quickly
                                pay bills, transfer money, apply for certain loans and much more through First Unit bank
                                Online Banking. </p>
                            <a href="#" class="link style1">Learn More <i class="flaticon-right-arrow-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="service-card style4">
                        <div class="service-info">
                            <div class="service-title">
                                <span><i class="flaticon-computer"></i></span>
                                <h3><a href="#">Mobile Banking </a></h3>
                            </div>
                            <p>When you're ready to take your member experience to a new level, HawaiiUSA's Mobile
                                Banking enables you to manage your account, move money and more - all from your
                                smartphone or tablet using our free app. See what you can do! </p>
                            <a href="#" class="link style1">Learn More <i class="flaticon-right-arrow-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="service-card style4">
                        <div class="service-info">
                            <div class="service-title">
                                <span><i class="flaticon-loan-1"></i></span>
                                <h3><a href="#">Internet Banking</a></h3>
                            </div>
                            <p>First Unit bank Online Banking Service gives you unrestricted and secure access to your
                                account, anytime, anywhere on your computer, tablet, smart phones or any
                                internet-enabled devices. It is your bank on the go! </p>
                            <a href="#" class="link style1">Learn More <i class="flaticon-right-arrow-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="service-card style4">
                        <div class="service-info">
                            <div class="service-title">
                                <span><i class="flaticon-secure-shield"></i></span>
                                <h3><a href="#">Cards</a></h3>
                            </div>
                            <p>First Unit bank makes digital payments and transfers easy with various credit, debit and
                                ATM card options to suit your needs. You'll appreciate the anytime access and other
                                convenient features of these cards. </p>
                            <a href="#" class="link style1">Learn More <i class="flaticon-right-arrow-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="service-card style4">
                        <div class="service-info">
                            <div class="service-title">
                                <span><i class="flaticon-mortarboard"></i></span>
                                <h3><a href="#">e-Statements</a></h3>
                            </div>
                            <p> First Unit bank allows account holders to access their statements online where they can
                                download or print them</p>
                            <a href="#" class="link style1">Learn More <i class="flaticon-right-arrow-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="service-card style4">
                        <div class="service-info">
                            <div class="service-title">
                                <span><i class="flaticon-loan"></i></span>
                                <h3><a href="#">Reduced Student Loans</a></h3>
                            </div>
                            <p>Rates as low as 2.97% APR* (Variable) / 3.35% APR* (FIXED)!* Live customer support
                                available M-F 9am to 5pm PST to discuss your needs. </p>
                            <a href="#" class="link style1">Learn More <i class="flaticon-right-arrow-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

</div>

@include('layouts.footer')