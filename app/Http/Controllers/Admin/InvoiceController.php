<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class InvoiceController extends Controller
{
    public function index()
    {

    }
    public function create()
    {
        $invoices = Invoice::orderBy('id', 'desc')->get();
        return view('admin.invoice.create', compact('invoices'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'invoiceItems' => 'required|array',
        ]);
        try {
            $user = User::find($request->user_id);

            $invoice = Invoice::create([
                'title' => $request->title,
                'description' => $request->commnet,
                'user_id' => $user->id,
                'added_by' => Auth::id(),
                'user_email' => $request->email,
            ]);

            foreach ($request->invoiceItems as $item) {
                InvoiceItem::create([
                    'invoice_id' => $invoice->id,
                    'title' => $item['title'],
                    'quantity' => 1,
                    'price' => $item['price'],
                ]);
            }

            $invoice_total_array = Invoice::getTotal($invoice->id, false);

            # update invoice total
            $invoice->update([
                'total_amount' => $invoice_total_array['sub_total']
            ]);

            //Tax Row
            Invoiceitem::create([
                'invoice_id' => $invoice->id,
                'title' => Invoice::$tax_text,
                'quantity' => 1,
                'price' => $invoice_total_array['tax'],
            ]);


            if ($request->send_email == 1) {
                $this->sendInvoice($invoice, $user);
            }

            return response()->json([
                'success' => true,
                'message' => 'Invoice created successfully.',
                'redirect' => ''
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ]);
        }
    }


    public function edit(Invoice $invoice)
    {
        $user = auth()->user();
        $invoiceItems = InvoiceItem::where('invoice_id', $invoice->id)->get();
        //dd($invoiceItems);
        return response()->view('admin.invoice.edit', compact('invoice', 'user', 'invoiceItems'));
    }

    public function update(Invoice $invoice, Request $request)
    {
        $request->validate([
            'invoiceItems' => 'required|array',
        ]);

        try {
            $invoice->update([
                'title' => $request->title,
                'description' => $request->commnet,
                'user_email' => $request->email,
            ]);

            foreach ($request->invoiceItems as $item) {
                InvoiceItem::updateOrCreate([
                    'id' => $item['id'],
                    'invoice_id' => $invoice->id
                ], [

                    'title' => $item['title'],
                    'quantity' => 1,
                    'price' => $item['price'],
                ]);
            }

            $invoice_total_array = Invoice::getTotal($invoice->id, false);

            # update invoice total
            $invoice->update([
                'total_amount' => $invoice_total_array['sub_total']
            ]);

            //Tax Row
            Invoiceitem::updateOrCreate([
                'title' => Invoice::$tax_text,
                'invoice_id' => $invoice->id
            ], [
                'quantity' => 1,
                'price' => $invoice_total_array['tax'],
            ]);

            if ($request->send_email == 1) {
                $this->sendInvoice($invoice, User::find($invoice->user_id));
            }

            return response()->json([
                'success' => true,
                'message' => 'Invoice updated successfully.',
                'redirect' => ''
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ]);
        }
    }

    public function sendInvoice($invoice, $user)
    {

        $app_name = env('APP_NAME');
        $to = empty($invoice->user_email) ? $user->email : $invoice->user_email;

        $invoice_link = route('user.invoice.details', ['id' => $invoice->id * 123456]);

        $message = "<p>Dear {$user->name},</p><br>";
        $message .= "<p>You are assigned an invoice.</p>";
        $message .= "<p>Invoice Title: {$invoice->name}</p>";
        $message .= "<p>Description: {$invoice->description}</p>";
        $message .= "Please click on the below button or copy the below link and paste on the url to see the invoice details.";
        $message .= "<p><a class='btn' href='{$invoice_link}'>Invoice Details</a></p>";
        $message .= "<p>Link: {$invoice_link}</p>";
        $message .= "<br><p>Thanks<br>{$app_name}</p>";


        $title = "An Invoice from {$app_name}";

        try {
            Mail::send('email.default', ['title' => $title, 'content' => $message], function ($message) use ($title, $to) {
                $message->to($to);
                $message->subject($title);
            });
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
