<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Upload;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function upload_tax_documents()
    {
        return view('user.documents.tax_document_upload');
    }

    public function upload_tax_documents_store(Request $request)
    {
        $request->validate([
            'files.*' => 'required|mimes:pdf,doc,docx,jpg,jpeg,png,bmp,gif,svg,xlsx,csv',
            'title' => 'required'
        ]);

        $file_url = collect();
        foreach ($request->file('files') as $file) {
            $file_name = $file->getClientOriginalName();
            $file_ext = $file->getClientOriginalExtension();
            $file_name_only = basename($file_name, '.' . $file_ext);
            $file_new_name = $file_name_only . '_' . time() . '.' . $file_ext;
            $file_url->push($file->storeAs('public/tax_documents', $file_new_name));
        }

        $document = Document::where([
            ['user_id', auth()->user()->id],
            ['title', $request->title]
        ])->year()->first();

        if ($document) {
            $document->update([
                'title' => $request->title,
                'description' => $request->description,
                'comment' => $request->comment
            ]);
        } else {
            $document = Document::create([
                'user_id' => auth()->user()->id,
                'files' => $file_url->implode(','),
                'title' => $request->title,
                'description' => $request->description
            ]);
        }

        foreach ($file_url as $item) {
            Upload::create([
                'document_id' => $document->id,
                'filename' => $item
            ]);
        }

        return response()->json(['message' => 'Document uploaded successfully']);
    }
}
