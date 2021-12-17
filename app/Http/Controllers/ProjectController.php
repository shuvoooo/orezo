<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function project_details()
    {
        $project_details = Project::where('user_id', Auth::id())->get();
        return response()->view('user.tax.project_details', compact('project_details'));
    }

    public function project_details_store(Request $request)
    {
        $request->validate([
            'project' => 'required',
        ]);

        try {
            $data = $request->all();
            $data['user_id'] = Auth::id();
            Project::create($data);

            return response()->json(['success' => 'Project added successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }


    public function project_details_destroy($id)
    {
        $project_details = Project::find($id);
        $project_details->delete();
        return redirect()->back()->with('success', 'Project Deleted Successfully');
    }
}
