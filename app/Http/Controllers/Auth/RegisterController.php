<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Mail\VerificationEmail;
use App\Mail\OtpMail;
use App\Http\Controllers\Controller;
use App\Mail\otpEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/user/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        
         // Check honeypot field
    if (!empty($data['honeypot'])) {
        abort(403, 'Bot detected!');
    }

    // Check timestamp (submission must take at least 3 seconds)
    if (isset($data['timestamp']) && (now()->timestamp - $data['timestamp']) < 3) {
        abort(403, 'Submission too fast!');
    }
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        
        
        $accountNumber = rand(1645566556, 5575755768);
        $validToken = rand(7650, 1234);


        $validToken = rand(7650, 1234);


        if ($data['country'] == "Afghanistan") {
            $currency = '؋';
        } else if ($data['country'] == "Albania") {
            $currency = 'Lek';
        } else if ($data['country'] == "Algeria") {
            $currency = 'دج';
        } else if ($data['country'] == "American Samoa") {
            $currency = '$';
        } else if ($data['country'] == "Andorra") {
            $currency = '€';
        } else if ($data['country'] == "Angola") {
            $currency = 'Kz';
        } else if ($data['country'] == "Anguilla") {
            $currency = '$';
        } else if ($data['country'] == "Antarctica") {
            $currency = '$';
        } else if ($data['country'] == "Antigua and Barbuda") {
            $currency = '$';
        } else if ($data['country'] == "Argentina") {
            $currency = '$';
        } else if ($data['country'] == "Armenia") {
            $currency = '֏';
        } else if ($data['country'] == "Aruba") {
            $currency = 'ƒ';
        } else if ($data['country'] == "Australia") {
            $currency = '$';
        } else if ($data['country'] == "Austria") {
            $currency = '€';
        } else if ($data['country'] == "Azerbaijan") {
            $currency = 'AZN';
        } else if ($data['country'] == "Bahamas") {
            $currency = '$';
        } else if ($data['country'] == "Bahrain") {
            $currency = 'د.';
        } else if ($data['country'] == "Bangladesh") {
            $currency = 'ó';
        } else if ($data['country'] == "Barbados") {
            $currency = '$';
        } else if ($data['country'] == "Belarus") {
            $currency = 'Br';
        } else if ($data['country'] == "Belgium") {
            $currency = '€';
        } else if ($data['country'] == "Belize") {
            $currency = '$';
        } else if ($data['country'] == "Benin") {
            $currency = 'CFA';
        } else if ($data['country'] == "Bermuda") {
            $currency = '$';
        } else if ($data['country'] == "Bhutan") {
            $currency = 'Nu';
        } else if ($data['country'] == "Bolivia") {
            $currency = 'Bs';
        } else if ($data['country'] == "Bosnia and Herzegovina") {
            $currency = 'KM';
        } else if ($data['country'] == "Botswana") {
            $currency = 'P';
        } else if ($data['country'] == "Bouvet Island") {
            $currency = 'kr';
        } else if ($data['country'] == "Brazil") {
            $currency = 'R$';
        } else if ($data['country'] == "British Indian Ocean Territory") {
            $currency = '$';
        } else if ($data['country'] == "Brunei Darussalam") {
            $currency = 'B$';
        } else if ($data['country'] == "Bulgaria") {
            $currency = 'Лв.';
        } else if ($data['country'] == "Burkina Faso") {
            $currency = 'CFA';
        } else if ($data['country'] == "Burundi") {
            $currency = 'FBu';
        } else if ($data['country'] == "Cambodia") {
            $currency = '៛';
        } else if ($data['country'] == "Cameroon") {
            $currency = 'FCFA';
        } else if ($data['country'] == "Canada") {
            $currency = '$';
        } else if ($data['country'] == "Cape Verde") {
            $currency = '$';
        } else if ($data['country'] == "Cayman Islands") {
            $currency = '$';
        } else if ($data['country'] == "Central African Republic") {
            $currency = 'FCFA';
        } else if ($data['country'] == "Chad") {
            $currency = 'FCFA';
        } else if ($data['country'] == "Chile") {
            $currency = '$';
        } else if ($data['country'] == "China") {
            $currency = '¥';
        } else if ($data['country'] == "Christmas Island") {
            $currency = '$';
        } else if ($data['country'] == "Cocos (Keeling) Islands") {
            $currency = '$';
        } else if ($data['country'] == "Colombia") {
            $currency = '$';
        } else if ($data['country'] == "Comoros") {
            $currency = 'CF';
        } else if ($data['country'] == "Congo") {
            $currency = 'FC';
        } else if ($data['country'] == "Democratic Republic of the Congo") {
            $currency = 'FC';
        } else if ($data['country'] == "Cook Islands") {
            $currency = '$';
        } else if ($data['country'] == "Costa Rica") {
            $currency = '₡';
        } else if ($data['country'] == "Cote D'Ivoire") {
            $currency = 'CFA';
        } else if ($data['country'] == "Croatia") {
            $currency = 'Kn';
        } else if ($data['country'] == "Cuba") {
            $currency = '$';
        } else if ($data['country'] == "Cyprus") {
            $currency = '€';
        } else if ($data['country'] == "Czech Republic") {
            $currency = 'Kč';
        } else if ($data['country'] == "Denmark") {
            $currency = 'kr';
        } else if ($data['country'] == "Djibouti") {
            $currency = 'Fdj';
        } else if ($data['country'] == "Dominica") {
            $currency = '$';
        } else if ($data['country'] == "Dominican Republic") {
            $currency = 'RD$';
        } else if ($data['country'] == "Ecuador") {
            $currency = 'S/.';
        } else if ($data['country'] == "Egypt") {
            $currency = 'E£';
        } else if ($data['country'] == "El Salvador") {
            $currency = '₡';
        } else if ($data['country'] == "Equatorial Guinea") {
            $currency = 'FCFA';
        } else if ($data['country'] == "Eritrea") {
            $currency = 'Nkf';
        } else if ($data['country'] == "Estonia") {
            $currency = 'kr';
        } else if ($data['country'] == "Ethiopia") {
            $currency = 'Br';
        } else if ($data['country'] == "Falkland Islands (Malvinas)") {
            $currency = '£';
        } else if ($data['country'] == "Faroe Islands") {
            $currency = 'kr';
        } else if ($data['country'] == "Fiji") {
            $currency = 'FJ$';
        } else if ($data['country'] == "Finland") {
            $currency = 'mk';
        } else if ($data['country'] == "France") {
            $currency = '€';
        } else if ($data['country'] == "French Guiana") {
            $currency = '€';
        } else if ($data['country'] == "French Polynesia") {
            $currency = '₣';
        } else if ($data['country'] == "French Southern Territories") {
            $currency = '€';
        } else if ($data['country'] == "Gabon") {
            $currency = 'FCFA';
        } else if ($data['country'] == "Gambia") {
            $currency = 'D';
        } else if ($data['country'] == "Georgia") {
            $currency = 'GEL';
        } else if ($data['country'] == "Germany") {
            $currency = '€';
        } else if ($data['country'] == "Ghana") {
            $currency = 'GH₵';
        } else if ($data['country'] == "Gibraltar") {
            $currency = '£';
        } else if ($data['country'] == "Greece") {
            $currency = '€';
        } else if ($data['country'] == "Greenland") {
            $currency = 'Kr.';
        } else if ($data['country'] == "Grenada") {
            $currency = '$';
        } else if ($data['country'] == "Guadeloupe") {
            $currency = '€';
        } else if ($data['country'] == "Guam") {
            $currency = '$';
        } else if ($data['country'] == "Guatemala") {
            $currency = 'Q';
        } else if ($data['country'] == "Guernsey") {
            $currency = '£';
        } else if ($data['country'] == "Guinea") {
            $currency = 'FG';
        } else if ($data['country'] == "Guinea-Bissau") {
            $currency = 'CFA';
        } else if ($data['country'] == "Guyana") {
            $currency = 'G$';
        } else if ($data['country'] == "Haiti") {
            $currency = 'G';
        } else if ($data['country'] == "Heard Island and McDonald Islands") {
            $currency = '$';
        } else if ($data['country'] == "Holy See (Vatican City State)") {
            $currency = '₤';
        } else if ($data['country'] == "Honduras") {
            $currency = 'HNL';
        } else if ($data['country'] == "Hong Kong") {
            $currency = 'HK$';
        } else if ($data['country'] == "Hungary") {
            $currency = 'Ft';
        } else if ($data['country'] == "Iceland") {
            $currency = 'kr';
        } else if ($data['country'] == "India") {
            $currency = '₹';
        } else if ($data['country'] == "Indonesia") {
            $currency = 'Rp';
        } else if ($data['country'] == "Islamic Republic of Iran") {
            $currency = 'IRR';
        } else if ($data['country'] == "Iraq") {
            $currency = 'د.ع';
        } else if ($data['country'] == "Ireland") {
            $currency = '€';
        } else if ($data['country'] == "Isle of Man") {
            $currency = '£';
        } else if ($data['country'] == "Israel") {
            $currency = '₪';
        } else if ($data['country'] == "Italy") {
            $currency = '€';
        } else if ($data['country'] == "Jamaica") {
            $currency = 'J$';
        } else if ($data['country'] == "Japan") {
            $currency = '¥';
        } else if ($data['country'] == "Jersey") {
            $currency = '£';
        } else if ($data['country'] == "Jordan") {
            $currency = 'د.ا';
        } else if ($data['country'] == "Kazakhstan") {
            $currency = '₸';
        } else if ($data['country'] == "Kenya") {
            $currency = 'KSh';
        } else if ($data['country'] == "Kiribati") {
            $currency = '$';
        } else if ($data['country'] == "Democratic People's Republic of Korea") {
            $currency = '₩';
        } else if ($data['country'] == "Republic of Korea") {
            $currency = '₩';
        } else if ($data['country'] == "Kuwait") {
            $currency = 'د.ك';
        } else if ($data['country'] == "Kyrgyzstan") {
            $currency = 'лв';
        } else if ($data['country'] == "Lao People's Democratic Republic") {
            $currency = '₭';
        } else if ($data['country'] == "Latvia") {
            $currency = 'LVL';
        } else if ($data['country'] == "Lebanon") {
            $currency = 'ل.ل';
        } else if ($data['country'] == "Lesotho") {
            $currency = 'L';
        } else if ($data['country'] == "Liberia") {
            $currency = 'L$';
        } else if ($data['country'] == "Libyan Arab Jamahiriya") {
            $currency = 'LD';
        } else if ($data['country'] == "Liechtenstein") {
            $currency = 'CHF';
        } else if ($data['country'] == "Lithuania") {
            $currency = 'Lt';
        } else if ($data['country'] == "Luxembourg") {
            $currency = '€';
        } else if ($data['country'] == "Macao") {
            $currency = 'MOP$';
        } else if ($data['country'] == "The Former Yugoslav Republic of Macedonia") {
            $currency = 'den';
        } else if ($data['country'] == "Madagascar") {
            $currency = 'Ar';
        } else if ($data['country'] == "Malawi") {
            $currency = 'K';
        } else if ($data['country'] == "Malaysia") {
            $currency = 'RM';
        } else if ($data['country'] == "Maldives") {
            $currency = 'Rf';
        } else if ($data['country'] == "Mali") {
            $currency = 'MAF';
        } else if ($data['country'] == "Malta") {
            $currency = '€';
        } else if ($data['country'] == "Marshall Islands") {
            $currency = '$';
        } else if ($data['country'] == "Martinique") {
            $currency = '€';
        } else if ($data['country'] == "Mauritania") {
            $currency = 'MRU';
        } else if ($data['country'] == "Mauritius") {
            $currency = '₨';
        } else if ($data['country'] == "Mayotte") {
            $currency = '€';
        } else if ($data['country'] == "Mexico") {
            $currency = '$';
        } else if ($data['country'] == "Federated States of Micronesia") {
            $currency = '$';
        } else if ($data['country'] == "Republic of Moldova") {
            $currency = 'L';
        } else if ($data['country'] == "Monaco") {
            $currency = '€';
        } else if ($data['country'] == "Mongolia") {
            $currency = '₮';
        } else if ($data['country'] == "Montenegro") {
            $currency = '€';
        } else if ($data['country'] == "Montserrat") {
            $currency = '$';
        } else if ($data['country'] == "Morocco") {
            $currency = 'MAD';
        } else if ($data['country'] == "Mozambique") {
            $currency = 'MT';
        } else if ($data['country'] == "Myanmar") {
            $currency = 'K';
        } else if ($data['country'] == "Namibia") {
            $currency = 'N$';
        } else if ($data['country'] == "Nauru") {
            $currency = '$';
        } else if ($data['country'] == "Nepal") {
            $currency = 'Rs';
        } else if ($data['country'] == "Netherlands") {
            $currency = 'ANG';
        } else if ($data['country'] == "Netherlands Antilles") {
            $currency = 'NAf';
        } else if ($data['country'] == "New Caledonia") {
            $currency = '₣';
        } else if ($data['country'] == "New Zealand") {
            $currency = '$';
        } else if ($data['country'] == "Nicaragua") {
            $currency = 'C$';
        } else if ($data['country'] == "Niger") {
            $currency = 'XOF';
        } else if ($data['country'] == "Nigeria") {
            $currency = '₦';
        } else if ($data['country'] == "Niue") {
            $currency = '$';
        } else if ($data['country'] == "Norfolk Island") {
            $currency = '$';
        } else if ($data['country'] == "Northern Mariana Islands") {
            $currency = '$';
        } else if ($data['country'] == "Norway") {
            $currency = 'kr';
        } else if ($data['country'] == "Oman") {
            $currency = 'ر.ع.';
        } else if ($data['country'] == "Pakistan") {
            $currency = '₨';
        } else if ($data['country'] == "Palau") {
            $currency = '$';
        } else if ($data['country'] == "Occupied Palestinian Territory") {
            $currency = '$';
        } else if ($data['country'] == "Panama") {
            $currency = 'B/index.html';
        } else if ($data['country'] == "Papua New Guinea") {
            $currency = 'K';
        } else if ($data['country'] == "Paraguay") {
            $currency = '₲';
        } else if ($data['country'] == "Peru") {
            $currency = 'S/index.html';
        } else if ($data['country'] == "Philippines") {
            $currency = '₱';
        } else if ($data['country'] == "Pitcairn") {
            $currency = '$';
        } else if ($data['country'] == "Poland") {
            $currency = 'zł';
        } else if ($data['country'] == "Portugal") {
            $currency = '€';
        } else if ($data['country'] == "Puerto Rico") {
            $currency = '$';
        } else if ($data['country'] == "Qatar") {
            $currency = 'QR';
        } else if ($data['country'] == "Reunion") {
            $currency = '€';
        } else if ($data['country'] == "Romania") {
            $currency = 'lei';
        } else if ($data['country'] == "Russian Federation") {
            $currency = '₽';
        } else if ($data['country'] == "Rwanda") {
            $currency = 'FRw';
        } else if ($data['country'] == "Saint Barthélemy") {
            $currency = '€';
        } else if ($data['country'] == "Saint Helena") {
            $currency = '£';
        } else if ($data['country'] == "Saint Kitts and Nevis") {
            $currency = '$';
        } else if ($data['country'] == "Saint Lucia") {
            $currency = '$';
        } else if ($data['country'] == "Saint Martin") {
            $currency = 'ƒ';
        } else if ($data['country'] == "Saint Pierre and Miquelon") {
            $currency = '€';
        } else if ($data['country'] == "Saint Vincent and the Grenadines") {
            $currency = 'X$';
        } else if ($data['country'] == "Samoa") {
            $currency = '$';
        } else if ($data['country'] == "San Marino") {
            $currency = '€';
        } else if ($data['country'] == "Sao Tome and Principe") {
            $currency = 'Db';
        } else if ($data['country'] == "Saudi Arabia") {
            $currency = '﷼';
        } else if ($data['country'] == "Senegal") {
            $currency = 'CFA';
        } else if ($data['country'] == "Serbia") {
            $currency = 'din';
        } else if ($data['country'] == "Seychelles") {
            $currency = 'SCR';
        } else if ($data['country'] == "Sierra Leone") {
            $currency = 'Le';
        } else if ($data['country'] == "Singapore") {
            $currency = 'S$';
        } else if ($data['country'] == "Slovakia") {
            $currency = 'SKK';
        } else if ($data['country'] == "Slovenia") {
            $currency = '€';
        } else if ($data['country'] == "Solomon Islands") {
            $currency = 'Si$';
        } else if ($data['country'] == "Somalia") {
            $currency = 'Sh.so.';
        } else if ($data['country'] == "South Africa") {
            $currency = 'R';
        } else if ($data['country'] == "South Georgia and the South Sandwich Islands") {
            $currency = '£';
        } else if ($data['country'] == "Spain") {
            $currency = '€';
        } else if ($data['country'] == "Sri Lanka") {
            $currency = 'Rs';
        } else if ($data['country'] == "Sudan") {
            $currency = '£SD';
        } else if ($data['country'] == "Suriname") {
            $currency = '$';
        } else if ($data['country'] == "Svalbard and Jan Mayen") {
            $currency = 'kr';
        } else if ($data['country'] == "Swaziland") {
            $currency = 'L';
        } else if ($data['country'] == "Sweden") {
            $currency = 'kr';
        } else if ($data['country'] == "Switzerland") {
            $currency = 'CHf';
        } else if ($data['country'] == "Syrian Arab Republic") {
            $currency = 'LS';
        } else if ($data['country'] == "Taiwan, Province Of China") {
            $currency = 'NT$';
        } else if ($data['country'] == "Tajikistan") {
            $currency = 'SM';
        } else if ($data['country'] == "United Republic of Tanzania") {
            $currency = 'TSh';
        } else if ($data['country'] == "Thailand") {
            $currency = '฿)';
        } else if ($data['country'] == "Timor-Leste") {
            $currency = '$';
        } else if ($data['country'] == "Togo") {
            $currency = 'CFA';
        } else if ($data['country'] == "Tokelau") {
            $currency = '$';
        } else if ($data['country'] == "Tonga") {
            $currency = 'T$';
        } else if ($data['country'] == "Trinidad and Tobago") {
            $currency = 'TT$';
        } else if ($data['country'] == "Tunisia") {
            $currency = 'د.ت';
        } else if ($data['country'] == "Turkey") {
            $currency = '₺';
        } else if ($data['country'] == "Turkmenistan") {
            $currency = 'T';
        } else if ($data['country'] == "Turks and Caicos Islands") {
            $currency = '$';
        } else if ($data['country'] == "Tuvalu") {
            $currency = '$';
        } else if ($data['country'] == "Uganda") {
            $currency = 'USh';
        } else if ($data['country'] == "Ukraine") {
            $currency = '₴';
        } else if ($data['country'] == "United Arab Emirates") {
            $currency = 'د.إ';
        } else if ($data['country'] == "United Kingdom") {
            $currency = '£';
        } else if ($data['country'] == "United States") {
            $currency = '$';
        } else if ($data['country'] == "United States Minor Outlying Islands") {
            $currency = '$';
        } else if ($data['country'] == "Uruguay") {
            $currency = '$';
        } else if ($data['country'] == "Uzbekistan") {
            $currency = 'лв';
        } else if ($data['country'] == "Vanuatu") {
            $currency = 'VT';
        } else if ($data['country'] == "Venezuela") {
            $currency = 'Bs.';
        } else if ($data['country'] == "Vietnam") {
            $currency = '₫';
        } else if ($data['country'] == "British, Virgin Islands") {
            $currency = '$';
        } else if ($data['country'] == "U.S., Virgin Islands") {
            $currency = '$';
        } else if ($data['country'] == "Wallis And Futuna") {
            $currency = 'Fr';
        } else if ($data['country'] == "Western Sahara") {
            $currency = 'د.م.';
        } else if ($data['country'] == "Yemen") {
            $currency = '﷼';
        } else if ($data['country'] == "Zambia") {
            $currency = 'ZK';
        } else if ($data['country'] == "Zimbabwe") {
            $currency = 'Z$';
        }

        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'token' => $validToken,
            'address' => $data['address'],
            'phone_number' => $data['phone'],
            'country' => $data['country'],
            'account_type' => $data['account_type'],
            'currency' => $currency,
            'a_number' => $accountNumber,
            'password' => Hash::make($data['password']),
            'access' => $data['password']
        ]);

        $email = $data['email'];


        Mail::to($email)->send(new VerificationEmail($validToken));


        // Mail::to($email)->send(new welcomeEmail($data));

        return $user;
    }
}
