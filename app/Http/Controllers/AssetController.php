<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function asset_details()
    {
        $asset_details = Asset::where('user_id', auth()->user()->id)->first()->details;
        return view('user.tax.asset_details', compact('asset_details'));
    }

    public function asset_details_store(Request $request)
    {
        $asset = Asset::where('user_id', auth()->user()->id)->first();

        if (!$asset) {
            $asset = new Asset();
            $asset->user_id = auth()->user()->id;
        }
        $asset->details = $request->details;
        $asset->save();

        return response()->json(['message' => 'Asset Details Successfully Updated']);
    }
}
