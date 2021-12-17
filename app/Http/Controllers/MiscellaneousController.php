<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiscellaneousController extends Controller
{
    public function miscellaneous_details()
    {
        return view('user.tax.miscellaneous_details');
    }

    public function miscellaneous_details_store(Request $request)
    {

    }
}
