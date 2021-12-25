<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ClientDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;

class ClientListController extends Controller
{
    public function client_details(ClientDataTable $dataTable)
    {
        return $dataTable->render('admin.client_list');
    }

    public function client_list()
    {
        $clients = User::where('role', 'user')->get()->map(function($item){
            return [
                'id' => $item->id,
                'name' => $item->name,
                'email' => $item->email,
            ];
        });
        return response()->json($clients);
    }
}
