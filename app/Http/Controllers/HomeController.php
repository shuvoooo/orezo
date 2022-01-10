<?php

namespace App\Http\Controllers;

use App\Models\AboutPage;
use App\Models\Faq;
use App\Models\HomePage;
use App\Models\Page;

class HomeController extends Controller
{
    public function index()
    {
        $homePage = HomePage::first();

        return view('home', compact('homePage'));
    }


    public function about()
    {
        $about = AboutPage::first();
        return view('about_us', compact('about'));
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
        $faqs = Faq::where('is_active', 1)->get();
        return view('faq', compact('faqs'));
    }

    public function tips()
    {
        return view('tips');
    }

    public function page($slug)
    {
        $page = Page::where('slug', $slug)->first();

        if (!$page) {
            return redirect('/');
        }

        return view('page', compact('page'));
    }
}
