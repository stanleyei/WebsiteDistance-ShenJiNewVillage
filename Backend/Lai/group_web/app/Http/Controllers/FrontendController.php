<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function news()
    {
        return view('frontend.news-page');
    }

    public function store()
    {
        return view('frontend.store-page');
    }
}
