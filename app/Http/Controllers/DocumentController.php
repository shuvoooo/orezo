<?php

namespace App\Http\Controllers;

class DocumentController extends Controller
{
    public function upload_tax_documents()
    {
        return view('user.documents.tax_document_upload');
    }
}
