<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePage;
use Illuminate\Http\Request;
use function redirect;
use function view;

class HomePageController extends Controller
{

    public function index()
    {
        return view('homepage');
    }

    public function edit()
    {
        $home_page = HomePage::first();
        return view('admin.home_page.edit', compact('home_page'));
    }

    public function update(Request $request)
    {
        $home_page = HomePage::first();
        $title = implode('/', $request->title);
        $info = [];
        foreach ($request->info as $key => $value) {
            for ($i = 0; $i <= 2; $i++) {
                $info[$i][$key] = $value[$i];
            }
        }

        $counters = [
            'clients' => $request->clients,
            'year_in_business' => $request->year_in_business,
            'tax_prepared' => $request->tax_prepared,
            'staff_members' => $request->staff_members,
        ];

        $request->merge([
            'title' => $title,
            'info' => $info,
            'counters' => $counters,
        ]);

        $home_page->update($request->except(['clients', 'year_in_business', 'tax_prepared', 'staff_members']));

        return redirect()->route('admin.home_page.edit')->with('success', 'Home Page Updated Successfully');
    }
}
