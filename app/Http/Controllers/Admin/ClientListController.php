<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ClientDataTable;
use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\Bank;
use App\Models\DependentDetails;
use App\Models\Employer;
use App\Models\Expense;
use App\Models\Miscellaneous;
use App\Models\PersonalInformation;
use App\Models\Project;
use App\Models\Residency;
use App\Models\SpouseInformation;
use App\Models\User;

class ClientListController extends Controller
{
    public function client_index(ClientDataTable $dataTable)
    {
        return $dataTable->render('admin.client.index');
    }

    public function client_show(User $user)
    {

        $personal_information = PersonalInformation::where('user_id', $user->id)->where('year',request('year')??date('Y'))->first();
        $spouse_information = SpouseInformation::where('user_id', $user->id)->where('year',request('year')??date('Y'))->first();
        $dependent_details = DependentDetails::where('user_id', $user->id)->where('year',request('year')??date('Y'))->get();


        $bank_detail = Bank::where('user_id', $user->id)->where('year',request('year')??date('Y'))->first();
        $employer_details = Employer::where('user_id', $user->id)->where('year',request('year')??date('Y'))->get();
        $project_details = Project::where('user_id', $user->id)->where('year',request('year')??date('Y'))->get();
        $residency_details = Residency::where('user_id', $user->id)->where('year',request('year')??date('Y'))->get();
        $expenses_details = Expense::where('user_id', $user->id)->where('year',request('year')??date('Y'))->first();
        $asset_details = Asset::where('user_id', $user->id)->where('year',request('year')??date('Y'))->first();
        $miscell_details = Miscellaneous::where('user_id', $user->id)->where('year',request('year')??date('Y'))->first();


        $expense_details = $expenses_details->details ?? [];


        $assets_details = $asset_details->details ?? [];


        $miscell_details = $miscell_details->details ?? [];

        return response()->view('admin.client.details', compact('user', 'personal_information', 'spouse_information', 'dependent_details', 'bank_detail', 'employer_details', 'project_details', 'residency_details', 'expense_details', 'asset_details', 'miscell_details'));
    }

    public function client_list()
    {
        $users = User::where('role', 'user')->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'email' => $item->email,
            ];
        });
        return response()->json($users);
    }

    public function client_delete(User $user)
    {

        $user->delete();
        return redirect()->route('admin.client.index')->with('success', 'Client deleted successfully');
    }
}
