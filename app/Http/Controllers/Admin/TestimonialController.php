<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonial.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonial.create');
    }


    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            'designation' => 'required',
            'company' => 'required',
            'status' => 'required',
        ]);

        $name = null;
        if ($request->hasFile('image')) {
            $name = $request->image->store("public/testimonials");
        }

        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->image = $name;
        $testimonial->description = $request->description;
        $testimonial->designation = $request->designation;
        $testimonial->company = $request->company;
        $testimonial->is_active = $request->status;
        $testimonial->save();

        return redirect()->route('admin.testimonial.index')->with('success', 'Testimonial created successfully');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('admin.testimonial.index')->with('success', 'Testimonial deleted successfully');
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
        ]);

        $name = null;
        if ($request->hasFile('image')) {
            if ($testimonial->image) {
                Storage::delete($testimonial->image);
            }
            $name = $request->image->store("public/testimonials");
        }

        $testimonial->name = $request->name;
        $testimonial->image = $name;
        $testimonial->is_active = $request->status;
        $testimonial->save();

        return redirect()->route('admin.testimonial.index')->with('success', 'Testimonial updated successfully');
    }
}
