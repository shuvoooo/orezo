<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function user_dashboard()
    {
        return view('user.user_dashboard');
    }
}
