<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\User;
use App\Notifications\GeneralNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class InvoiceController extends Controller
{
    public $encrypt = 2341347971;

    public function index(Builder $dataTable)
    {
        $invoices = Invoice::orderBy('updated_at', 'desc')->get();

        $invCollect = collect();

        foreach ($invoices as $invoice) {
            if ($invoice->payment_status == 1)
                $total = $invoice->total_amount ?? 0;
            else
                $total = Invoice::getTotal($invoice->id);

            $invCollect->push([
                'id' => $invoice->id,
                'invoice_to' => $invoice->user->name,
                'title' => $invoice->name,
                'description' => $invoice->description,
                'invoice_id' => $invoice->id,
                'amount' => '$' . $total,
                'status' => $invoice->payment_status == 1 ? "paid" : "pending",
                'added_by' => $invoice->addedBy->name,
                'datetime' => $invoice->updated_at->format('d-m-Y'),
            ]);
        }


        if (request()->ajax()) {
            return DataTables::collection($invCollect)
                ->addColumn('action', function ($invoice) {
                    $view = '<a href="' . route('invoice.show', ($invoice['id'] * $this->encrypt)) . '" class="btn btn-xs btn-warning btn-sm"><i class="fa fa-eye"></i> View</a>';
                    if ($invoice['status'] != 'paid')
                        $view .= '<a href="' . route('admin.invoice.edit', $invoice['id']) . '" class="btn btn-xs btn-primary btn-sm ml-2"><i class="fa fa-edit"></i> Edit</a>';

                    return '<div class="d-flex">' . $view . '</div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $dataTable->columns([
            ['data' => 'invoice_to', 'name' => 'invoice_to', 'title' => 'Invoice To'],
            ['data' => 'title', 'name' => 'title', 'title' => 'Title'],
            ['data' => 'description', 'name' => 'description', 'title' => 'Description'],
            ['data' => 'invoice_id', 'name' => 'invoice_id', 'title' => 'Invoice ID'],
            ['data' => 'amount', 'name' => 'amount', 'title' => 'Amount'],
            ['data' => 'status', 'name' => 'status', 'title' => 'Status'],
            ['data' => 'added_by', 'name' => 'added_by', 'title' => 'Added By'],
            ['data' => 'datetime', 'name' => 'datetime', 'title' => 'DateTime'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false],
        ]);

        return view('admin.invoice.index', compact('dataTable'));
    }

    public function create()
    {
        $invoices = Invoice::orderBy('id', 'desc')->get();
        return view('admin.invoice.create', compact('invoices'));
    }

    public function show($id)
    {
        $id = $id / $this->encrypt;
        $invoice = Invoice::findOrFail($id);
        $invoiceItems = InvoiceItem::where('invoice_id', $invoice->id)->get();
        return view('admin.invoice.view', compact('invoice', 'invoiceItems'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'invoiceItems' => 'required|array',
            'user_id' => 'required',
        ]);


        try {
            $user = User::findOrFail($request->user_id);

            $invoice = Invoice::create([
                'name' => $request->title,
                'description' => $request->input('comment'),
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

            $user->notify(new GeneralNotification("Invoice", "New invoice has been added", route('invoice.show', $invoice->id * $this->encrypt), "fa fa-file-invoice-dollar"));

            return response()->json([
                'success' => true,
                'message' => 'Invoice created successfully.',
                'redirect' => route('admin.invoice.index')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
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
            'title' => 'required',
            'comment' => 'required',
        ]);

        try {
            $invoice->update([
                'name' => $request->title,
                'description' => $request->input('comment'),
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
                'redirect' => route('admin.invoice.index')
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
