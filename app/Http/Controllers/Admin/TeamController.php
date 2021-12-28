<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::where('is_active', 1)->get();
        return view('admin.team.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
        ]);

        //create social link array
        $social_links = [];
        if ($request->has('facebook')) {
            $social_links['facebook'] = $request->facebook;
        }
        if ($request->has('twitter')) {
            $social_links['twitter'] = $request->twitter;
        }
        if ($request->has('linkedin')) {
            $social_links['linkedin'] = $request->linkedin;
        }
        if ($request->has('github')) {
            $social_links['github'] = $request->github;
        }

        //create team
        $team = new Team();
        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->image = $request->image->store('public/team');
        $team->social_link = $social_links;
        $team->is_active = $request->status;
        $team->save();

        return redirect()->route('admin.team.index')->with('success', 'Team created successfully.');
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::find($id);
        abort_unless($team, 404);

        return view('admin.team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
        ]);

        //create social link array
        $social_links = [];
        if ($request->has('facebook')) {
            $social_links['facebook'] = $request->facebook;
        }
        if ($request->has('twitter')) {
            $social_links['twitter'] = $request->twitter;
        }
        if ($request->has('linkedin')) {
            $social_links['linkedin'] = $request->linkedin;
        }
        if ($request->has('github')) {
            $social_links['github'] = $request->github;
        }

        //update team
        $team = Team::find($id);
        $team->name = $request->name;
        $team->designation = $request->designation;
        if ($request->has('image')) {
            if ($team->image) {
                Storage::destroy($team->image);
            }
            $team->image = $request->image->store('public/team');
        }
        $team->social_link = $social_links;
        $team->is_active = $request->status;
        $team->save();

        return redirect()->route('admin.team.index')->with('success', 'Team updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $team = Team::find($id);
        abort_unless($team, 404);

        if ($team->image) {
            Storage::destroy($team->image);
        }
        $team->delete();

        return redirect()->route('admin.team.index')->with('success', 'Team deleted successfully.');
    }
}
