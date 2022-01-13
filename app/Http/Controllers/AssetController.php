<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\User;
use App\Notifications\GeneralNotification;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class AssetController extends Controller
{
    public function asset_details()
    {
        $asset_details = Asset::where('user_id', auth()->user()->id)->year()->first();
        $asset_details = $asset_details->details ?? [];

        return view('user.tax.asset_details', compact('asset_details'));
    }

    public function asset_details_store(Request $request): JsonResponse
    {
        try {

            $asset = Asset::where('user_id', auth()->user()->id)->year()->first();

            if (!$asset) {
                $asset = new Asset();
                $asset->user_id = auth()->user()->id;
            }
            $asset->details = $request->details;
            $asset->save();

            return response()->json([
                'message' => 'Asset Details Successfully Updated',
                'url' => route_with_year('miscellaneous_details')
            ]);


            $admins = User::where('role', 'admin')->where('role', 'staff')->get();

            Notification::send($admins, new GeneralNotification('Asset Updated', 'Asset Details Updated  by ' . auth()->user()->name));

        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
}
