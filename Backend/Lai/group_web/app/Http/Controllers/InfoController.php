<?php

namespace App\Http\Controllers;

use App\Info;
use App\InfoImg;
use App\InfoTypes;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Info::with('infoType', 'infoImgs')->get();
        return view('admin/info/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = InfoTypes::get();;
        $data = Info::with('infoType', 'infoImgs')->get();
        return view('admin/info/create', compact('data', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->all();

        if ($request->hasFile('img')) {
            $local = Storage::disk('local');

            $file = $request->file('img');
            $path = $local->putFile('public', $file);
            $data['img'] = $local->url($path);
        }
        $mainData = Info::create($data);

        return Info::with('infoType', 'infoImgs')->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function show(Info $info)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = InfoTypes::get();;
        $data = Info::find($id);
        return view('admin/info/edit', compact('data', 'type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        $dbData = Info::find($id);
        // return $dbData->update($data);;
        // return $request;
        if ($request->hasFile('img')) {
            $myfile = Storage::disk('local');
            $file = $request->file('img');
            $path = $myfile->putFile('public', $file);
            $data['img'] = $myfile->url($path);
            // 刪掉之前的圖片檔案
            File::delete(public_path($dbData->img));
        } else {
            // 沒改放舊圖
            $data['img'] = $dbData->img;
        }
        // 使用updata 不用全部都填也能更新
        // $dbData->update(['name'=>'controllertest']);
        $dbData->update($data);
        // DB::commit();

        return Info::with('infoType', 'infoImgs')->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dbData = Info::with('infoImgs')->find($id);

        if (isset($dbData->img)) {
            // 刪除Info圖片檔案
            File::delete(public_path($dbData->img));
        }
        // 資料庫刪除該筆資料
        $result = Info::destroy($id);
        // 刪除副圖片檔案、資料庫資料
        $this->deleteSubImg($id);
        // // 下面的動作好像跟deleteSubImg有重複
        // $imgs = InfoImg::where('info_id', $id)->get();
        // foreach ($imgs ?? [] as $img) {
        //     // 資料庫刪除該筆資料
        //     $img->delete();
        // }

        return Info::with('infoType', 'infoImgs')->get();
    }

    public function indexDataTable()
    {
        return Info::with('infoType', 'infoImgs')->get();
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
