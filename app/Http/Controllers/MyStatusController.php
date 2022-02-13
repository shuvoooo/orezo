<?php

namespace App\Http\Controllers;

use App\Models\FileStatus;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Support\Facades\Auth;

class MyStatusController extends Controller
{
    public function my_file_status()
    {
        $fileStatus = FileStatus::where('user_id', Auth::user()->id)->year()->orderBy('id', 'desc')->with('user')->get();
        $statusList = FileStatus::statusList();

        return view('user.my_file_status', compact('fileStatus', 'statusList'));
    }

    public function view_tax_summary()
    {
        $user_id = Auth::user()->id;


        $invoice = Invoice::where(['user_id' => $user_id, 'year' => request('year')])->first();

        if (!$invoice) {
            return redirect()->back()->with('error', 'No invoice found for this year');
        }

        $invoiceItems = InvoiceItem::where(['invoice_id' => $invoice->id])->get();

        $total = Invoice::getTotal($invoice->id);


        return view('user.view_tax_summary', compact('invoiceItems', 'invoice', 'total'));
    }


    public function payment_info()
    {
        $user_id = Auth::user()->id;
        $list = Invoice::where(['user_id' => $user_id, 'payment_status' => 1])->orderBy('id', 'desc')->get();
        return view('user.payment_info', compact('list'));
    }
}
