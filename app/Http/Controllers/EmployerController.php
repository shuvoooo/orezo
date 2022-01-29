<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\User;
use App\Notifications\GeneralNotification;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class EmployerController extends Controller
{
    public function employer_details()
    {
        $employer_details = Employer::where('user_id', Auth::user()->id)->year()->get();
        return view('user.tax.employer_details', compact('employer_details'));
    }

    //create tax store function
    public function employer_details_store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'city' => 'required',
            'state' => 'required',
        ]);

        try {
            $data = $request->all();
            $data['user_id'] = Auth::user()->id;
            $data['country'] = "USA";
            Employer::create($data);


            $admins = User::where('role', 'admin')->orWhere('role', 'staff')->get();
            Notification::send($admins, new GeneralNotification('Employer Details', Auth::user()->name . ' has added a new employer'));

            return response()->json(['success' => 'Employer Details Added Successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }


    public function employer_details_destroy(Employer $employer): RedirectResponse
    {
        $employer->delete();
        return redirect()->back()->with('message', 'Employer Details Deleted Successfully');
    }
}
