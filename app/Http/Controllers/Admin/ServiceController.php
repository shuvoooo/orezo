<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ServiceController extends Controller
{

    public function index()
    {
        $services = Service::all();
        return view('admin.service.index', compact('services'));
    }

    public function create()
    {
        return view('admin.service.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url' => 'required|unique:services',
            'icon' => 'nullable',
            'status' => 'required',
        ]);

        $name = null;
        if ($request->hasFile('image')) {
            $name = $request->image->store("public/services");
        }

        $service = new Service();
        $service->name = $request->name;
        $service->description = $request->description;
        $service->image = $name;
        $service->url = $request->url;
        $service->icon = $request->icon;
        $service->is_active = $request->status;
        $service->save();

        return redirect()->route('admin.service.index')->with('success', 'Service created successfully');
    }

    public function edit(Service $service)
    {
        return view('admin.service.edit', compact('service'));
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.service.index')->with('success', 'Service deleted successfully');
    }

    public function update(Request $request, Service $service)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url' => 'required|nullable',
            'icon' => 'nullable',
            'status' => 'required',
        ]);

        $name = null;
        if ($request->hasFile('image')) {
            if ($service->image) {
                Storage::delete($service->image);
            }
            $name = $request->image->store("public/services");
        }

        $service->name = $request->name;
        $service->description = $request->description;
        $service->image = $name;
        $service->url = $request->url;
        $service->icon = $request->icon;
        $service->is_active = $request->status;
        $service->save();

        return redirect()->route('admin.service.index')->with('success', 'Service updated successfully');
    }
}
