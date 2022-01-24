<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RolePermission;
use App\Models\User;
use App\Notifications\GeneralNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */
    public function index(Builder $dataTable)
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
                    return '<a href="' . route('admin.staff.edit', $item['id']) . '" class="btn btn-xs btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                        <form action="' . route('admin.staff.destroy', $item['id']) . '" method="POST" style="display: inline-block;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="' . csrf_token() . '">
                            <button type="submit" class="btn btn-xs btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                            </form>
                            ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $dataTable->columns([
            ['data' => 'name', 'name' => 'name', 'title' => 'Staff Name'],
            ['data' => 'email', 'name' => 'email', 'title' => 'Email'],
            ['data' => 'updated_at', 'name' => 'updated_at', 'title' => 'Updated At'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false],
        ]);

        return view('admin.staff.index', compact('dataTable'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('admin.staff.create', ['menus' => get_admin_route()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'permission' => 'required|array',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'staff',
        ]);

        $user->notify(new GeneralNotification("Staff Created", "New Staff Account has been added by " . auth()->user()->name));


        $role = new RolePermission();
        $role->user_id = $user->id;
        $role->details = $request->permission;
        $role->save();

        return redirect()->route('admin.staff.index')->with('success', 'Staff created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = User::findOrFail($id);

        $permissions = json_decode(RolePermission::where('user_id', $id)->first()->details ?? '[]' )??[];


        return response()->view('admin.staff.edit', ['staff' => $staff, 'menus' => get_admin_route(), 'permissions' => $permissions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $staff = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'permission' => 'required|array',
        ]);
        // dd($request->permission);

        $staff->name = $request->name;

        if ($request->has('password')) {
            $staff->password = Hash::make($request->password);
        }

        $staff->save();

        $role = RolePermission::where('user_id', $id)->first();
        if (!$role) {
            $role = new RolePermission();
            $role->user_id = $staff->id;
        }
        $role->details = json_encode($request->permission);
        $role->save();


        return redirect()->route('admin.staff.index')->with('success', 'Staff updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.staff.index')->with('success', 'Staff deleted successfully');
    }
}
