@include('layouts.header')
<div class="switch-theme-mode">
    <label id="switch" class="switch">
        <input type="checkbox" onchange="toggleTheme()" id="slider">
        <span class="slider round"></span>
    </label>
</div>
<section class="hero-wrap style3 bg-squeeze">
    <img src="asset/img/hero/hero-shape-10.png" alt="Image" class="hero-shape-one">
    <img src="asset/img/hero/hero-shape-15.png" alt="Image" class="hero-shape-two">
    <img src="asset/img/hero/hero-shape-14.png" alt="Image" class="hero-shape-three">
    <img src="asset/img/hero/hero-shape-11.png" alt="Image" class="hero-shape-four animationFramesTwo">
    <div class="hero-slider-one owl-carousel">
        <div class="hero-slide-item">
            <div class="container">
                <div class="row gx-5 align-items-center">
                    <div class="col-md-6">
                        <div class="hero-content" data-speed="0.10" data-revert="true">
                            <span>Global Money Transfer</span>
                            <h1>Transfer Money Across World In Real Time</h1>
                            <p> Our comprehensive business services are available to help you run your
                                enterprise smoothly.</p>
                            <div class="hero-btn">
                                <a href="{{route('register')}}" class="btn style1">Get Started</a>
                                <a class="play-video">
                                    <a href="{{url('login')}}" class="btn style1">Login</a>
                                    <span class="sm-none"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="hero-img-wrap">
                            <img src="asset/img/hero/hero-shape-13.png" alt="Image" class="hero-shape-five bounce">
                            <img src="asset/img/hero/hero-shape-12.png" alt="Image"
                                class="hero-shape-six moveHorizontal">
                            <img src="asset/img/hero/hero-slide-1.png" alt="Image" class="hero-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slide-item">
            <div class="container">
                <div class="row gx-5 align-items-center">
                    <div class="col-md-6">
                        <div class="hero-content" data-speed="0.10" data-revert="true">
                            <span>Online Payment System</span>
                            <h1>Secured &amp; Easy Online Payment Solution </h1>
                            <p>No matter how large or small your business may be, we can provide the financial
                                solutions for every banking need to help connect you to a world of
                                opportunities.</p>
                            <div class="hero-btn">
                                <a href="{{route('register')}}" class="btn style1">Get Started</a>
                                <a class="play-video">
                                    <a href="{{route('login')}}" class="btn style1">Login</a>
                                    <span class="sm-none"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="hero-img-wrap">
                            <img src="asset/img/hero/hero-shape-13.png" alt="Image" class="hero-shape-five bounce">
                            <img src="asset/img/hero/hero-shape-12.png" alt="Image"
                                class="hero-shape-six moveHorizontal">
                            <img src="asset/img/hero/hero-slide-2.png" alt="Image" class="hero-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slide-item">
            <div class="container">
                <div class="row gx-5 align-items-center">
                    <div class="col-md-6">
                        <div class="hero-content" data-speed="0.10" data-revert="true">
                            <span>Global Money Transfer</span>
                            <h1>Move Your Money In Easy Secured Steps</h1>
                            <p> Our comprehensive business services are available to help you run your
                                enterprise smoothly.</p>
                            <div class="hero-btn">
                                <a href="{{route('register')}}" class="btn style1">Get
                                    Started</a>
                                <a class="play-video">
                                    <a href="{{route('login')}}" class="btn style1">Login</a>
                                    <span class="sm-none"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="hero-img-wrap">
                            <img src="asset/img/hero/hero-shape-13.png" alt="Image" class="hero-shape-five bounce">
                            <img src="asset/img/hero/hero-shape-12.png" alt="Image"
                                class="hero-shape-six moveHorizontal">
                            <img src="asset/img/hero/hero-slide-3.png" alt="Image" class="hero-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="feature-wrap pt-100 pb-75">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="feature-card style3">
                    <div class="feature-info">
                        <div class="feature-title">
                            <span><img src="asset/img/feature/feature-icon-1.png" alt="Image"></span>
                            <h3>Account</h3>
                        </div>
                        <ul>
                            <li>We offer a wide range of accounts to suit lifestyles & needs. Free and paid-for
                                add-ons are available to give total control. Download, Fill & Submit at our
                                Branch.</li>
                            <li>Minimum account size of $5,000</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="feature-card style3">
                    <div class="feature-info">
                        <div class="feature-title">
                            <span><img src="asset/img/feature/feature-icon-2.png" alt="Image"></span>
                            <h3>Reliable Customer Service</h3>
                        </div>
                        <ul>
                            <li>We are synonymous with innovation, building excellence, superior financial
                                performance and creating role models for society.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="feature-card style3">
                    <div class="feature-info">
                        <div class="feature-title">
                            <span><img src="asset/img/feature/feature-icon-3.png" alt="Image"></span>
                            <h3>Round the Clock Banking</h3>
                        </div>
                        <ul>
                            <li>Access your personal account information with ease, transfer funds securely
                                whenever you want, wherever you want.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="why-choose-wrap style1 pb-100 bg-bunting">
    <div class="container">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6">
                <div class="wh-img-wrap">
                    <img src="asset/img/why-choose-us/wh-img-1.png" alt="Image">
                    <img class="wh-shape-one bounce" src="asset/img/why-choose-us/wh-shape-1.png" alt="Image">
                    <img class="wh-shape-two animationFramesTwo" src="asset/img/why-choose-us/wh-shape-2.png"
                        alt="Image">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="wh-content">
                    <div class="content-title style1">
                        <span>Why Choose Us</span>
                        <h2>Our Innovative Banking Products</h2>
                        <p>More than Just Business and finance.</p>
                    </div>
                    <div class="feature-item-wrap">
                        <div class="feature-item">
                            <span class="feature-icon">
                                <i class="flaticon-graph"></i>
                            </span>
                            <div class="feature-text">
                                <h3>More than Just Business and finance </h3>
                                <p>Save tomorrow today, with our high interest and low charges savings and
                                    investment accounts.</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <span class="feature-icon">
                                <i class="flaticon-loan-1"></i>
                            </span>
                            <div class="feature-text">
                                <h3>Current Account</h3>
                                <p>Much more than cheques and balances; our current account packages provide you
                                    with innovative ways to manage your money while offering you the superior
                                    banking experience for which we are renowned. </p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <span class="feature-icon">
                                <i class="flaticon-computer"></i>
                            </span>
                            <div class="feature-text">
                                <h3>Off Shore/Joint Account</h3>
                                <p>Offers you maximum interest payments on your daily account balances and
                                    minimum charges on your transactions. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="counter-wrap">
    <div class="container">
        <div class="counter-card-wrap">
            <div class="counter-card">
                <div class="counter-text">
                    <div class="counter-num">
                        <span class="odometer" data-count="5430"></span>
                    </div>
                    <p>Happy Customers</p>
                </div>
            </div>
            <div class="counter-card">
                <div class="counter-text">
                    <div class="counter-num">
                        <span class="odometer" data-count="25"></span>
                    </div>
                    <p>Years in Banking</p>
                </div>
            </div>
            <div class="counter-card">
                <div class="counter-text">
                    <div class="counter-num">
                        <span class="odometer" data-count="2597"></span>
                    </div>
                    <p>Our Branches</p>
                </div>
            </div>
            <div class="counter-card">
                <div class="counter-text">
                    <div class="counter-num">
                        <span class="odometer" data-count="40467"></span>
                    </div>
                    <p>Successful Projects</p>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="service-wrap style3 ptb-100 bg-rock">
    <div class="container">
        <img src="asset/img/service-shape-1.png" alt="Image" class="service-shape-one">
        <img src="asset/img/service-shape-2.png" alt="Image" class="service-shape-two">
        <div class="section-title style1 text-center mb-40">
            <span>Our Services</span>
            <h2 class="text-white">Get your online Banking</h2>
        </div>
        <div class="row gx-5 align-items-center">
            <div class="col-md-6">
                <div class="service-card style3">
                    <span class="service-icon">
                        <i class="flaticon-payment-method"></i>
                    </span>
                    <div class="service-info">
                        <h3><a href="service-details.html">Mobile Banking</a></h3>
                        <p>When you're ready to take your member experience to a new level, HawaiiUSA's Mobile
                            Banking enables you to manage your account, move money and more - all from your
                            smartphone or tablet using our free app. See what you can do! </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="service-card style3">
                    <span class="service-icon">
                        <i class="flaticon-computer"></i>
                    </span>
                    <div class="service-info">
                        <h3><a href="service-details.html">Online Banking</a></h3>
                        <p>When it comes to managing your personal or business accounts, you'll be able to
                            quickly pay bills, transfer money, apply for certain loans and much more through
                            First Unit bank Online Banking. </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="service-card style3">
                    <span class="service-icon">
                        <i class="flaticon-credit-card"></i>
                    </span>
                    <div class="service-info">
                        <h3><a href="service-details-2.html">Saving Account</a></h3>
                        <p>Is simply dummy text of the printing and setting type the industry's standard dummy
                            text ever since then nowpri nter took a galley alto.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="service-card style3">
                    <span class="service-icon">
                        <i class="flaticon-loan-1"></i>
                    </span>
                    <div class="service-info">
                        <h3><a href="service-details.html">Internet Banking </a></h3>
                        <p> Velmo Grand Bank Online Banking Service gives you unrestricted and secure access
                            to your account, anytime, anywhere on your computer, tablet, smart phones or any
                            internet-enabled devices. It is your bank on the go! </p>
                    </div>
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
                    <img src="asset/img/shopping/shopping-shape-1.png" alt="Image"
                        class="shopping-shape-one moveHorizontal">
                    <img src="asset/img/shopping/shopping-shape-2.png" alt="Image" class="shopping-shape-two bounce">
                    <div class="content-title style1 ">
                        <span>Online Shopping</span>
                        <h2>Shop Online, Make Online Banking Payments</h2>
                        <p> Velmo Grand Bank Bank leads the pack when it comes to Banking. Whether you’re a
                            skilled or completely new to online banking, our platforms give you the tools needed
                            to take advantage of the foreign exchange market’s volatility.</p>
                    </div>
                    <ul class="content-feature-list list-style">
                        <li><i class="ri-check-double-line"></i>Cards that work all across the world.</li>
                        <li><i class="ri-check-double-line"></i>Highest Returns on your investments.</li>
                        <li><i class="ri-check-double-line"></i>No ATM fees. No minimum balance. No overdrafts.
                        </li>
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


