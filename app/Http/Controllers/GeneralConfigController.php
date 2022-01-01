<?php

namespace App\Http\Controllers;

use App\Models\GeneralConfig;
use Illuminate\Http\Request;

class GeneralConfigController extends Controller
{
    public function index()
    {
        $configs = GeneralConfig::all();
        return view('admin.general_config.index', compact('configs'));
    }

    public function create()
    {
        return view('admin.general_config.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'key' => 'required',
            'value' => 'required',
        ]);

        $general_config = new GeneralConfig;
        $general_config->name = $request->name;
        $general_config->key = $request->key;
        $general_config->value = $request->value;
        $general_config->save();

        return redirect()->route('admin.general-config.index')->with('success', 'General Config created successfully.');
    }

    public function edit(GeneralConfig $general_config)
    {
        return view('admin.general_config.edit', compact('general_config'));
    }

    public function show()
    {

    }

    public function update(Request $request, GeneralConfig $general_config)
    {
        $request->validate([
            'name' => 'required',
            'value' => 'required',
        ]);
        $general_config->name = $request->name;
        $general_config->value = $request->value;
        $general_config->save();

        return redirect()->route('admin.general-config.index')->with('success', 'General Config updated successfully.');
    }

    public function destroy(GeneralConfig $general_config)
    {
        $general_config->delete();

        return redirect()->route('admin.general-config.index')->with('success', 'General Config deleted successfully.');
    }


}
