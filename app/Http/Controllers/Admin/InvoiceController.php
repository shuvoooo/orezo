<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class InvoiceController extends Controller
{
    public function invoice()
    {
        $users = User::where('role', 'user')->get();
        return view('admin.invoice', compact('users'));
    }
}
