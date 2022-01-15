<?php

namespace App\Http\Controllers;

use App\Mail\EmailOTPVerify;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use function redirect;

class UserController extends Controller
{
    public function update_profile_view()
    {
        $user = auth()->user();
        $address = Address::where('user_id', $user->id)->first();
        return response()->view('account_setting', compact('user', 'address'));
    }

    public function update_profile(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required',
            'state' => 'required',
        ]);


        $user = auth()->user();
        $user->name = $request->fname . " " . $request->lname;
        $user->save();

        $address = Address::where('user_id', $user->id)->first();

        if (!$address) {
            $address = new Address();
            $address->user_id = $user->id;
            $address->country = "USA";
        }

        $address->fname = $request->fname;
        $address->lname = $request->lname;
        $address->state = $request->state;
        $address->mobile = $request->phone;
        $address->save();

        return redirect()->back()->with('success', 'Profile updated successfully');
    }


    public function change_password(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $user = auth()->user();
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('danger', 'Current password is incorrect');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Password changed successfully');
    }


    // Send OTP to Email
    public function send_otp_email(Request $request)
    {
        $otp = rand(100000, 999999);
        $user = auth()->user();

        if (Cache::has('otp_' . $user->id)) {
            $otp = Cache::get('otp_' . $user->id);
        } else {
            Cache::put('otp_' . $user->id, $otp, now()->addMinutes(5));
        }


         Mail::to($user->email)->send(new EmailOTPVerify($otp));


        return response()->json(['message' => 'OTP sent to your email.']);
    }

    // Verify OTP
    public function verify_otp(Request $request)
    {
        $user = auth()->user();
        $otp = Cache::get('otp_' . $user->id);
        if ($otp == $request->otp) {
            return response()->json(['message' => 'OTP verified successfully']);
        } else {
            return response()->json(['message' => 'OTP is incorrect'], 422);
        }
    }

    // change email
    public function change_email(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required',
            'password' => ''
        ]);


        $user = auth()->user();
        $otp = Cache::get('otp_' . $user->id);

        if ($otp != $request->otp) {
            return response()->json(['message' => 'OTP is incorrect'], 422);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Password is incorrect'], 422);
        }

        Cache::forget('otp_' . $user->id);

        $user->email = $request->email;
        $user->email_verified_at = null;
        $user->save();


        return response()->json(['message' => 'Email changed successfully']);
    }

}
