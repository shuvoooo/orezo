<?php

namespace App\Http\Controllers;

use App\Models\Faq;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }


    public function about()
    {
        return view('about_us');
    }

    public function contact()
    {
        return view('contact_us');
    }

    public function services()
    {

        return view('services');
    }


    public function faq()
    {
        $faqs= Faq::where('is_active',1)->get();
        return view('faq',compact('faqs'));
    }

    public function tips()
    {
        return view('tips');
    }
}
