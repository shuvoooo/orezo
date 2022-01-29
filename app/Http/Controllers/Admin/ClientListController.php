<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ClientDataTable;
use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\Bank;
use App\Models\DependentDetails;
use App\Models\Employer;
use App\Models\Expense;
use App\Models\Invoice;
use App\Models\Miscellaneous;
use App\Models\PersonalInformation;
use App\Models\Project;
use App\Models\Residency;
use App\Models\SpouseInformation;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class ClientListController extends Controller
{
    public function index(Builder $dataTable)
    {
        $clients = User::where('role', 'user')->get();

        $clientCollection = collect();

        foreach ($clients as $item) {
            $personInfo = PersonalInformation::where('user_id', $item->id)->where('year', date('Y'))->first();

            $clientCollection->push([
                'id' => $item->id,
                'name' => $item->name,
                'email' => $item->email,
                'phone' => $personInfo->mobile ?? '',
                'created_at' => $item->created_at->format('d/m/Y'),
                'created_att' => $item->created_at->timestamp,
            ]);
        }


        if (request()->ajax()) {
            return DataTables::collection($clientCollection)
                ->addColumn('action', function ($user) {
                    $invoice_link = Invoice::where('user_id', $user['id'])->where('year', request('year') ?? date('Y'))->orderBy('created_at', 'DESC')->first();
                    $invoice_link = $invoice_link ? route('admin.invoice.edit', ['user' => $invoice_link->user_id, 'year' => request('year') ?? date('Y')]) : '#';
                    return view('datatables.client_action', ['user' => $user, 'invoice_link' => $invoice_link]);
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $dataTable->columns([
            ['data' => 'id', 'name' => 'id', 'title' => 'ID'],
            ['data' => 'name', 'name' => 'name', 'title' => 'Name'],
            ['data' => 'email', 'name' => 'email', 'title' => 'Email'],
            ['data' => 'phone', 'name' => 'phone', 'title' => 'Phone'],
            ['data' => 'created_at', 'name' => 'created_att', 'title' => 'Reg Date'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false],
        ])->parameters([
            'order' => [
                [4, 'desc']
            ],
            "columnDefs" => [
                [
                    "targets" => 4,
                    "type" => "date"
                ]
            ]
        ]);
        return view('admin.client.index', compact('dataTable'));
    }

    public function client_index(ClientDataTable $dataTable)
    {
        return $dataTable->render('admin.client.index');
    }

    public function client_show(User $user)
    {

        $personal_information = PersonalInformation::where('user_id', $user->id)->where('year', request('year') ?? date('Y'))->first();
        $spouse_information = SpouseInformation::where('user_id', $user->id)->where('year', request('year') ?? date('Y'))->first();
        $dependent_details = DependentDetails::where('user_id', $user->id)->where('year', request('year') ?? date('Y'))->get();


        $bank_detail = Bank::where('user_id', $user->id)->where('year', request('year') ?? date('Y'))->first();
        $employer_details = Employer::where('user_id', $user->id)->where('year', request('year') ?? date('Y'))->get();
        $project_details = Project::where('user_id', $user->id)->where('year', request('year') ?? date('Y'))->get();
        $residency_details = Residency::where('user_id', $user->id)->where('year', request('year') ?? date('Y'))->get();
        $expenses_details = Expense::where('user_id', $user->id)->where('year', request('year') ?? date('Y'))->first();
        $asset_details = Asset::where('user_id', $user->id)->where('year', request('year') ?? date('Y'))->first();
        $miscell_details = Miscellaneous::where('user_id', $user->id)->where('year', request('year') ?? date('Y'))->first();


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
