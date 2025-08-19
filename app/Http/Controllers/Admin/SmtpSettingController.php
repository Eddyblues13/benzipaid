<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SmtpSettingController extends Controller
{
    public function index()
    {
        $smtpSetting = SmtpSetting::first(); // Retrieve the first SMTP setting entry
        return view('admin.smtp_settings', compact('smtpSetting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'mail_host' => 'required|string',
            'mail_port' => 'required|integer',
            'mail_username' => 'required|string',
            'mail_password' => 'required|string',
            'mail_encryption' => 'nullable|string',
            'mail_from_name' => 'required|string',
        ]);

        $smtpSetting = SmtpSetting::first() ?? new SmtpSetting();
        $smtpSetting->update($request->all());

        return back()->with('success', 'SMTP settings updated successfully.');
    }
}
