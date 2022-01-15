<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Upload;
use App\Models\User;
use App\Notifications\GeneralNotification;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function upload_tax_documents()
    {
        $document = Document::where('user_id', auth()->user()->id)->year()->get()->map(function ($item) {
            return [
                'title' => $item->title,
                'comments' => $item->comments,
                'files' => $item->upload->map(function ($file) {
                    return [
                        'id' => $file->id,
                        'filename' => $file->filename,
                    ];
                }),
            ];
        });


        return view('user.documents.tax_document_upload', compact('document'));
    }

    public function upload_tax_documents_store(Request $request): JsonResponse
    {
        $request->validate([
            'files.*' => 'required|mimes:pdf,doc,docx,jpg,jpeg,png,bmp,gif,svg,xlsx,csv',
            'title' => 'required',
            'comments' => 'nullable',
            'deletedFileIds' => 'json'
        ]);

        foreach (json_decode($request->deletedFileIds) ?? [] as $deletedFileId) {
            $fileDelete = Upload::find($deletedFileId);
            if ($fileDelete) {
                Storage::delete($fileDelete->path);
                $fileDelete->delete();
            }
        }


        $file_url = collect();
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $file_name = $file->getClientOriginalName();
                $file_ext = $file->getClientOriginalExtension();
                $file_name_only = basename($file_name, '.' . $file_ext);
                $file_new_name = $file_name_only . '_' . time() . '.' . $file_ext;

                $file_url->push([
                    'filename' => $file_name,
                    'path' => $file->storeAs('public/tax_documents', $file_new_name)
                ]);
            }
        }

        $document = Document::where([
            ['user_id', auth()->user()->id],
            ['title', $request->title]
        ])->year()->first();

        if ($document) {
            $document->update([
                'title' => $request->title,
                'comments' => $request->comments
            ]);
        } else {
            $document = Document::create([
                'user_id' => auth()->user()->id,
                'title' => $request->title,
                'comments' => $request->comments
            ]);
        }

        foreach ($file_url as $item) {
            Upload::create([
                'document_id' => $document->id,
                'filename' => $item['filename'],
                'path' => $item['path']
            ]);
        }

        $admins = User::where('role', 'admin')->where('role', 'staff')->get();

        Notification::send($admins, new GeneralNotification('Document Updated', 'Documents update by ' . auth()->user()->name));

        return response()->json(['message' => 'Document uploaded successfully']);
    }

    public function download_tax_documents()
    {
        return view('user.documents.tax_document_download');
    }

    public function download_tax_documents_store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);


    }

    public function comments_store(Request $request)
    {

    }
}
