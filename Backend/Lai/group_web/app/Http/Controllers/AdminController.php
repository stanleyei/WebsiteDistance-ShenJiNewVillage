<?php

namespace App\Http\Controllers;

use App\ContactContentType;
use App\ContactType;
use App\Info;
use App\InfoTypes;
use App\Shop;
use App\ShopType;
use App\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('admin');
    }

    public function test()
    {
        return Auth::user();
    }

    public function reactUserName()
    {
        return Auth::user()->name;
    }

    public function upperData(Request $request)
    {
        if ($request->upperName) {
            switch ($request->upperName) {
                case 'info_types':
                    return InfoTypes::get();

                case 'info':
                    return Info::get();

                case 'shop_type':
                    return ShopType::get();

                case 'shop':
                    return Shop::get();

                case 'view':
                    return View::get();

                case 'contact_type':
                    return ContactType::get();

                case 'contact_content_type':
                    return ContactContentType::get();

                default:
                    # code...
                    break;
            }
        }

        return false;
    }
}
