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
                        <h2>Contact Us</h2>
                        <ul class="breadcrumb-menu list-style">
                            <li><a href="{{url('/')}}">Home </a></li>
                            <li>Contact</li>
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


    <section class="contact-wrap pt-100">
        <div class="container">
            <div class="row justify-content-center pb-75">
                <div class="col-lg-4 col-md-6">
                    <div class="contact-item">
                        <span class="contact-icon">
                            <i class="flaticon-location"></i>
                        </span>
                        <div class="contact-info">
                            <h3>Address</h3>
                            <p>
                                23-290 Jameson St, Hull, UK
                            </p>
                            <br>
                            <h3>Branch Address</h3>
                            <p>
                                Bank Road 34 \55 UMRANIYE / Turkey ISTANBUL SUBESI, Turkiye branch
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact-item">
                        <span class="contact-icon">
                            <i class="flaticon-email-2"></i>
                        </span>
                        <div class="contact-info">
                            <h3>Email Us</h3>
                            <a
                                href="cdn-cgi/l/email-protection.html#75060005051a0701351210181a071c121c1b17141b1e5b161a18"><span
                                    class="__cf_email__"
                                    data-cfemail="51222421213e23251136343c3e233836383f33303f3a7f323e3c">[email&#160;protected]</span></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact-item">
                        <span class="contact-icon">
                            <i class="flaticon-phone-call"></i>
                        </span>
                        <div class="contact-info">
                            <h3>Call us</h3>
                            <a href="{{url('/')}}">+44</a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="comp-map pb-100">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9437.961574661605!2d-0.34947493022460935!3d53.74515049999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4878be24f3b00c3f%3A0x97951841cfe5d6e7!2s23%20Jameson%20St%2C%20Hull%20HU1%203HR%2C%20UK!5e0!3m2!1sen!2sng!4v1687943914691!5m2!1sen!2sng"></iframe>


            </div>
        </div>
        <div class="contact-form-area ptb-100 bg-albastor">
            <img src="asset/img/contact-shape-1.png" alt="Image" class="contact-shape-one animationFramesTwo">
            <img src="asset/img/contact-shape-2.png" alt="Image" class="contact-shape-two bounce">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1">
                        <div class="content-title style1 text-center mb-40">
                            <span>Send Us A Message</span>
                            <h2>Do You have Any Questions?</h2>
                        </div>
                        <div class="contact-form">
                            <form class="form-wrap" id="contactForm">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="name" placeholder="Your Name*" id="name" required
                                                data-error="Please enter your name">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" required
                                                placeholder="Your Email*" data-error="Please enter your email*">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="number" name="phone" id="phone" required
                                                placeholder="Phone Number" data-error="Please enter your phone number">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="msg_subject" placeholder="Subject" id="msg_subject"
                                                required data-error="Please enter your subject">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group v1">
                                            <textarea name="message" id="message" placeholder="Your Messages.."
                                                cols="30" rows="10" required
                                                data-error="Please enter your message"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn style1 w-100 d-block">Send Message </button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

@include('layouts.footer')