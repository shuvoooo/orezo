<?php

namespace App\Http\Controllers;

use App\Models\Residency;
use App\Models\User;
use App\Notifications\GeneralNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class ResidencyController extends Controller
{
    public function residency_details(Request $request)
    {
        $residency_details = residency::where('user_id', Auth::id())->year()->get();
        return response()->view('user.tax.residency_details', compact('residency_details'));
    }

    public function residency_details_store(Request $request)
    {
        $request->validate([
            'payer' => 'required',
        ]);

        try {
            $data = $request->all();
            $data['user_id'] = Auth::id();
            Residency::create($data);

            $admins = User::where('role', 'admin')->orWhere('role', 'staff')->get();
            Notification::send($admins, new GeneralNotification("Residency Updated", Auth::user()->name . ' has added a new residency'));

            return response()->json(['success' => 'Residency added successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }


    public function residency_details_destroy($year, Residency $residency)
    {
        try {
            $residency->delete();
            return redirect()->back()->with('success', 'Residency deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
