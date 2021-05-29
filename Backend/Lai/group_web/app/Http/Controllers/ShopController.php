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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        //
    }

    public function indexDataTable()
    {
        $response = Shop::all();

        $data = [];

        foreach ($response as $i) {
            $data[] = [
                'type_id' => $i->shopType->name,
                'name' => $i->name,
                'content' => $i->content,
                'infoImgs' => count($i->infoImgs),
                'date_start' => Carbon::parse($i->date_start)->toDateTimeString(),
                'date_end' => Carbon::parse($i->date_end)->toDateTimeString(),
                'editBtn' => "<a href='/admin/info/{$i->id}/edit'><button class='btn btn-primary btn-edit'>編輯</button></a>",
                'destroyBtn' => "<button class='btn btn-danger btn-destroy' onclick='destroyBtnFunction({$i->id})''>刪除</button>",
            ];
        }

        $data = ['data' => $data];

        return $data;
    }

    public function deleteSubImg($info_id)
    {
        // where內的欄位要改成相對應的
        $infoImgs = InfoImg::where('info_id', $info_id)->get();
        if (isset($infoImgs)) {
            foreach ($infoImgs as $infoImg) {
                File::delete(public_path($infoImg->img));
                $infoImg->delete();
            }
            return true;
        } else {
            return false;
        }
    }
}
