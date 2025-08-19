<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\BrandingSetting;
use App\Http\Controllers\Controller;

class BrandingController extends Controller
{
    public function index()
    {
        $branding = BrandingSetting::first();
        return view('admin.change_logo_favicon', compact('branding'));
    }

    public function update(Request $request)
    {
        $branding = BrandingSetting::firstOrNew();

        // Upload logo
        if ($request->hasFile('logo')) {
            $file_logo = $request->file('logo');
            $ext_logo = $file_logo->getClientOriginalExtension();
            $filename_logo = time() . '_logo.' . $ext_logo;
            $file_logo->move('uploads/branding/', $filename_logo);
            $branding->logo = 'uploads/branding/' . $filename_logo;
        }

        // Upload footer logo
        if ($request->hasFile('footer_logo')) {
            $file_footer_logo = $request->file('footer_logo');
            $ext_footer_logo = $file_footer_logo->getClientOriginalExtension();
            $filename_footer_logo = time() . '_footer_logo.' . $ext_footer_logo;
            $file_footer_logo->move('uploads/branding/', $filename_footer_logo);
            $branding->footer_logo = 'uploads/branding/' . $filename_footer_logo;
        }

        // Upload email logo
        if ($request->hasFile('email_logo')) {
            $file_email_logo = $request->file('email_logo');
            $ext_email_logo = $file_email_logo->getClientOriginalExtension();
            $filename_email_logo = time() . '_email_logo.' . $ext_email_logo;
            $file_email_logo->move('uploads/branding/', $filename_email_logo);
            $branding->email_logo = 'uploads/branding/' . $filename_email_logo;
        }

        // Upload favicon
        if ($request->hasFile('favicon')) {
            $file_favicon = $request->file('favicon');
            $ext_favicon = $file_favicon->getClientOriginalExtension();
            $filename_favicon = time() . '_favicon.' . $ext_favicon;
            $file_favicon->move('uploads/branding/', $filename_favicon);
            $branding->favicon = 'uploads/branding/' . $filename_favicon;
        }

        $branding->save();

        return redirect()->route('branding.index')->with('success', 'Branding settings updated successfully.');
    }
}