<section class="testimonial-wrap ptb-100  bg-albastor">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                <div class="section-title style1 text-center mb-40">
                    <span>Our Testimonials</span>
                    <h2>What Our Client Says</h2>
                </div>
            </div>
        </div>
        <div class="testimonial-slider-three owl-carousel">
            <div class="testimonial-card style3">
                <span class="quote-icon">
                    <i class="flaticon-quotation-mark"></i>
                </span>
                <p class="client-quote">I created an account just to say the customer service at this bank has
                    been top notch. Yes, you have to get past the call center to talk to actual bank employees,
                    but then the service is outstanding.</p>

                <div class="testimonial-card-thumb">
                    <div class="client-info-wrap">
                        <div class="client-img">
                            <img src="asset/img/testimonials/client-7.jpg" alt="Image">
                        </div>
                        <div class="client-info">
                            <h4>Shonda Leer</h4>
                            <span>Director, BAT</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-card style3">
                <span class="quote-icon">
                    <i class="flaticon-quotation-mark"></i>
                </span>
                <p class="client-quote">I recently opened an account with Customers Bank and their
                    representatives were extremely helpful in explaining how to use and make transactions
                    through this site. I was very impressed with their customers service team and would
                    recommend this bank for anybody who is looking for a company who has your back and best
                    interest at heart. Thank you!</p>

                <div class="testimonial-card-thumb">
                    <div class="client-info-wrap">
                        <div class="client-img">
                            <img src="asset/img/testimonials/client-1.jpg" alt="Image">
                        </div>
                        <div class="client-info">
                            <h4>Alex Cruis</h4>
                            <span>CEO, IBAC</span>
                        </div>
                    </div>
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
                    <a href="https://play.google.com/store/apps"><img src="asset/img/play-store.png" alt="Image"></a>
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
                    <img src="asset/img/goal/goal-shape-1.png" alt="Image" class="goal-shape-three bounce">
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
                        <p>With Velmo Grand Bank it’s simple to get started trading Forex, and it’s easy to
                            get the education needed to hone your skills. You’ll be able to benefit from one on
                            one support from our specialist team and develop your expertise with our
                            professional Forex trading resources and insights. For beginner and advanced traders
                            alike we offer high leverage, guaranteed stop losses on every Forex trade, and our
                            fixed spreads remain constant to give you greater strategic power and control.</p>

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


