<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function asset_details()
    {
        return view('user.tax.asset_details');
    }

    public function expense_details_store(Request $request)
    {

    }
}
