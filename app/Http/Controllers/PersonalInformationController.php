<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalInformationController extends Controller
{
    public function personal_information()
    {
        $personal = Auth::user()->personal_information;
        return view('user.personal', ['personal_information' => $personal]);
    }

    public function personal_information_store(Request $request)
    {

    }
}