<section class="blog-wrap pt-100 pb-75 bg-albastor">
    <div class="container">
        <div class="section-title style1 text-center mb-40">
            <span>Latest Insights From Velmo Grand Bank</span>
            <h2>Our Latest Articles</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="blog-card style1">
                    <div class="blog-img">
                        <img src="asset/img/blog/blog-1.jpg" alt="Image">
                    </div>
                    <div class="blog-info">
                        <ul class="blog-metainfo  list-style">
                            <li><i class="flaticon-user"></i> <a href="posts-by-author.html">Reanne
                                    Carnation</a></li>
                            <li><i class="flaticon-calendar"></i>02 Jan, 2022</li>
                        </ul>
                        <h3><a href="blog-details-right-sidebar.html">5 Things To Know About Your Online
                                Banking</a></h3>
                        <a href="blog-details-right-sidebar.html" class="link style1">Read More
                            <i class="flaticon-right-arrow"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="blog-card style1">
                    <div class="blog-img">
                        <img src="asset/img/blog/blog-2.jpg" alt="Image">
                    </div>
                    <div class="blog-info">
                        <ul class="blog-metainfo  list-style">
                            <li><i class="flaticon-user"></i> <a href="posts-by-author.html">Phil Heath</a></li>
                            <li><i class="flaticon-calendar"></i>12 Dec, 2021</li>
                        </ul>
                        <h3><a href="blog-details-right-sidebar.html">Tips For Saving Money &amp; Better
                                Investment Policy</a></h3>
                        <a href="blog-details-right-sidebar.html" class="link style1">Read More
                            <i class="flaticon-right-arrow"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="blog-card style1">
                    <div class="blog-img">
                        <img src="asset/img/blog/blog-3.jpg" alt="Image">
                    </div>
                    <div class="blog-info">
                        <ul class="blog-metainfo  list-style">
                            <li><i class="flaticon-user"></i><a href="posts-by-author.html">Phil Heath</a></li>
                            <li><i class="flaticon-calendar"></i>12 Dec, 2021</li>
                        </ul>
                        <h3><a href="blog-details-right-sidebar.html">The Fedaral Bank Appoints New Director To
                                The Board</a></h3>
                        <a href="blog-details-right-sidebar.html" class="link style1">Read More
                            <i class="flaticon-right-arrow"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('layouts.footer')