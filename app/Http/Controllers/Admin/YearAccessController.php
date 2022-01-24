<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function now;
use function response;
use function view;

class YearAccessController extends Controller
{
    public function edit()
    {
        $years = DB::table('user_edit_permissions')->get()->groupBy('year')->map->first();

        return view('admin.year_access', compact('years'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'year' => 'required',
            'value' => 'required',
        ]);

        try {
            $year = DB::table('user_edit_permissions')->where('year', $request->year)->first();

            if (!$year) {
                DB::table('user_edit_permissions')->insert([
                    'year' => $request->year,
                    'user_can_edit' => $request->value ? 1 : 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                DB::table('user_edit_permissions')->where('year', $request->year)->update([
                    'user_can_edit' => $request->value ? 1 : 0,
                    'updated_at' => now(),
                ]);
            }

            return response()->json(['success' => 'Year Access Updated Successfully.']);
        } catch (\Exception $e) {
            return response()->json(['danger' => $e->getMessage()], 500);
        }
    }
}
