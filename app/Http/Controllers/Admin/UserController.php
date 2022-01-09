<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class UserController extends Controller
{
    public function staff_index(Builder $dataTable)
    {
        $staffs = User::where('role', 'staff')->orderBy('updated_at', 'desc')->get();

        $staffCollect = collect();

        foreach ($staffs as $staff) {
            $staffCollect->push([
                'id' => $staff->id,
                'name' => $staff->name,
                'email' => $staff->email,
                'updated_at' => $staff->updated_at->format('d/m/Y'),
            ]);
        }


        if (request()->ajax()) {
            return DataTables::collection($staffCollect)
                ->addColumn('action', function ($item) {
                    return '<a href="' . route('admin.staff.edit', $item['id']) . '" class="btn btn-xs btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return $builder->make('admin.user.staff_index');
    }


    public function staff_create()
    {
        return view('admin.staff.create');
    }

    public function staff_store()
    {
        return redirect()->route('admin.staff.index');
    }

    public function staff_edit(){

    }


}
