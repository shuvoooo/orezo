<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ClientDataTable;
use App\Http\Controllers\Controller;

class ClientListController extends Controller
{
    public function client(ClientDataTable $dataTable)
    {
        return $dataTable->render('admin.client_list');
    }
}
