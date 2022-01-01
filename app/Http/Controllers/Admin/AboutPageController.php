<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use function view;

class AboutPageController extends Controller
{
    public function edit()
    {
        $about = AboutPage::first();

        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $about = AboutPage::first();


        if ($request->hasFile('image')) {
            if (Storage::exists($about->image)) {
                Storage::delete($about->image);
            }
            $image = $request->file('image');
            $image = Image::make($image)->resize(400, 400); //here
            $image->orientate()->encode('jpg');
            $filename = time() . '.jpg';
            $path = Storage::put('public/about/' . $filename, $image->getEncoded());

            $about->image = 'public/about/' . $filename;
        }


        $about->note = $request->note;
        $about->heading = $request->heading;
        $about->subheading = $request->subheading;
        $about->description = $request->description;
        $about->save();

        return redirect()->route('admin.about_page.edit')->with('success', 'About Page Updated Successfully');
    }
}
