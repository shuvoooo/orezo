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

    public function client_show(User $client)
    {

        $personal_information = PersonalInformation::where('user_id', $client->id)->first();
        $spouse_information = SpouseInformation::where('user_id', $client->id)->first();
        $dependent_details = DependentDetails::where('user_id', $client->id)->get();
        $bank_detail = Bank::where('user_id', $client->id)->first();
        $employer_details = Employer::where('user_id', $client->id)->get();
        $project_details = Project::where('user_id', $client->id)->get();
        $residency_details = Residency::where('user_id', $client->id)->get();
        $expenses_details = Expense::where('user_id', $client->id)->first();
        $asset_details = Asset::where('user_id', $client->id)->first();
        $miscell_details = Miscellaneous::where('user_id', $client->id)->first();


        $expense_details = json_decode($expenses_details->details ?? "[]");


        $assets_details = json_decode($asset_details->details ?? "[]");


        $miscell_details = json_decode($miscell_details->details ?? "[]");

        return response()->view('admin.client.details', compact('client', 'personal_information', 'spouse_information', 'dependent_details', 'bank_detail', 'employer_details', 'project_details', 'residency_details', 'expense_details', 'asset_details', 'miscell_details'));
    }

    public function client_list()
    {
        $clients = User::where('role', 'user')->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'email' => $item->email,
            ];
        });
        return response()->json($clients);
    }
}
