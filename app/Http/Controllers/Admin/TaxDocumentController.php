<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\User;

class TaxDocumentController extends Controller
{
    public function download_tax_document(User $user)
    {
        return response()->view('admin.tax_document.download_tax_document');
    }

    public function user_tax_document(User $user)
    {
        $documents = Document::where('user_id', $user->id)->get();

        return response()->view('admin.tax_document.user_tax_document', compact('documents'));
    }

}
