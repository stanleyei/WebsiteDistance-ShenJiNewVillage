<?php

namespace App\Http\Controllers;

use App\InfoTypes;
use App\ShopType;
use App\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::get();
        $infs = InfoTypes::with('infos')->get();
        $shopType = ShopType::with('shops')->get();
        $newShopTypes = $shopType->except([3]);
        return view('frontend.index',compact('sliders', 'infs', 'newShopTypes'));
    }

    public function news()
    {
        return view('frontend.news-page');
    }

    public function store()
    {
        return view('frontend.store-page');
    }

    public function newsSwitch(Request $request)
    {
        $infs = InfoTypes::with('infos')->get();
        $dateData = $infs[0]->infos[0]->created_at->toArray();
        dd($infs[0]->infos->where('created_at', '2021-06-12 05:56:15'));
        if($request->month == $dateData['month']){
            return 'success';
        }else{
            return 'fail';
        };
    }
}
