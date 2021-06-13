<?php

namespace App\Http\Controllers;

use App\InfoTypes;
use App\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::get();
        $infs = InfoTypes::with('infos')->get();
        return view('frontend.index',compact('sliders', 'infs'));
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
