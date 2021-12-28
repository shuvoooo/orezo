<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brand.create');
    }


    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'logo' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
        ]);

        $name = null;
        if ($request->hasFile('logo')) {
            $name = $request->logo->store("public/brands");
        }

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->logo = $name;
        $brand->is_active = $request->status;
        $brand->save();

        return redirect()->route('admin.brand.index')->with('success', 'Brand created successfully');
    }

    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('admin.brand.index')->with('success', 'Brand deleted successfully');
    }

    public function update(Request $request, Brand $brand)
    {
        $this->validate($request, [
            'name' => 'required',
            'logo' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
        ]);

        $name = null;
        if ($request->hasFile('logo')) {
            if ($brand->logo) {
                Storage::delete($brand->logo);
            }
            $name = $request->logo->store("public/brands");
        }

        $brand->name = $request->name;
        $brand->logo = $name;
        $brand->is_active = $request->status;
        $brand->save();

        return redirect()->route('admin.brand.index')->with('success', 'Brand updated successfully');
    }
}
