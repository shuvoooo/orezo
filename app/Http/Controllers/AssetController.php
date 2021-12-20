<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Exception;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function asset_details(Request $request)
    {
        $asset_details = Asset::where('user_id', auth()->user()->id)->whereYear('created_at', $request->route('year'))->first()->details;
        return view('user.tax.asset_details', compact('asset_details'));
    }

    public function asset_details_store(Request $request)
    {
        try {

            $asset = Asset::where('user_id', auth()->user()->id)->whereYear('created_at', $request->route('year'))->first();

            if (!$asset) {
                $asset = new Asset();
                $asset->user_id = auth()->user()->id;
            }
            $asset->details = $request->details;
            $asset->save();

            return response()->json(['message' => 'Asset Details Successfully Updated']);

        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
}
