<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
            'email' => 'required|email',
            'phone' => 'required',
            'state' => 'required',
        ]);


        $user = auth()->user();
        $user->name = $request->fname . " " . $request->lname;
        $user->email = $request->email;
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


}
