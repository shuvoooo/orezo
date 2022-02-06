<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Document;
use App\Models\DownloadSave;
use App\Models\Upload;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TaxDocumentController extends Controller
{
    public function download_tax_document(User $user)
    {
        $downloads = DownloadSave::where('user_id', $user->id)->where('year', request('year'))->orderBy('created_at', 'desc')->get();
        $comments = Comment::where('user_id', $user->id)->where('year', request('year'))->orderBy('created_at', 'desc')->get();


        $user_downloads = $downloads->filter(function ($item) use ($user) {
            return $item->added_by == $user->id;
        });

        $org_downloads = $downloads->filter(function ($item) use ($user) {
            return $item->added_by != $user->id;
        });


        return response()->view('admin.tax_document.download_tax_document', compact('user', 'user_downloads', 'org_downloads', 'comments'));
    }


    public function user_tax_document(User $user)
    {
        $documents = Document::where('user_id', $user->id)->get();

        return response()->view('admin.tax_document.user_tax_document', compact('documents'));
    }

    public function download_user_tax_document(Upload $upload)
    {
        return Storage::download($upload->path, $upload->filename);
    }

    public function download_tax_document_store(Request $request, User $user, $year)
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
                'user_id' => $user->id,
                'added_by' => auth()->user()->id,
                'filename' => $file_name_only . "." . $file_ext,
                'path' => $request->file('file')->storeAs('public/tax_documents', $file_new_name),
                'year' => $year,
            ]);

        }

        return redirect()->back()->with('success', 'File downloaded successfully');
    }

    public function download_tax_document_delete($id)
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

    public function download_tax_document_download($id)
    {
        $downloadSave = DownloadSave::find($id);

        abort_unless($downloadSave, 404);

        return Storage::download($downloadSave->path, $downloadSave->filename);
    }


    public function comment_store(Request $request, User $user, $year)
    {
        $request->validate([
            'comment' => 'required',
        ]);

        $comment = Comment::create([
            'user_id' => $user->id,
            'added_by' => auth()->user()->id,
            'comment' => $request->comment,
            'year' => $year,
        ]);

        return redirect()->back()->with('success', 'Comment added successfully');
    }
}
