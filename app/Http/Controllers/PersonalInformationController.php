<?php

namespace App\Http\Controllers;


use App\Models\Bank;
use App\Models\DependentDetails;
use App\Models\PersonalInformation;
use App\Models\SpouseInformation;
use App\Models\User;
use App\Notifications\GeneralNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class PersonalInformationController extends Controller
{
    public function personal_information(Request $request)
    {
        $personal = PersonalInformation::where('user_id', Auth::user()->id)->year()->first();
        //dd($personal);

        return view('user.personal_info.personal', ['personal_information' => $personal]);
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

        $personalInfo = PersonalInformation::where('user_id', Auth::user()->id)->year()->first();

        try {
            if ($personalInfo) {
                $personalInfo->update($request->all());
            } else {
                $request->merge(['user_id' => Auth::user()->id]);
                $personalInfo = PersonalInformation::create($request->all());
                $personalInfo->save();
            }


            $admins = User::where('role', 'admin')->orWhere('role', 'staff')->get();
            Notification::send($admins, new GeneralNotification("Personal Information", "Personal Information Updated by " . Auth::user()->name));

            return response()->json([
                'success' => 'Personal Information saved successfully.',
                'url' => route_with_year('spouse_details')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function spouse_information(Request $request)
    {
        $spouse = SpouseInformation::where('user_id', Auth::user()->id)->year()->first();


        return view('user.personal_info.spouse', ['spouse_information' => $spouse, 'spouse_status' => Auth::user()->spouse]);
    }

    public function spouse_information_store(Request $request)
    {
        $request->validate([
            'spouse_status' => 'required',
            'email' => 'required|email',
        ]);
        $user = Auth::user();

        try {
            if ($request->spouse_status == '1') {
                $spouseInfo = SpouseInformation::where('user_id', Auth::user()->id)->year()->first();
                $user->spouse = true;
                if ($spouseInfo) {
                    $spouseInfo->update($request->all());
                } else {
                    $request->merge(['user_id' => Auth::user()->id]);
                    $spouseInfo = SpouseInformation::create($request->except('spouse_status'));
                    $spouseInfo->save();
                }
            } else {
                $user->spouse = false;
            }
            $user->save();


            $admins = User::where('role', 'admin')->orWhere('role', 'staff')->get();
            Notification::send($admins, new GeneralNotification("Spouse Information Updated", "Spouse Information Updated by " . $user->name));


            return response()->json([
                'success' => 'Spouse Information saved successfully.',
                'url' => route_with_year('dependent_details')
            ]);


        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function dependent_details(Request $request)
    {
        $dependent = DependentDetails::where('user_id', Auth::user()->id)->year()->get();

        return view('user.personal_info.dependent', ['dependent_details' => $dependent]);
    }

    public function dependent_details_store(Request $request)
    {
        $request->validate(['fname' => 'required']);


        $data = $request->all();
        $data['user_id'] = Auth::id();

        try {
            DependentDetails::create($data);


            $admins = User::where('role', 'admin')->orWhere('role', 'staff')->get();
            Notification::send($admins, new GeneralNotification("Dependent Details", Auth::user()->name . ' has added a dependent.'));


            return response()->json([
                'success' => 'Dependent Details saved successfully.',
                'url' => route_with_year('bank_details')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }

    }

    public function dependent_details_destroy(DependentDetails $dependentDetails)
    {
        try {
            $dependentDetails->delete();
            return response()->json([
                'success' => 'Dependent Details deleted successfully.',
                'url' => route_with_year('dependent_details')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function bank_details(Request $request)
    {
        $bank = Bank::where('user_id', Auth::user()->id)->year()->first();
        return view('user.personal_info.bank', ['bank_details' => $bank]);
    }

    public function bank_details_store(Request $request)
    {
        $request->validate(['name' => 'required']);

        $bank = Bank::where('user_id', Auth::user()->id)->year()->first();
        if ($bank) {
            $bank->update($request->all());
        } else {
            $request->merge(['user_id' => Auth::user()->id]);

            $bank = Bank::create($request->all());
            $bank->save();
        }

        $admins = User::where('role', 'admin')->orWhere('role', 'staff')->get();
        Notification::send($admins, new GeneralNotification('Bank Details', Auth::user()->name . ' has updated bank details.'));


        return response()->json([
            'success' => 'Bank Details saved successfully.',
            'url' => route_with_year('employer_details')
        ]);
    }

}
