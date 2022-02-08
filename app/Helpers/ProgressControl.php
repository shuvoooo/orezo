<?php

namespace App\Helpers;

use App\Models\Progress;
use App\Models\ProgressHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class ProgressControl
{
    // This progress List related with route name

    public static $progressList = [
        "personal_information" => 1,
        "personal_information_store" => 19,
        "spouse_details" => 1,
        "spouse_details_store" => 9,
        "dependent_details" => 0,
        "dependent_details_store" => 0,
        "bank_details" => 1,
        "bank_details_store" => 9,
        "employer_details" => 0,
        "employer_details_store" => 0,
        "project_details" => 0,
        "project_details_store" => 0,
        "residency_details" => 1,
        "residency_details_store" => 9,
        "expense_details" => 1,
        "expense_details_store" => 9,
        "asset_details" => 1,
        "asset_details_store" => 9,
        "miscellaneous_details" => 1,
        "miscellaneous_details_store" => 9,
        "upload_tax_documents" => 5,
        "upload_tax_documents_store" => 15
    ];

    public static function processUpdate(): bool
    {
        $progress = Progress::where('user_id', Auth::id())->where('year', request('year'))->first();

        if (!$progress) {
            $progress = new Progress();
            $progress->user_id = Auth::id();
            $progress->year = request('year');
            $progress->save();
        }

        $progressHistory = ProgressHistory::where('progress_id', $progress->id)->where('progress_name', Route::currentRouteName())->first();

        if (!$progressHistory) {
            $progress->percentage = (self::$progressList[Route::currentRouteName()] ?? 0) + $progress->percentage;
            $progress->save();

            ProgressHistory::create([
                'progress_id' => $progress->id,
                'progress_name' => Route::currentRouteName(),
                'value' => (self::$progressList[Route::currentRouteName()] ?? 0)
            ]);
            return true;
        }

        return false;
    }


    public static function hasProgress(): bool
    {
        return Auth::user()->role == 'user' && array_key_exists(Route::currentRouteName(), self::$progressList);
    }

    public static function getProgress(): int
    {
        $progress = Progress::where('user_id', Auth::id())->where('year', request('year'))->first();


        if ($progress) {
            return $progress->percentage;
        }

        return 0;
    }
}
