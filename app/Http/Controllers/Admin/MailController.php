<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Mail\sendUserEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

    public function showSendMailForm()
    {
        return view('admin.send_mail_form');
    }
    public function sendMail(Request $request)
    {
        // // Validate the request input
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        $message = $request->message;

        // Prepare the data for the email (escaping any HTML tags for safety)
        $data = "<p>" . e($message) . "</p>";
        // $data = nl2br(e($message)); 

        $subject = $request->subject;

        // Send the email using the SendUserEmail mailable
        Mail::to($request->email)->send(new sendUserEmail($request->subject, $request->message));

        // Redirect back with a success message
        return back()->with('message', 'Email successfully sent!');
    }


    public function sendMailToAll(Request $request)
    {
        // Validate the form inputs
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Retrieve all active users' emails
        $users = User::pluck('email');

        // Send email to all users
        foreach ($users as $email) {
            Mail::to($email)->send(new sendUserEmail($request->subject, $request->message));
        }

        // Set a success message
        return redirect()->back()->with('message', 'Email sent successfully to all users!');
    }
}
