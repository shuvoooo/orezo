<?php

namespace App\Http\Controllers;

use App\Models\HomePage;
use Illuminate\Http\Request;

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
        $request->merge([
            'title' => $title,
            'info' => $info,
        ]);

        $home_page->update($request->all());
        return redirect()->route('admin.home_page.edit')->with('success', 'Home Page Updated Successfully');
    }
}
