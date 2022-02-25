<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Document;
use App\Models\DownloadSave;
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

    public function upload_tax_documents_store_file(Request $request): JsonResponse
    {
        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx,jpg,jpeg,png,bmp,gif,svg,xlsx,csv',
            'title' => 'required'
        ]);


        $file_url = collect();
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file_name = $file->getClientOriginalName();
            $file_ext = $file->getClientOriginalExtension();
            $file_name_only = basename($file_name, '.' . $file_ext);
            $file_new_name = $file_name_only . '_' . time() . '.' . $file_ext;

            $file_url->push([
                'filename' => $file_name,
                'path' => $file->storeAs('public/tax_documents', $file_new_name)
            ]);

        }

        $document = Document::where([
            ['user_id', auth()->user()->id],
            ['title', $request->title]
        ])->year()->first();

        if (!$document) {
            $document = new Document();
            $document->user_id = auth()->user()->id;
            $document->title = $request->title;
            $document->save();
        }


        $upload = null;
        foreach ($file_url as $item) {
            $upload = Upload::create([
                'document_id' => $document->id,
                'filename' => $item['filename'],
                'path' => $item['path']
            ]);
        }

        $admins = User::where('role', 'admin')->orWhere('role', 'staff')->get();

        Notification::send($admins, new GeneralNotification('Document Updated', 'Documents update by ' . auth()->user()->name));

        return response()->json([
            'message' => 'Document uploaded successfully',
            'id' => $upload->id,
            'name' => $upload->filename,
        ]);
    }

    public function upload_tax_documents_file_delete(Request $request)
    {
        $request->validate([
            'fileId' => 'required'
        ]);

        $fileDelete = Upload::find($request->fileId);
        if ($fileDelete) {
            Storage::delete($fileDelete->path);
            $fileDelete->delete();
        }


        return response()->json(['message' => 'File deleted successfully']);
    }

    public function upload_tax_documents_store_comments(Request $request): JsonResponse
    {
        $request->validate([
            'title' => 'required',
            'comments' => 'required',
        ]);

        $document = Document::where([
            ['user_id', auth()->user()->id],
            ['title', $request->title]
        ])->year()->first();


        if ($document) {
            $document->update([
                'comments' => $request->comments
            ]);
        } else {
            $document = Document::create([
                'user_id' => auth()->user()->id,
                'title' => $request->title,
                'comments' => $request->comments
            ]);
        }

        return response()->json(['message' => 'Document commented successfully']);
    }

    public function download_tax_documents()
    {
        $downloads = DownloadSave::where('user_id', auth()->user()->id)->year()->get();
        $comments = Comment::where('user_id', auth()->user()->id)->year()->orderBy('created_at', 'desc')->get();

        $user_downloads = $downloads->filter(function ($item) {
            return $item->added_by == auth()->id();
        });

        $org_downloads = $downloads->filter(function ($item) {
            return $item->added_by != auth()->id();
        });
        return view('user.documents.tax_document_download', compact('user_downloads', 'org_downloads', 'comments'));
    }

    public function download_tax_documents_store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx,jpg,jpeg,png,bmp,gif,svg,xlsx,csv',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file_name = $file->getClientOriginalName();
            $file_ext = $file->getClientOriginalExtension();
            $file_name_only = basename($file_name, '.' . $file_ext);
            $file_new_name = $file_name_only . '_' . time() . '.' . $file_ext;


            $downloadSave = DownloadSave::create([
                'user_id' => auth()->user()->id,
                'added_by' => auth()->user()->id,
                'filename' => $file_name_only . "." . $file_ext,
                'path' => $request->file('file')->storeAs('public/tax_documents', $file_new_name)
            ]);
        }

        return redirect()->back()->with('success', 'File downloaded successfully');

    }

    public function download_tax_documents_delete($year, $id)
    {
        $downloadSave = DownloadSave::find($id);

        abort_unless($downloadSave, 404);

        if ($downloadSave->added_by == auth()->user()->id) {
            Storage::delete($downloadSave->path);
            $downloadSave->delete();

            return redirect()->back()->with('success', 'File deleted successfully');
        } else {
            return redirect()->back()->with('error', 'You are not authorized to delete this file');
        }
    }

    public function download_tax_documents_download($year, $id)
    {


        $downloadSave = DownloadSave::find($id);

        abort_unless($downloadSave, 404);

        if ($downloadSave) {
            return Storage::download($downloadSave->path, $downloadSave->filename);
        }
    }

    public function comments_store(Request $request)
    {

        $request->validate([
            'comment' => 'required'
        ]);

        Comment::create([
            'user_id' => auth()->user()->id,
            'comment' => $request->comment,
            'added_by' => auth()->user()->id
        ]);

        return redirect()->back()->with('success', 'Comment added successfully');
    }
}
