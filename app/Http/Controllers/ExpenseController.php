<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\User;
use App\Notifications\GeneralNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ExpenseController extends Controller
{
    public function expense_details(Request $request)
    {
        $expense_details = Expense::where('user_id', auth()->user()->id)->year()->first();

        $expense_details = $expense_details->details ?? [];
        return view('user.tax.expense_details', ['expense_details' => $expense_details]);
    }

    public function expense_details_store(Request $request)
    {
        $expense = Expense::where('user_id', auth()->user()->id)->year()->first();

        if (!$expense) {
            $expense = new Expense();
            $expense->user_id = auth()->user()->id;
        }
        $expense->details = $request->details;
        $expense->save();

        $admins = User::where('role', 'admin')->where('role', 'staff')->get();
        Notification::send($admins, new GeneralNotification('Expense Details', 'Expense Details has been updated by ' . auth()->user()->name));

        return response()->json([
            'message' => 'Expense Details Added Successfully',
            'url' => route_with_year('asset_details')
        ]);
    }

}
