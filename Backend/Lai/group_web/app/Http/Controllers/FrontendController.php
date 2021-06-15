<?php

namespace App\Http\Controllers;

use App\Shop;
use App\View;
use App\Slider;
use App\ShopType;
use App\InfoTypes;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::get();
        $infs = InfoTypes::with('infos')->get();
        $shopType = ShopType::with('shops')->get();
        $shops = Shop::with('shopImgs')->get();
        $foodShops = Shop::with('shopImgs')->where('type_id', '1')->get();
        $trinketShops = Shop::with('shopImgs')->where('type_id', '2')->get();
        $newShopTypes = $shopType->except([3]);
        $views = View::with('viewImgs')->get();
        return view('frontend.index',compact('sliders', 'infs', 'newShopTypes', 'shops', 'foodShops', 'trinketShops', 'views'));
    }

    public function news()
    {
        return view('frontend.news-page');
    }

    public function store()
    {
        $shops = Shop::with('shopImgs')->get();
        return view('frontend.store-page', compact('shops'));
    }

    public function newsSwitch(Request $request)
    {
        $infs = InfoTypes::with('infos')->get();
        $dateData = $infs[0]->infos[0]->created_at->toArray();

        dd(Carbon::parse());
        // dd($infs[0]->infos->where('created_at', '2021-06-12 05:56:15'));
        if($request->month == $dateData['month']){
            return 'success';
        }else{
            return 'fail';
        };
    }
}
