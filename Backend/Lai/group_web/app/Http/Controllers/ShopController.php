<?php

namespace App\Http\Controllers;

use App\Shop;
use App\ShopType;
use App\ShopImg;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Shop::with('shopType', 'shopImgs')->get();
        return view('admin/shop/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = ShopType::get();;
        $data = Shop::with('shopType', 'shopImgs')->get();
        return view('admin/shop/create', compact('data', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        // if ($request->hasFile('img')) {
        //     $local = Storage::disk('local');

        //     $file = $request->file('img');
        //     $path = $local->putFile('public', $file);
        //     $data['img'] = $local->url($path);
        // }
        $mainData = Shop::create($data);

        return Shop::with('shopType', 'shopImgs')->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = ShopType::get();;
        $data = Shop::with('shopImgs')->find($id);
        return view('admin/shop/edit', compact('data', 'type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $data = $request->all();
        $dbData = Shop::find($id);
        // if ($request->hasFile('img')) {
        //     $myfile = Storage::disk('local');
        //     $file = $request->file('img');
        //     $path = $myfile->putFile('public', $file);
        //     $data['img'] = $myfile->url($path);
        //     // 刪掉之前的圖片檔案
        //     File::delete(public_path($dbData->img));
        // }else{
        //     // 沒改放舊圖
        //     $data['img'] = $dbData->img;
        // }
        $dbData->update($data);

        return Shop::with('shopType', 'shopImgs')->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dbData = Shop::with('shopType', 'shopImgs')->find($id);

        // if (isset($dbData->img)) {
        //     // 刪除Shop圖片檔案
        //     File::delete(public_path($dbData->img));
        // }
        // 資料庫刪除該筆資料
        $result = Shop::destroy($id);
        // 刪除副圖片檔案、資料庫資料
        $this->deleteSubImg($id);

        return Shop::with('shopType', 'shopImgs')->get();
    }

    public function indexDataTable()
    {
        $response = Shop::all();

        $data = [];

        foreach ($response as $i) {
            $data[] = [
                'type_id' => $i->shopType->name,
                'name' => $i->name,
                'phone' => $i->phone,
                'content' => $i->content,
                'location' => $i->location,
                'editBtn' => "<a href='/admin/shop/{$i->id}/edit'><button class='btn btn-primary btn-edit'>編輯</button></a>",
                'destroyBtn' => "<button class='btn btn-danger btn-destroy' onclick='destroyBtnFunction({$i->id})''>刪除</button>",
            ];
        }

        $data = ['data' => $data];

        return Shop::with('shopType', 'shopImgs')->get();
    }

    public function deleteSubImg($shop_id)
    {
        // where內的欄位要改成相對應的
        $shopImgs = ShopImg::where('shop_id', $shop_id)->get();
        if (isset($shopImgs)) {
            foreach ($shopImgs as $shopImg) {
                File::delete(public_path($shopImg->img));
                $shopImg->delete();
            }
            return true;
        } else {
            return false;
        }
    }
}
