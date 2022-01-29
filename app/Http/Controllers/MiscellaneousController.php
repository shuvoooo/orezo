<?php

namespace App\Http\Controllers;

use App\Models\Miscellaneous;
use App\Models\User;
use App\Notifications\GeneralNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Route;

class MiscellaneousController extends Controller
{
    public function miscellaneous_details(Request $request)
    {
        $miscellaneous_details = Miscellaneous::where('user_id', auth()->user()->id)->year()->first()->details ?? [];


        return view('user.tax.miscellaneous_details', compact('miscellaneous_details'));
    }

    public function miscellaneous_details_store(Request $request)
    {


        $miscellaneous = Miscellaneous::where('user_id', auth()->user()->id)->year()->first();

        if (!$miscellaneous) {
            $miscellaneous = new Miscellaneous();
            $miscellaneous->user_id = auth()->user()->id;
        }
        $miscellaneous->details = $request->details;
        $miscellaneous->save();

        $admins = User::where('role', 'admin')->orWhere('role', 'staff')->get();
        Notification::send($admins, new GeneralNotification('Miscellaneous',auth()->user()->name . ' has updated his/her miscellaneous details'));

        return response()->json([
            'message' => 'Miscellaneous Details Successfully Updated',
            'url' => route_with_year('upload_tax_documents')
        ]);
    }
}
