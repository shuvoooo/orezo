<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileStatus extends Controller
{
    function index(){
        return view('admin.file_status.index');
    }
}
