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
                        <h2>About Us</h2>
                        <ul class="breadcrumb-menu list-style">
                            <li><a href="{{url('/')}}">Home </a></li>
                            <li>About Us</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5 col-md-4 col-sm-4 xs-none">
                    <div class="breadcrumb-img">
                        <img src="asset/img/breadcrumb/br-shape-5.png" alt="Image"
                            class="br-shape-five animationFramesTwo">
                        <img src="asset/img/breadcrumb/br-shape-6.png" alt="Image" class="br-shape-six bounce">
                        <img src="asset/img/breadcrumb/breadcrumb-1.png" alt="Image">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="about-wrap style1 ptb-100">
        <div class="container">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6">
                    <div class="about-img-wrap">
                        <img src="asset/img/about/about-shape-1.png" alt="Image" class="about-shape-one bounce">
                        <img src="asset/img/about/about-shape-2.png" alt="Image" class="about-shape-two moveHorizontal">
                        <img src="asset/img/about/about-img-1.png" alt="Image" class="about-img">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content">
                        <img src="asset/img/about/about-shape-3.png" alt="Image" class="about-shape-three">
                        <div class="content-title style1">
                            <span>Smart Banking</span>
                            <h2>The Better Way To Save &amp; Invest Online Banking</h2>
                            <p>Take Control Of Your Financial Future. Hear Our New Pick For Data Driven Investor
                                (+203%). Maximize Returns, Sleep Well, And Build True Wealth with our Proprietary Quant
                                Ratings.</p>
                        </div>
                        <ul class="content-feature-list style1 list-style">
                            <li><span><i class="flaticon-tick"></i></span>Cards that work all across the world.</li>
                            <li><span><i class="flaticon-tick"></i></span>Highest Returns on your investments.</li>
                            <li><span><i class="flaticon-tick"></i></span>No ATM fees. No minimum balance. No
                                overdrafts.</li>
                        </ul>
                        <a href="{{url('/about')}}" class="btn style1">More About us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="service-wrap bg-albastor pt-100 pb-75">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                    <div class="section-title style1 text-center mb-40">
                        <span>Our Services</span>
                        <h2>Providing Services For Last 25 Years With Reputation</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6">
                    <div class="service-card style1">
                        <span class="service-icon">
                            <img src="asset/img/service/service-icon-1.png" alt="Image">
                        </span>
                        <h3><a href="service-details.html">Negative results rectification</a></h3>
                        <p>The agency helps to lessen the damages caused by negative results and unwanted comments.</p>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6">
                    <div class="service-card style1">
                        <span class="service-icon">
                            <img src="asset/img/service/service-icon-2.png" alt="Image">
                        </span>
                        <h3><a href="service-details.html">Checking and savings accounts</a></h3>
                        <p>As with personal accounts, a business can open a business checking account and savings
                            account. The checking account can be for receiving payments and covering operational
                            expenses (i.e., everyday expenses, like buying supplies or paying employees).</p>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6">
                    <div class="service-card style1">
                        <span class="service-icon">
                            <img src="asset/img/service/service-icon-3.png" alt="Image">
                        </span>
                        <h3><a href="service-details.html">Access to your account</a></h3>
                        <p>If your business frequently needs small-denomination bills or change, being near a bank
                            branch could also be a matter of convenience. It’ll be much easier to manage your day-to-day
                            operations if you don’t need to travel far to visit the bank. Consider the bank’s branch
                            locations, the branch hours and online banking access. </p>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6">
                    <div class="service-card style1">
                        <span class="service-icon">
                            <img src="asset/img/service/service-icon-4.png" alt="Image">
                        </span>
                        <h3><a href="service-details.html">Email Notification</a></h3>
                        <p>Email Alert. E-Mail alert is an electronic notification service of transactions in your
                            account(s). · Sign on Process.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="shopping-wrap ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-12 order-lg-1 order-2">
                    <div class="shopping-content">
                        <img src="asset/img/shopping/shopping-shape-1.png" alt="Image" class="shopping-shape-one">
                        <img src="asset/img/shopping/shopping-shape-2.png" alt="Image" class="shopping-shape-two">
                        <div class="content-title style1 ">
                            <span>Online Shopping</span>
                            <h2>Shop Online Make In Online Banking Payments</h2>
                            <p>Neopay Online Bank leads the pack when it comes to Banking. Whether you’re a skilled or
                                completely new to online banking, our platforms give you the tools needed to take
                                advantage of the foreign exchange market’s volatility.</p>
                        </div>
                        <ul class="content-feature-list list-style">
                            <li><i class="ri-check-double-line"></i>Cards that work all across the world.</li>
                            <li><i class="ri-check-double-line"></i>Highest Returns on your investments.</li>
                            <li><i class="ri-check-double-line"></i>No ATM fees. No minimum balance. No overdrafts.</li>
                        </ul>
                        <a href="{{url('register')}}" class="btn style1">Signup Today</a>
                    </div>
                </div>
                <div class="col-lg-6 col-12 order-lg-2 order-1">
                    <div class="shopping-img-wrap">
                        <img src="asset/img/shopping/shopping-1.png" alt="Image">
                        <img src="asset/img/shopping/shopping-shape-3.png" alt="Image" class="shopping-shape-three">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="app-wrap  ptb-100 bg-rock">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-8">
                    <div class="app-content sm-center">
                        <div class="content-title style2">
                            <h2>You Can Find All Things You Need In Our App</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-4 text-md-end sm-center">
                    <div class="app-btn">
                        <a href="https://play.google.com/store/apps"><img src="asset/img/play-store.png"
                                alt="Image"></a>
                        <a href="https://www.apple.com/app-store/"><img src="asset/img/apple-store.png" alt="Image"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="goal-wrap ptb-100">
        <div class="container">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6">
                    <div class="goal-img-wrap">
                        <img src="asset/img/goal/goal-shape-1.png" alt="Image" class="goal-shape-three">
                        <img src="asset/img/goal/goal-shape-2.png" alt="Image" class="goal-shape-one">
                        <img src="asset/img/goal/goal-shape-3.png" alt="Image" class="goal-shape-two">
                        <img src="asset/img/goal/goal-1.jpg" alt="Image">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="goal-content">
                        <div class="content-title style1">
                            <span>Goal Setting</span>
                            <h2>Manage Your Money With Online Banking Solution</h2>
                            <p>With Neopay Online Bank it’s simple to get started trading Forex, and it’s easy to get
                                the education needed to hone your skills. You’ll be able to benefit from one on one
                                support from our specialist team and develop your expertise with our professional Forex
                                trading resources and insights. For beginner and advanced traders alike we offer high
                                leverage, guaranteed stop losses on every Forex trade, and our fixed spreads remain
                                constant to give you greater strategic power and control.</p>
                        </div>
                        <ul class="content-feature-list style1 list-style">
                            <li><span><i class="flaticon-tick"></i></span>Learn To Budget</li>
                            <li><span><i class="flaticon-tick"></i></span>Create An Emergency Fund</li>
                            <li><span><i class="flaticon-tick"></i></span>Get Out Of Debt</li>
                            <li><span><i class="flaticon-tick"></i></span>Save And Invest Your Money</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section class="security-wrap ptb-100">
        <div class="container">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6 col-12 order-lg-1 order-2">
                    <div class="security-content">
                        <div class="content-title style1">
                            <span>Banking Security</span>
                            <h2>The Safest Way To Transact Your Money Fast</h2>
                            <p>When you give money to someone else, you have a few choices for how to do it. You can
                                hand over cash, a check or payment card in person; you can send a check or payment card
                                in the mail; or you can use an electronic person-to-person money transfer system that
                                lets you send money directly from your bank account to someone else.</p>
                        </div>
                        <div class="feature-item-wrap">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <img src="asset/img/security/security-icon-1.png" alt="Image">
                                </div>
                                <div class="feature-text">
                                    <h3>Pay Online Securely</h3>
                                    <p>payments solutions to grow revenue, reduce costs, and enhance profitability.</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <img src="asset/img/security/security-icon-2.png" alt="Image">
                                </div>
                                <div class="feature-text">
                                    <h3>Convert Your Money In Seconds</h3>
                                    <p>Convert your money in seconds❗ Now as fast and easy as never before with Gemstone
                                        Origin Bank</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12 order-lg-2 order-1">
                    <div class="security-img-wrap">
                        <img src="asset/img/security/security-shape-1.png" alt="Image" class="security-shape-one">
                        <img src="asset/img/security/security-shape-2.png" alt="Image" class="security-shape-two">
                        <img src="asset/img/security/security-1.png" alt="Image">
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

@include('layouts.footer')