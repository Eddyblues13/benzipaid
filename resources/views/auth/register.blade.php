<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> Velmo Grand Bank| ACCOUNT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">

    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
</head>
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-6">
                <div class="card overflow-hidden">
                    <div class="bg-primary bg-soft">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-4">
                                    <h5 class="text-primary">Free Register</h5>
                                    <p>Get your free Velmo Grand Bankaccount now.</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div>
                            <a>
                                <div class="avatar-md profile-user-wid mb-4">
                                    <span class="avatar-title rounded-circle bg-light">
                                        <img src="assets/images/logo.svg" alt="" class="rounded-circle" height="34">
                                    </span>
                                </div>
                            </a>
                        </div>
                        <div class="p-2">
                            <form method="POST" action="{{ route('register') }}" id="regester" class="needs-validation"
                                novalidate>
                                @csrf

                                <!-- Honeypot field -->
                                <input type="text" name="honeypot" style="display:none;">
                                <!-- Timestamp field -->
                                <input type="hidden" name="timestamp" value="{{ now()->timestamp }}">

                                <div class="mb-3">
                                    <label for="username" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="fullname" name="first_name"
                                        placeholder="Enter First Name">
                                    @if ($errors->has('first_name'))
                                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="username" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="fullname" name="last_name"
                                        placeholder="Enter Last Name">
                                    @if ($errors->has('last_name'))
                                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="username" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        placeholder="Enter email">
                                    @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="useremail" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="Enter Address" required>
                                    <div class="invalid-feedback">
                                        Please Enter Address
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="useremail" class="form-label">Mobile Number</label>
                                    <input type="tel" class="form-control" id="phone" name="phone"
                                        placeholder="Enter mobile Number" required>
                                    <div class="invalid-feedback">
                                        Please Enter mobile Number
                                    </div>
                                </div>

                                <div class="md-3">
                                    <div class="form-floating mb-2">
                                        <select class="form-select" id="country" name="country"
                                            aria-label="Floating label select example" required>
                                            <option value="">select</option>
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Aland Islands">Aland Islands</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="American Samoa">American Samoa</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Anguilla">Anguilla</option>
                                            <option value="Antarctica">Antarctica</option>
                                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Aruba">Aruba</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Austria">Austria</option>
                                            <option value="Azerbaijan">Azerbaijan</option>
                                            <option value="Bahamas">Bahamas</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Belarus">Belarus</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Belize">Belize</option>
                                            <option value="Benin">Benin</option>
                                            <option value="Bermuda">Bermuda</option>
                                            <option value="Bhutan">Bhutan</option>
                                            <option value="Bolivia">Bolivia</option>
                                            <option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and
                                                Saba</option>
                                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                            <option value="Botswana">Botswana</option>
                                            <option value="Bouvet Island">Bouvet Island</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="British Indian Ocean Territory">British Indian Ocean
                                                Territory</option>
                                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                                            <option value="Bulgaria">Bulgaria</option>
                                            <option value="Burkina Faso">Burkina Faso</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Cambodia">Cambodia</option>
                                            <option value="Cameroon">Cameroon</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Cape Verde">Cape Verde</option>
                                            <option value="Cayman Islands">Cayman Islands</option>
                                            <option value="Central African Republic">Central African Republic</option>
                                            <option value="Chad">Chad</option>
                                            <option value="Chile">Chile</option>
                                            <option value="China">China</option>
                                            <option value="Christmas Island">Christmas Island</option>
                                            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="Comoros">Comoros</option>
                                            <option value="Congo">Congo</option>
                                            <option value="Congo, Democratic Republic of the Congo">Congo, Democratic
                                                Republic of the Congo</option>
                                            <option value="Cook Islands">Cook Islands</option>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="Cote D'Ivoire">Cote D'Ivoire</option>
                                            <option value="Croatia">Croatia</option>
                                            <option value="Cuba">Cuba</option>
                                            <option value="Curacao">Curacao</option>
                                            <option value="Cyprus">Cyprus</option>
                                            <option value="Czech Republic">Czech Republic</option>
                                            <option value="Denmark">Denmark</option>
                                            <option value="Djibouti">Djibouti</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="Dominican Republic">Dominican Republic</option>
                                            <option value="Ecuador">Ecuador</option>
                                            <option value="Egypt">Egypt</option>
                                            <option value="El Salvador">El Salvador</option>
                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option value="Eritrea">Eritrea</option>
                                            <option value="Estonia">Estonia</option>
                                            <option value="Ethiopia">Ethiopia</option>
                                            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)
                                            </option>
                                            <option value="Faroe Islands">Faroe Islands</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Finland">Finland</option>
                                            <option value="France">France</option>
                                            <option value="French Guiana">French Guiana</option>
                                            <option value="French Polynesia">French Polynesia</option>
                                            <option value="French Southern Territories">French Southern Territories
                                            </option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="Gambia">Gambia</option>
                                            <option value="Georgia">Georgia</option>
                                            <option value="Germany">Germany</option>
                                            <option value="Ghana">Ghana</option>
                                            <option value="Gibraltar">Gibraltar</option>
                                            <option value="Greece">Greece</option>
                                            <option value="Greenland">Greenland</option>
                                            <option value="Grenada">Grenada</option>
                                            <option value="Guadeloupe">Guadeloupe</option>
                                            <option value="Guam">Guam</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="Guernsey">Guernsey</option>
                                            <option value="Guinea">Guinea</option>
                                            <option value="Guinea-Bissau">Guinea-Bissau</option>
                                            <option value="Guyana">Guyana</option>
                                            <option value="Haiti">Haiti</option>
                                            <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald
                                                Islands</option>
                                            <option value="Holy See (Vatican City State)">Holy See (Vatican City State)
                                            </option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="Hong Kong">Hong Kong</option>
                                            <option value="Hungary">Hungary</option>
                                            <option value="Iceland">Iceland</option>
                                            <option value="India">India</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                            <option value="Iraq">Iraq</option>
                                            <option value="Ireland">Ireland</option>
                                            <option value="Isle of Man">Isle of Man</option>
                                            <option value="Israel">Israel</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Jamaica">Jamaica</option>
                                            <option value="Japan">Japan</option>
                                            <option value="Jersey">Jersey</option>
                                            <option value="Jordan">Jordan</option>
                                            <option value="Kazakhstan">Kazakhstan</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Kiribati">Kiribati</option>
                                            <option value="Korea, Democratic People's Republic of">Korea, Democratic
                                                People's Republic of</option>
                                            <option value="Korea, Republic of">Korea, Republic of</option>
                                            <option value="Kosovo">Kosovo</option>
                                            <option value="Kuwait">Kuwait</option>
                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                            <option value="Lao People's Democratic Republic">Lao People's Democratic
                                                Republic</option>
                                            <option value="Latvia">Latvia</option>
                                            <option value="Lebanon">Lebanon</option>
                                            <option value="Lesotho">Lesotho</option>
                                            <option value="Liberia">Liberia</option>
                                            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                            <option value="Liechtenstein">Liechtenstein</option>
                                            <option value="Lithuania">Lithuania</option>
                                            <option value="Luxembourg">Luxembourg</option>
                                            <option value="Macao">Macao</option>
                                            <option value="Macedonia, the Former Yugoslav Republic of">Macedonia, the
                                                Former Yugoslav Republic of</option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Malawi">Malawi</option>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="Maldives">Maldives</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Malta">Malta</option>
                                            <option value="Marshall Islands">Marshall Islands</option>
                                            <option value="Martinique">Martinique</option>
                                            <option value="Mauritania">Mauritania</option>
                                            <option value="Mauritius">Mauritius</option>
                                            <option value="Mayotte">Mayotte</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Micronesia, Federated States of">Micronesia, Federated States
                                                of</option>
                                            <option value="Moldova, Republic of">Moldova, Republic of</option>
                                            <option value="Monaco">Monaco</option>
                                            <option value="Mongolia">Mongolia</option>
                                            <option value="Montenegro">Montenegro</option>
                                            <option value="Montserrat">Montserrat</option>
                                            <option value="Morocco">Morocco</option>
                                            <option value="Mozambique">Mozambique</option>
                                            <option value="Myanmar">Myanmar</option>
                                            <option value="Namibia">Namibia</option>
                                            <option value="Nauru">Nauru</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="Netherlands">Netherlands</option>
                                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                                            <option value="New Caledonia">New Caledonia</option>
                                            <option value="New Zealand">New Zealand</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Niger">Niger</option>
                                            <option value="Nigeria">Nigeria</option>
                                            <option value="Niue">Niue</option>
                                            <option value="Norfolk Island">Norfolk Island</option>
                                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                            <option value="Norway">Norway</option>
                                            <option value="Oman">Oman</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="Palau">Palau</option>
                                            <option value="Palestinian Territory, Occupied">Palestinian Territory,
                                                Occupied</option>
                                            <option value="Panama">Panama</option>
                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                            <option value="Paraguay">Paraguay</option>
                                            <option value="Peru">Peru</option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="Pitcairn">Pitcairn</option>
                                            <option value="Poland">Poland</option>
                                            <option value="Portugal">Portugal</option>
                                            <option value="Puerto Rico">Puerto Rico</option>
                                            <option value="Qatar">Qatar</option>
                                            <option value="Reunion">Reunion</option>
                                            <option value="Romania">Romania</option>
                                            <option value="Russian Federation">Russian Federation</option>
                                            <option value="Rwanda">Rwanda</option>
                                            <option value="Saint Barthelemy">Saint Barthelemy</option>
                                            <option value="Saint Helena">Saint Helena</option>
                                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                            <option value="Saint Lucia">Saint Lucia</option>
                                            <option value="Saint Martin">Saint Martin</option>
                                            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                            <option value="Saint Vincent and the Grenadines">Saint Vincent and the
                                                Grenadines</option>
                                            <option value="Samoa">Samoa</option>
                                            <option value="San Marino">San Marino</option>
                                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="Senegal">Senegal</option>
                                            <option value="Serbia">Serbia</option>
                                            <option value="Serbia and Montenegro">Serbia and Montenegro</option>
                                            <option value="Seychelles">Seychelles</option>
                                            <option value="Sierra Leone">Sierra Leone</option>
                                            <option value="Singapore">Singapore</option>
                                            <option value="Sint Maarten">Sint Maarten</option>
                                            <option value="Slovakia">Slovakia</option>
                                            <option value="Slovenia">Slovenia</option>
                                            <option value="Solomon Islands">Solomon Islands</option>
                                            <option value="Somalia">Somalia</option>
                                            <option value="South Africa">South Africa</option>
                                            <option value="South Georgia and the South Sandwich Islands">South Georgia
                                                and the South Sandwich Islands</option>
                                            <option value="South Sudan">South Sudan</option>
                                            <option value="Spain">Spain</option>
                                            <option value="Sri Lanka">Sri Lanka</option>
                                            <option value="Sudan">Sudan</option>
                                            <option value="Suriname">Suriname</option>
                                            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                            <option value="Swaziland">Swaziland</option>
                                            <option value="Sweden">Sweden</option>
                                            <option value="Switzerland">Switzerland</option>
                                            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                            <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                            <option value="Tajikistan">Tajikistan</option>
                                            <option value="Tanzania, United Republic of">Tanzania, United Republic of
                                            </option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Timor-Leste">Timor-Leste</option>
                                            <option value="Togo">Togo</option>
                                            <option value="Tokelau">Tokelau</option>
                                            <option value="Tonga">Tonga</option>
                                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                            <option value="Tunisia">Tunisia</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Turkmenistan">Turkmenistan</option>
                                            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                            <option value="Tuvalu">Tuvalu</option>
                                            <option value="Uganda">Uganda</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="United States">United States</option>
                                            <option value="United States Minor Outlying Islands">United States Minor
                                                Outlying Islands</option>
                                            <option value="Uruguay">Uruguay</option>
                                            <option value="Uzbekistan">Uzbekistan</option>
                                            <option value="Vanuatu">Vanuatu</option>
                                            <option value="Venezuela">Venezuela</option>
                                            <option value="Viet Nam">Viet Nam</option>
                                            <option value="Virgin Islands, British">Virgin Islands, British</option>
                                            <option value="Virgin Islands, U.s.">Virgin Islands, U.s.</option>
                                            <option value="Wallis and Futuna">Wallis and Futuna</option>
                                            <option value="Western Sahara">Western Sahara</option>
                                            <option value="Yemen">Yemen</option>
                                            <option value="Zambia">Zambia</option>
                                            <option value="Zimbabwe">Zimbabwe</option>
                                        </select>
                                        <label for="floatingSelectGrid">Country</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating mb-2">
                                        <select class="form-select" id="acc_type" name="account_type"
                                            aria-label="Floating label select example" required>
                                            <option selected>select</option>
                                            <option value="Savings">Savings</option>
                                            <option value="Checking">Checking</option>
                                        </select>
                                        <label for="floatingSelectGrid">Account Type</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating mb-2">
                                        <select class="form-select" id="currency" name="currency"
                                            aria-label="Floating label select example" required>
                                            <option>select</option>
                                            <option value='Afghanistan'>Afghanistan (؋)</option>
                                            <option value='Albania'>Albania (Lek)</option>
                                            <option value='Algeria'>Algeria (دج)</option>
                                            <option value='American Samoa'>American Samoa ($)</option>
                                            <option value='Andorra'>Andorra (€)</option>
                                            <option value='Angola'>Angola (Kz)</option>
                                            <option value='Anguilla'>Anguilla ($)</option>
                                            <option value='Antarctica'>Antarctica ($)</option>
                                            <option value='Antigua and Barbuda'>Antigua and Barbuda ($)</option>
                                            <option value='Argentina'>Argentina ($)</option>
                                            <option value='Armenia'>Armenia (֏)</option>
                                            <option value='Aruba'>Aruba (ƒ)</option>
                                            <option value='Australia'>Australia ($)</option>
                                            <option value='Austria'>Austria (€)</option>
                                            <option value='Azerbaijan'>Azerbaijan (AZN)</option>
                                            <option value='Bahamas'>Bahamas ($)</option>
                                            <option value='Bahrain'>Bahrain (د.)</option>
                                            <option value='Bangladesh'>Bangladesh (ó)</option>
                                            <option value='Barbados'>Barbados ($)</option>
                                            <option value='Belarus'>Belarus (Br)</option>
                                            <option value='Belgium'>Belgium (€)</option>
                                            <option value='Belize'>Belize ($)</option>
                                            <option value='Benin'>Benin (CFA)</option>
                                            <option value='Bermuda'>Bermuda ($)</option>
                                            <option value='Bhutan'>Bhutan (Nu)</option>
                                            <option value='Bolivia'>Bolivia (Bs)</option>
                                            <option value='Bosnia and Herzegovina'>Bosnia and Herzegovina (KM)</option>
                                            <option value='Botswana'>Botswana (P)</option>
                                            <option value='Bouvet Island'>Bouvet Island (kr)</option>
                                            <option value='Brazil'>Brazil (R$)</option>
                                            <option value='British Indian Ocean Territory'>British Indian Ocean
                                                Territory ($)</option>
                                            <option value='Brunei Darussalam'>Brunei Darussalam (B$)</option>
                                            <option value='Bulgaria'>Bulgaria (Лв.)</option>
                                            <option value='Burkina Faso'>Burkina Faso (CFA)</option>
                                            <option value='Burundi'>Burundi (FBu)</option>
                                            <option value='Cambodia'>Cambodia (៛)</option>
                                            <option value='Cameroon'>Cameroon (FCFA)</option>
                                            <option value='Canada'>Canada ($)</option>
                                            <option value='Cape Verde'>Cape Verde ($)</option>
                                            <option value='Cayman Islands'>Cayman Islands ($)</option>
                                            <option value='Central African Republic'>Central African Republic (FCFA)
                                            </option>
                                            <option value='Chad'>Chad (FCFA)</option>
                                            <option value='Chile'>Chile ($)</option>
                                            <option value='China'>China (¥)</option>
                                            <option value='Christmas Island'>Christmas Island ($)</option>
                                            <option value='Cocos (Keeling) Islands'>Cocos (Keeling) Islands ($)</option>
                                            <option value='Colombia'>Colombia ($)</option>
                                            <option value='Comoros'>Comoros (CF)</option>
                                            <option value='Congo'>Congo (FC)</option>
                                            <option value='Democratic Republic of the Congo'>Democratic Republic of the
                                                Congo (FC)</option>
                                            <option value='Cook Islands'>Cook Islands ($)</option>
                                            <option value='Costa Rica'>Costa Rica (₡)</option>
                                            <option value="Cote D'Ivoire">Cote D'Ivoire (CFA)</option>
                                            <option value='Croatia'>Croatia (Kn)</option>
                                            <option value='Cuba'>Cuba ($)</option>
                                            <option value='Cyprus'>Cyprus (€)</option>
                                            <option value='Czech Republic'>Czech Republic (Kč)</option>
                                            <option value='Denmark'>Denmark (kr)</option>
                                            <option value='Djibouti'>Djibouti (Fdj)</option>
                                            <option value='Dominica'>Dominica ($)</option>
                                            <option value='Dominican Republic'>Dominican Republic (RD$)</option>
                                            <option value='Ecuador'>Ecuador (S/.)</option>
                                            <option value='Egypt'>Egypt (E£)</option>
                                            <option value='El Salvador'>El Salvador (₡)</option>
                                            <option value='Equatorial Guinea'>Equatorial Guinea (FCFA)</option>
                                            <option value='Eritrea'>Eritrea (Nkf)</option>
                                            <option value='Estonia'>Estonia (kr)</option>
                                            <option value='Ethiopia'>Ethiopia (Br)</option>
                                            <option value='Falkland Islands (Malvinas)'>Falkland Islands (Malvinas) (£)
                                            </option>
                                            <option value='Faroe Islands'>Faroe Islands (kr)</option>
                                            <option value='Fiji'>Fiji (FJ$)</option>
                                            <option value='Finland'>Finland (mk)</option>
                                            <option value='France'>France (€)</option>
                                            <option value='French Guiana'>French Guiana (€)</option>
                                            <option value='French Polynesia'>French Polynesia (F)</option>
                                            <option value='French Southern Territories'>French Southern Territories (€)
                                            </option>
                                            <option value='Gabon'>Gabon (FCFA)</option>
                                            <option value='Gambia'>Gambia (D)</option>
                                            <option value='Georgia'>Georgia (GEL)</option>
                                            <option value='Germany'>Germany (€)</option>
                                            <option value='Ghana'>Ghana (GH₵)</option>
                                            <option value='Gibraltar'>Gibraltar (£)</option>
                                            <option value='Greece'>Greece (€)</option>
                                            <option value='Greenland'>Greenland (Kr.)</option>
                                            <option value='Grenada'>Grenada ($)</option>
                                            <option value="Great Britain">Great Britain (£)</option>
                                            <option value='Guadeloupe'>Guadeloupe (€)</option>
                                            <option value='Guam'>Guam ($)</option>
                                            <option value='Guatemala'>Guatemala (Q)</option>
                                            <option value='Guernsey'>Guernsey (£)</option>
                                            <option value='Guinea'>Guinea (FG)</option>
                                            <option value='Guinea-Bissau'>Guinea-Bissau (CFA)</option>
                                            <option value='Guyana'>Guyana (G$)</option>
                                            <option value='Haiti'>Haiti (G)</option>
                                            <option value='Heard Island and McDonald Islands'>Heard Island and McDonald
                                                Islands ($)</option>
                                            <option value='Holy See (Vatican City State)'>Holy See (Vatican City State)
                                                (₤)</option>
                                            <option value='Honduras'>Honduras (HNL)</option>
                                            <option value='Hong Kong'>Hong Kong (HK$)</option>
                                            <option value='Hungary'>Hungary (Ft)</option>
                                            <option value='Iceland'>Iceland (kr)</option>
                                            <option value='India'>India (₹)</option>
                                            <option value='Indonesia'>Indonesia (Rp)</option>
                                            <option value='Islamic Republic of Iran'>Islamic Republic of Iran (IRR)
                                            </option>
                                            <option value='Iraq'>Iraq (د.ع)</option>
                                            <option value='Ireland'>Ireland (€)</option>
                                            <option value='Isle of Man'>Isle of Man (£)</option>
                                            <option value='Israel'>Israel (₪)</option>
                                            <option value='Italy'>Italy (€)</option>
                                            <option value='Jamaica'>Jamaica (J$)</option>
                                            <option value='Japan'>Japan (¥)</option>
                                            <option value='Jersey'>Jersey (£)</option>
                                            <option value='Jordan'>Jordan (د.ا)</option>
                                            <option value='Kazakhstan'>Kazakhstan (₸)</option>
                                            <option value='Kenya'>Kenya (KSh)</option>
                                            <option value='Kiribati'>Kiribati ($)</option>
                                            <option value="Democratic People's Republic of Korea">Democratic People's
                                                Republic of Korea (₩)</option>
                                            <option value='Republic of Korea'>Republic of Korea (₩)</option>
                                            <option value='Kuwait'>Kuwait (د.ك)</option>
                                            <option value='Kyrgyzstan'>Kyrgyzstan (лв)</option>
                                            <option value="Lao People's Democratic Republic">Lao People's Democratic
                                                Republic (₭)</option>
                                            <option value='Latvia'>Latvia (LVL)</option>
                                            <option value='Lebanon'>Lebanon (ل.ل)</option>
                                            <option value='Lesotho'>Lesotho (L)</option>
                                            <option value='Liberia'>Liberia (L$)</option>
                                            <option value='Libyan Arab Jamahiriya'>Libyan Arab Jamahiriya (LD)</option>
                                            <option value='Liechtenstein'>Liechtenstein (CHF)</option>
                                            <option value='Lithuania'>Lithuania (Lt)</option>
                                            <option value='Luxembourg'>Luxembourg (€)</option>
                                            <option value='Macao'>Macao (MOP$)</option>
                                            <option value='The Former Yugoslav Republic of Macedonia'>The Former
                                                Yugoslav Republic of Macedonia (den)</option>
                                            <option value='Madagascar'>Madagascar (Ar)</option>
                                            <option value='Malawi'>Malawi (K)</option>
                                            <option value='Malaysia'>Malaysia (RM)</option>
                                            <option value='Maldives'>Maldives (Rf)</option>
                                            <option value='Mali'>Mali (MAF)</option>
                                            <option value='Malta'>Malta (€)</option>
                                            <option value='Marshall Islands'>Marshall Islands ($)</option>
                                            <option value='Martinique'>Martinique (€)</option>
                                            <option value='Mauritania'>Mauritania (MRU</option>
                                            <option value='Mauritius'>Mauritius (₨)</option>
                                            <option value='Mayotte'>Mayotte (€)</option>
                                            <option value='Mexico'>Mexico ($)</option>
                                            <option value='Federated States of Micronesia'>Federated States of
                                                Micronesia ($)</option>
                                            <option value='Republic of Moldova'>Republic of Moldova (L)</option>
                                            <option value='Monaco'>Monaco (€)</option>
                                            <option value='Mongolia'>Mongolia (₮)</option>
                                            <option value='Montenegro'>Montenegro (€)</option>
                                            <option value='Montserrat'>Montserrat ($)</option>
                                            <option value='Morocco'>Morocco (MAD)</option>
                                            <option value='Mozambique'>Mozambique (MT)</option>
                                            <option value='Myanmar'>Myanmar (K)</option>
                                            <option value='Namibia'>Namibia (N$)</option>
                                            <option value='Nauru'>Nauru ($)</option>
                                            <option value='Nepal'>Nepal (Rs)</option>
                                            <option value='Netherlands'>Netherlands (ANG)</option>
                                            <option value='Netherlands Antilles'>Netherlands Antilles (NAf)</option>
                                            <option value='New Caledonia'>New Caledonia (F)</option>
                                            <option value='New Zealand'>New Zealand ($)</option>
                                            <option value='Nicaragua'>Nicaragua (C$)</option>
                                            <option value='Niger'>Niger (XOF)</option>
                                            <option value='Nigeria'>Nigeria (₦)</option>
                                            <option value='Niue'>Niue ($)</option>
                                            <option value='Norfolk Island'>Norfolk Island ($)</option>
                                            <option value='Northern Mariana Islands'>Northern Mariana Islands ($)
                                            </option>
                                            <option value='Norway'>Norway (kr)</option>
                                            <option value='Oman'>Oman (ر.ع.)</option>
                                            <option value='Pakistan'>Pakistan (₨)</option>
                                            <option value='Palau'>Palau ($)</option>
                                            <option value='Occupied Palestinian Territory'>Occupied Palestinian
                                                Territory ($)</option>
                                            <option value='Panama'>Panama (B/)</option>
                                            <option value='Papua New Guinea'>Papua New Guinea (K)</option>
                                            <option value='Paraguay'>Paraguay (₲)</option>
                                            <option value='Peru'>Peru (S/)</option>
                                            <option value='Philippines'>Philippines (₱)</option>
                                            <option value='Pitcairn'>Pitcairn ($)</option>
                                            <option value='Poland'>Poland (zł)</option>
                                            <option value='Portugal'>Portugal (€)</option>
                                            <option value='Puerto Rico'>Puerto Rico ($)</option>
                                            <option value='Qatar'>Qatar (QR)</option>
                                            <option value='Reunion'>Reunion (€)</option>
                                            <option value='Romania'>Romania (lei)</option>
                                            <option value='Russian Federation'>Russian Federation (₽)</option>
                                            <option value='Rwanda'>Rwanda (FRw)</option>
                                            <option value='Saint Barthélemy'>Saint Barthélemy (€)</option>
                                            <option value='Saint Helena'>Saint Helena (£)</option>
                                            <option value='Saint Kitts and Nevis'>Saint Kitts and Nevis ($)</option>
                                            <option value='Saint Lucia'>Saint Lucia ($)</option>
                                            <option value='Saint Martin'>Saint Martin (ƒ)</option>
                                            <option value='Saint Pierre and Miquelon'>Saint Pierre and Miquelon (€)
                                            </option>
                                            <option value='Saint Vincent and the Grenadines'>Saint Vincent and the
                                                Grenadines (X$)</option>
                                            <option value='Samoa'>Samoa ($)</option>
                                            <option value='San Marino'>San Marino (€)</option>
                                            <option value='Sao Tome and Principe'>Sao Tome and Principe (Db)</option>
                                            <option value='Saudi Arabia'>Saudi Arabia (﷼)</option>
                                            <option value='Senegal'>Senegal (CFA)</option>
                                            <option value='Serbia'>Serbia (din)</option>
                                            <option value='Seychelles'>Seychelles (SCR)</option>
                                            <option value='Sierra Leone'>Sierra Leone (Le)</option>
                                            <option value='Singapore'>Singapore (S$)</option>
                                            <option value='Slovakia'>Slovakia (SKK)</option>
                                            <option value='Slovenia'>Slovenia (€)</option>
                                            <option value='Solomon Islands'>Solomon Islands (Si$)</option>
                                            <option value='Somalia'>Somalia (Sh.so.)</option>
                                            <option value='South Africa'>South Africa (R)</option>
                                            <option value='South Georgia and the South Sandwich Islands'>South Georgia
                                                and the South Sandwich Islands (£)</option>
                                            <option value='Spain'>Spain (€)</option>
                                            <option value='Sri Lanka'>Sri Lanka (Rs)</option>
                                            <option value='Sudan'>Sudan (£SD)</option>
                                            <option value='Suriname'>Suriname ($)</option>
                                            <option value='Svalbard and Jan Mayen'>Svalbard and Jan Mayen (kr)</option>
                                            <option value='Swaziland'>Swaziland (L)</option>
                                            <option value='Sweden'>Sweden (kr)</option>
                                            <option value='Switzerland'>Switzerland (CHf)</option>
                                            <option value='Syrian Arab Republic'>Syrian Arab Republic (LS)</option>
                                            <option value='Taiwan, Province Of China'>Taiwan, Province Of China (NT$)
                                            </option>
                                            <option value='Tajikistan'>Tajikistan (SM)</option>
                                            <option value='United Republic of Tanzania'>United Republic of Tanzania
                                                (TSh)</option>
                                            <option value='Thailand'>Thailand (฿))</option>
                                            <option value='Timor-Leste'>Timor-Leste ($)</option>
                                            <option value='Togo'>Togo (CFA)</option>
                                            <option value='Tokelau'>Tokelau ($)</option>
                                            <option value='Tonga'>Tonga (T$)</option>
                                            <option value='Trinidad and Tobago'>Trinidad and Tobago (TT$)</option>
                                            <option value='Tunisia'>Tunisia (د.ت)</option>
                                            <option value='Turkey'>Turkey (₺)</option>
                                            <option value='Turkmenistan'>Turkmenistan (T)</option>
                                            <option value='Turks and Caicos Islands'>Turks and Caicos Islands ($)
                                            </option>
                                            <option value='Tuvalu'>Tuvalu ($)</option>
                                            <option value='Uganda'>Uganda (USh)</option>
                                            <option value='Ukraine'>Ukraine (₴)</option>
                                            <option value='United Arab Emirates'>United Arab Emirates (د.إ)</option>
                                            <option value='United Kingdom'>United Kingdom (£)</option>
                                            <option value='United States'>United States ($)</option>
                                            <option value='United States Minor Outlying Islands'>United States Minor
                                                Outlying Islands ($)</option>
                                            <option value='Uruguay'>Uruguay ($)</option>
                                            <option value='Uzbekistan'>Uzbekistan (лв)</option>
                                            <option value='Vanuatu'>Vanuatu (VT)</option>
                                            <option value='Venezuela'>Venezuela (Bs.)</option>
                                            <option value='Vietnam'>Vietnam (₫)</option>
                                            <option value='British, Virgin Islands'>British, Virgin Islands ($)</option>
                                            <option value='U.S., Virgin Islands'>U.S., Virgin Islands ($)</option>
                                            <option value='Wallis And Futuna'>Wallis And Futuna (Fr)</option>
                                            <option value='Western Sahara'>Western Sahara (د.م.)</option>
                                            <option value='Yemen'>Yemen (﷼)</option>
                                            <option value='Zambia'>Zambia (ZK)</option>
                                            <option value='Zimbabwe'>Zimbabwe (Z$)</option>
                                        </select>
                                        <label for="floatingSelectGrid">Account Currency</label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <div class="input-group auth-pass-inputgroup">
                                        <input type="password" class="form-control" placeholder="Enter password"
                                            aria-label="Password" aria-describedby="password-addon" id="password"
                                            name="password">
                                        @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                        <button class="btn btn-light " type="button" id="password-addon"><i
                                                class="mdi mdi-eye-outline"></i></button>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Re-Type Password</label>
                                    <div class="input-group auth-pass-inputgroup">
                                        <input type="password" class="form-control" placeholder="Enter password"
                                            aria-label="Password" aria-describedby="password-addon1" id="password2"
                                            name="password_confirmation">
                                        <button class="btn btn-light " type="button" id="password-addon1"><i
                                                class="mdi mdi-eye-outline"></i></button>
                                    </div>
                                </div>




                                <div class="mt-4 d-grid">
                                    <button class="btn btn-primary waves-effect waves-light" onclick='create(this)'
                                        type="submit" id="div">Register</button>
                                </div><br>
                                <p class="response"></p>

                                <div class="mt-4 text-center">
                                    <p class="mb-0">By registering you agree to the Velmo Grand Banktb <a href="#"
                                            class="text-primary">Terms of Use</a></p>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="mt-5 text-center">

                    <div>
                        <p>Already have an account ? <a href="login" class="fw-medium text-primary"> Login</a> </p>
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


