<?php

namespace App\Http\Controllers;

use App\Models\PersonalInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalInformationController extends Controller
{
    public function personal_information()
    {
        $personal = Auth::user()->personalInformation;
        return view('user.personal', ['personal_information' => $personal]);
    }

    public function personal_information_store(Request $request)
    {

        $request->validate([
            'fname' => 'required|min:3|max:20',
//            'lname' => 'required',
//            'email' => 'required',
//            'phone' => 'required',
//            'city' => 'required',
//            'state' => 'required',
//            'zip' => 'required',
//            'country' => 'required',
        ]);

        $personalInfo = Auth::user()->personalInformation;

        if ($personalInfo) {
            $personalInfo->update($request->all());
        } else {
            $personalInfo = PersonalInformation::create($request->all());
            $personalInfo->user()->associate(Auth::user());
            $personalInfo->save();
        }

        return response()->json([
            'success' => 'Personal Information saved successfully.',
            'url' => route('personal_information')
        ]);
    }
}
