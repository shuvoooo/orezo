<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FileStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class FileStatusController extends Controller
{


    function file_status(Builder $dataTable, Request $request, User $user)
    {
        $statuses = FileStatus::statusList();

        $filestatuses = FileStatus::where('user_id', $user->id)->where('year', request('year'))->get();

        $fileStatusCollect = collect();

        foreach ($filestatuses as $filestatus) {
            $fileStatusCollect->push([
                'id' => $filestatus->id,
                'status_by' => $filestatus->addedBy->name,
                'status' => $statuses[$filestatus->status],
                'created_at' => $filestatus->created_at->format('d-m-Y'),
            ]);
        }


        if ($request->ajax()) {
            return DataTables::collection($fileStatusCollect)
                ->addColumn('action', function ($file) {
                    return '<a href="' . route('admin.file_status.delete_file_status', $file['id']) . '" class="btn btn-xs btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $dataTable->columns([
            ['data' => 'status_by', 'name' => 'status_by', 'title' => 'Status By'],
            ['data' => 'status', 'name' => 'status', 'title' => 'Status'],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => 'Date Time'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false],
        ]);

        return response()->view('admin.file_status.index', compact('user', 'statuses', 'dataTable'));

    }


    public function add_file_status(User $user, Request $request)
    {
        $this->validate($request, [
            'status' => 'required',
        ]);

        $file_status = new FileStatus();
        $file_status->user_id = $user->id;
        $file_status->status = $request->status;
        $file_status->added_by = auth()->user()->id;
        $file_status->year = request('year') ?? date('Y');
        $file_status->save();

        return redirect()->back()->with('success', 'File Status Added Successfully');

    }

    public function delete_file_status(FileStatus $file_status)
    {
        $file_status->delete();
        return redirect()->back()->with('success', 'File Status Deleted Successfully');
    }
}
