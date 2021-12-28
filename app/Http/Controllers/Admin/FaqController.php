<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
        return view('admin.faq.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faq.create');
    }


    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'question' => 'required',
            'answer' => 'required',
            'status' => 'required',
        ]);


        $faq = new Faq();
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->is_active = $request->status;
        $faq->save();

        return redirect()->route('admin.faq.index')->with('success', 'Faq created successfully');
    }

    public function edit(Faq $faq)
    {
        return view('admin.faq.edit', compact('faq'));
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faq.index')->with('success', 'Faq deleted successfully');
    }

    public function update(Request $request, Faq $faq)
    {
        $this->validate($request, [
            'question' => 'required',
            'answer' => 'required',
            'status' => 'required',
        ]);


        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->is_active = $request->status;
        $faq->save();

        return redirect()->route('admin.faq.index')->with('success', 'Faq updated successfully');
    }
}
