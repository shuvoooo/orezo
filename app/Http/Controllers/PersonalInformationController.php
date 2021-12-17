<?php

namespace App\Http\Controllers;

use App\Models\DepartmentDetails;
use App\Models\PersonalInformation;
use App\Models\SpouseInformation;
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

        try {
            if ($personalInfo) {
                $personalInfo->update($request->all());
            } else {
                $personalInfo = PersonalInformation::create($request->all());
                $personalInfo->user()->associate(Auth::user());
                $personalInfo->save();
            }

            return response()->json([
                'success' => 'Personal Information saved successfully.',
                'url' => route('spouse_details')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Something went wrong.'
            ]);
        }
    }

    public function spouse_information()
    {
        $spouse = Auth::user()->spouseInformation;
        return view('user.spouse', ['spouse_information' => $spouse, 'spouse_status' => Auth::user()->spouse]);
    }

    public function spouse_information_store(Request $request)
    {
        $request->validate([
            'spouse_status' => 'required',
        ]);
        $user = Auth::user();

        try {
            if ($request->spouse_status == '1') {
                $spouseInfo = Auth::user()->spouseInformation;
                $user->spouse = true;
                if ($spouseInfo) {
                    $spouseInfo->update($request->all());
                } else {
                    $spouseInfo = SpouseInformation::create($request->except('spouse_status'));
                    $spouseInfo->user()->associate(Auth::user());
                    $spouseInfo->save();
                }
            } else {
                $user->spouse = false;
            }
            $user->save();
            return response()->json([
                'success' => 'Spouse Information saved successfully.',
                'url' => route('spouse_details')
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function dependent_details()
    {
        $department = DepartmentDetails::where('user_id', Auth::user()->id)->get();

        return view('user.dependent', ['department_details' => $department]);
    }

    public function dependent_details_store(Request $request)
    {
        $request->validate(['fname' => 'required']);


        $data = $request->all();
        $data['user_id'] = Auth::id();

        try {
            DepartmentDetails::create($data);
            return response()->json([
                'success' => 'Dependent Details saved successfully.',
                'url' => route('dependent_details')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function dependent_details_destroy(Request $request)
    {


        return response()->json([
            'success' => 'Dependent Details saved successfully.',
            'url' => route('dependent_details')
        ]);
    }

    public function bank_details()
    {
        return view('user.bank');
    }

    public function bank_details_store(Request $request)
    {
        $request->validate([]);

        return response()->json([
            'success' => 'Bank Details saved successfully.',
            'url' => route('bank_details')
        ]);
    }

}
