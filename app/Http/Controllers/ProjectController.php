<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Notifications\GeneralNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class ProjectController extends Controller
{
    public function project_details(Request $request)
    {
        $project_details = Project::where('user_id', Auth::id())->year()->get();
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


            $admins = User::where('role', 'admin')->orWhere('role', 'staff')->get();
            Notification::send($admins, new GeneralNotification("Project Details", "New Project Details Added"));

            return response()->json(['success' => 'Project added successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }


    public function project_details_destroy($year, Project $project)
    {
        try {
            $project->delete();
            return redirect()->back()->with('success', 'Project deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
