<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerController extends Controller
{
    public function employer_details()
    {
        $employer_details = Employer::where('user_id', Auth::user()->id)->get();
        return view('user.tax.employer_details', compact('employer_details'));
    }

    //create tax store function
    public function employer_details_store(Request $request)
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

            return response()->json(['success' => 'Employer Details Added Successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }


    public function employer_details_destroy(Employer $employer)
    {
        $employer->delete();
        return redirect()->back()->with('message', 'Employer Details Deleted Successfully');
    }
}
