<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FileStatus;
use App\Models\Invoice;
use App\Models\RolePermission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function dashboard(Request $request)
    {


        if ($request->ajax()) {
            $request->validate([
                'from_date' => 'required',
                'to_date' => 'required',
                'action' => 'required',
            ]);


            $value = Invoice::where([['payment_date', '>=', $request->from_date], ['payment_date', '<=', $request->to_date]])->get();

            if ($request->action == 'invoice') {
                $value = $value->count();
            } elseif ($request->action == 'revenue') {
                $value = $value->sum('total_amount') ?? 0;
            } elseif ($request->action == 'avg') {
                $value = $value->avg('total_amount') ?? 0;
            }

            return response()->json(['value' => $value]);
        } else {

            $permissions = RolePermission::where('user_id', auth()->id())->first()->details ?? '';

            $dashboard = [];

            // $dashboard['total_clients'] = DB::table('users')->select(DB::raw('COUNT(*) as total'))->where('role', '=', 'user')->get();

            $dashboard['total_clients'] = User::where('role', 'user')->count();
            $dashboard['total_staff'] = User::where('role', 'staff')->count();
            $dashboard['invoice_paid'] = Invoice::where('payment_status', 1)->count();
            $dashboard['invoice_unpaid'] = Invoice::where('payment_status', 0)->count();
            $dashboard['total_file_completed'] = Filestatus::select(DB::raw('COUNT(*) as total'))->where('status', 5)->groupBy('user_id')->count();
            $dashboard['total_file_uncompleted'] = $dashboard['total_clients'] - $dashboard['total_file_completed'];


            $dashboard['total_invoice'] = Invoice::count();
            $dashboard['total_revenue'] = Invoice::where('payment_status', 1)->sum('total_amount');
            $dashboard['avg_revenue'] = Invoice::where('payment_status', 1)->avg('total_amount');


            $role = auth()->user()->role;

            return view('admin.dashboard', compact('dashboard', 'permissions', 'role'));
        }

    }
}
