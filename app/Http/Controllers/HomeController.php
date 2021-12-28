<?php

namespace App\Http\Controllers;

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
        return view('faq');
    }

    public function tips()
    {
        return view('tips');
    }
}
