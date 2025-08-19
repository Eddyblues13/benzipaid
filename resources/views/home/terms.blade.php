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
                        <h2>Terms Of Service</h2>
                        <ul class="breadcrumb-menu list-style">
                            <li><a href="{{url('/')}}">Home </a></li>
                            <li>Terms Of Service</li>
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


    <section class="terms-wrap ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <div class="single-terms">
                        <h3>Legal Disclaimer: </h3>
                        <p>Neither Agent nor any of the Banks shall be liable to any contractor, subcontractor,
                            architect, supplier, laborer, architect, engineer or any other party for services performed
                            or materials supplied in connection with construction of the Collateral Pool Properties.
                            Neither Agent nor any of the Banks shall be liable for any debts or claims accruing in favor
                            of any such parties against Borrower or against the Collateral Pool Properties. Borrower is
                            not or shall not be an agent of Agent or the Banks for any purposes, and neither Agent nor
                            the Banks are venture partners with Borrower in any manner whatsoever. Neither Agent nor the
                            Banks shall be deemed to be in privity of contract with any contractor, subcontractor,
                            architect or provider of services on or to the Collateral Pool Properties, nor shall any
                            payment of funds directly to a contractor, subcontractor, architect or provider of services
                            be deemed to create any third party beneficiary status or recognition of same by Agent or
                            any Bank unless and until Agent or such Bank expressly assumes such status in writing. No
                            contractor, subcontractor, architect, supplier, laborer, architect, engineer or other party
                            shall be deemed to be a third party beneficiary of this Agreement or any of the Loan
                            Documents. Approvals granted by Agent or the Banks for any matters covered under this
                            Agreement shall be narrowly construed to cover only the parties and facts identified in any
                            written approval or, if not in writing, such approvals shall be solely for the benefit of
                            Borrower.</p>
                    </div>



                    <div class="single-terms">
                        <h3> Accounts, Passwords and Security</h3>
                        <p>Here are some useful tips to for creating strong passwords and keeping your information
                            secure. Use a unique password for each of your important accounts (i.e. email and online
                            banking). Do not use the same password across multiple accounts. Your password should be at
                            least 8 characters long.</p>
                        <p>Protect all your saved passwords with built-in security.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

@include('layouts.footer')