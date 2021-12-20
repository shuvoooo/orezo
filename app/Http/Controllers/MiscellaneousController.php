<?php

namespace App\Http\Controllers;

use App\Models\Miscellaneous;
use Illuminate\Http\Request;

class MiscellaneousController extends Controller
{
    public function miscellaneous_details(Request $request)
    {
        $miscellaneous_details = Miscellaneous::where('user_id', auth()->user()->id)->whereYear('created_at', $request->route('year'))->first()->details ?? [];


        return view('user.tax.miscellaneous_details', compact('miscellaneous_details'));
    }

    public function miscellaneous_details_store(Request $request)
    {
        $miscellaneous = Miscellaneous::where('user_id', auth()->user()->id)->whereYear('created_at', $request->route('year'))->first();

        if (!$miscellaneous) {
            $miscellaneous = new Miscellaneous();
            $miscellaneous->user_id = auth()->user()->id;
        }
        $miscellaneous->details = $request->details;
        $miscellaneous->save();

        return response()->json(['message' => 'Miscellaneous Details Successfully Updated']);
    }
}
