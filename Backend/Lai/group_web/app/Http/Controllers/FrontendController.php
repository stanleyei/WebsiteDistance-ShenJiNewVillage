<?php

namespace App\Http\Controllers;

use App\Shop;
use App\View;
use App\Slider;
use App\Info;
use App\ShopType;
use App\InfoTypes;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::get();
        $monthData = ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'];
        $shopType = ShopType::with('shops')->get();
        $shops = Shop::with('shopImgs')->get();
        $foodShops = Shop::with('shopImgs')->where('type_id', '1')->get();
        $trinketShops = Shop::with('shopImgs')->where('type_id', '2')->get();
        $newShopTypes = $shopType->except([3]);
        $views = View::with('viewImgs')->get();
        return view('frontend.index', compact('sliders', 'newShopTypes', 'shops', 'foodShops', 'trinketShops', 'views', 'monthData'));
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

    public function tra_map()
    {
        return view('frontend.tra-map');
    }

    public function newsInitialization()
    {
        $infs = InfoTypes::with('infos')->get();
        $startOfMonth = Carbon::now()->startOfMonth()->toDateTimeString();
        $endOfMonth = Carbon::now()->endOfMonth()->toDateTimeString();
        // $infs = Info::with('infoType')->whereBetween('created_at', array($startOfMonth, $endOfMonth));

        // dd($infs[0]->infos->whereBetween('created_at', array($startOfMonth, $endOfMonth))->first());
        $monthData = ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'];
        $hasEvents = '';
        foreach ($infs as $inf){
            $eventDay = Carbon::create($inf->infos[0]->created_at->toDateTimeString())->day;
            $eventMonth = Carbon::create($inf->infos[0]->created_at->toDateTimeString())->month;
            $hasEvents .= 
            "<a class='content-inf' href='/news?tap={$inf->id}' title='前往{$inf->name}'>
                <div class='inf-date'>
                    <div class='during'>
                        <div class='start-date'>{$eventDay}</div>
                    </div>
                    <span>{$monthData[$eventMonth - 1]}</span>
                </div>
                <div class='inf-detail'>
                    <div class='inf-tag'>{$inf->name}</div>
                    <h4>{$inf->infos[0]->name}</h4>
                </div>
                <span>more
                    <i class='fas fa-chevron-right'></i>
                </span>
            </a>";
        };
        return $hasEvents;
    }

    public function newsSwitch(Request $request)
    {
        $infs = InfoTypes::with('infos')->get();
        $thisMonth = Carbon::now()->month;
        $startOfMonth = Carbon::now()->startOfMonth()->toDateTimeString();
        $endOfMonth = Carbon::now()->endOfMonth()->toDateTimeString();
        $monthData = ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'];

        $noEvents = '';
        $noEvents .=
            "<div class='content-inf'>
                <div class='inf-detail ml-4'>
                    <h4 style='line-height:9.25vh'>No Events</h4>
                </div>
            </div>";

        $hasEvents = '';
        foreach ($infs as $inf){
            $eventDay = Carbon::create($inf->infos[0]->created_at->toDateTimeString())->day;
            $eventMonth = Carbon::create($inf->infos[0]->created_at->toDateTimeString())->month;
            $hasEvents .= 
            "<a class='content-inf' href='/news?tap={$inf->id}' title='前往{$inf->name}'>
                <div class='inf-date'>
                    <div class='during'>
                        <div class='start-date'>{$eventDay}</div>
                    </div>
                    <span>{$monthData[$eventMonth - 1]}</span>
                </div>
                <div class='inf-detail'>
                    <div class='inf-tag'>{$inf->name}</div>
                    <h4>{$inf->infos[0]->name}</h4>
                </div>
                <span>more
                    <i class='fas fa-chevron-right'></i>
                </span>
            </a>";
        };

        // dd($infs[0]->infos->whereBetween('created_at', array($startOfMonth, $endOfMonth))->first());
        if ($request->month == $thisMonth) {
            return $hasEvents;
        } else {
            return $noEvents;
        };
    }
}