<script src="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<div class="position-fixed top-0 end-0 p-2" style="z-index: 1005">
    <div id="ErrorToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="https://globaltb.online/user/logo.png" alt="" class="me-2" height="18">
            <strong class="me-auto">Error</strong>
            <small>Now..</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" style="background-color:red;">

        </div>
    </div>
</div>
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

</body>

</html>

<script>
    function create(id) {
        id.innerHTML = "submitting request...";
        $("#div").fadeOut(1000);
        setTimeout(function() {
            $('#div').show();
            id.innerHTML = "Register";
        }, 2000);
    }
</script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('#regester').on('submit', function(e) {
            e.preventDefault();

            var fullname = $('#fullname').val();
            var email = $('#email').val();

            var password = $('#password').val();
    


            if (fullname == "" || email == "" password == "") {
                $(".toast-body").html('Enter all field');
                $("#ErrorToast").toast("show");
                return false;
            }

            if (password.length < 5 || password2.length < 5) {
                $(".toast-body").html('Enter A Stronger Password !');
                $("#ErrorToast").toast("show");
                $("#password, $password2").val('');
                return false;
            }


            if (password != password2) {
                $(".toast-body").html('Password mismatched Check And Try Again!');
                $("#ErrorToast").toast("show");
                $("#pin_two").val('');
                return false;
            }

            $.ajax({
                type: "POST",
                url: "{{ route('register.custom') }}",
                data: $(this).serialize(),
                dataType: "json",
                success: function(data) {
                    $(".response").html(data.content);
                    if (data.content == 'successful') {
                        $(".response").html(data.content);
                        window.location = data.redirect;
                    } else
                    if (data.content == 'Error') {
                        $(".response").html(data.content);
                    }
                },
                error: function(data, errorThrown) {
                    Swal.fire('The Internet?', 'Check network connection!', 'question');
                }
            });

        });
    });
</script>