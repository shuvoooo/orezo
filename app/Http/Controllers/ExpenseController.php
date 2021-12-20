<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function expense_details(Request $request)
    {
        $expense = Expense::where('user_id', auth()->user()->id)->whereYear('created_at', $request->route('year'))->first();
        return view('user.tax.expense_details', ['expense' => $expense]);
    }

    public function expense_details_store(Request $request)
    {
        $expense = Expense::where('user_id', auth()->user()->id)->whereYear('created_at', $request->route('year'))->first();

        if (!$expense) {
            $expense = new Expense();
            $expense->user_id = auth()->user()->id;
        }
        $expense->details = $request->details;
        $expense->save();

        return response()->json(['success' => 'Expense Details Added Successfully']);
    }

}
