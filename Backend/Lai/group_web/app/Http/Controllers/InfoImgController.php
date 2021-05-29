<?php

namespace App\Http\Controllers;

use App\Info;
use App\InfoImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class InfoImgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = InfoImg::with('info')->get();
        return view('admin/info_img/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $info = Info::get();;
        $data = InfoImg::with('info')->get();
        return view('admin/info_img/create', compact('data', 'info'));
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

        if ($request->hasFile('img')) {
            $local = Storage::disk('local');

            $file = $request->file('img');
            $path = $local->putFile('public', $file);
            $data['img'] = $local->url($path);
        }
        $mainData = InfoImg::create($data);

        return redirect()->route('info_img.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InfoImg  $infoImg
     * @return \Illuminate\Http\Response
     */
    public function show(InfoImg $infoImg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InfoImg  $infoImg
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = Info::get();;
        $data = InfoImg::find($id);
        return view('admin/info_img/edit', compact('data', 'info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InfoImg  $infoImg
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $data = $request->all();
        $dbData = InfoImg::find($id);
        if ($request->hasFile('img')) {
            $myfile = Storage::disk('local');
            $file = $request->file('img');
            $path = $myfile->putFile('public', $file);
            $data['img'] = $myfile->url($path);
            // 刪掉之前的圖片檔案
            File::delete(public_path($dbData->img));
        }else{
            // 沒改放舊圖
            $data['img'] = $dbData->img;
        }
        $dbData->update($data);

        return redirect()->route('info_img.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InfoImg  $infoImg
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dbData = InfoImg::find($id);

        if (isset($dbData->img)) {
            // 刪除Info圖片檔案
            File::delete(public_path($dbData->img));
        }
        // 資料庫刪除該筆資料
        $result = InfoImg::destroy($id);

        return $result;
    }

    public function indexDataTable()
    {
        $response = InfoImg::all();

        $data = [];

        foreach ($response as $i) {
            $data[] = [
                'info_id' => $i->info->name,
                'name' => $i->name,
                'content' => $i->content,
                'img' => "<div class='show-img' style='background-image: url({$i->img})'></div>",
                'editBtn' => "<a href='/admin/info_img/{$i->id}/edit'><button class='btn btn-primary btn-edit'>編輯</button></a>",
                'destroyBtn' => "<button class='btn btn-danger btn-destroy' onclick='destroyBtnFunction({$i->id})''>刪除</button>",
            ];
        }

        $data = ['data' => $data];

        return $data;
    }
}
