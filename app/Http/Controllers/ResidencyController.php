<?php

namespace App\Http\Controllers;

use App\Models\Residency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResidencyController extends Controller
{
    public function residency_details()
    {
        $residency_details = residency::where('user_id', Auth::id())->get();
        return response()->view('user.employer.residency_details', compact('residency_details'));
    }

    public function residency_details_store(Request $request)
    {
        $request->validate([
            'payer' => 'required',
        ]);

        try {
            $data = $request->all();
            $data['user_id'] = Auth::id();
            Residency::create($data);

            return response()->json(['success' => 'Residency added successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }


    public function residency_details_destroy($id)
    {
        $residency_details = Residency::find($id);
        $residency_details->delete();
        return redirect()->back()->with('success', 'Project Deleted Successfully');
    }
}
