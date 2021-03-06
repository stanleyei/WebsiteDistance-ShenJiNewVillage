<?php

namespace App\Http\Controllers;

use App\Info;
use App\InfoImg;
use Illuminate\Support\Str;
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
        if ($request->img) {
            $request->img = $this->crop($request->img);
        }

        $data = $request->all();

        if ($request->hasFile('img')) {
            $local = Storage::disk('local');

            $file = $request->file('img');
            $path = $local->putFile('public', $file);
            $data['img'] = $local->url($path);
        }
        $mainData = InfoImg::create($data);

        return InfoImg::with('info')->get();
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
        if ($request->img) {
            $request->img = $this->crop($request->img);
        }
        
        $data = $request->all();
        $dbData = InfoImg::find($id);
        if ($request->hasFile('img')) {
            $myfile = Storage::disk('local');
            $file = $request->file('img');
            $path = $myfile->putFile('public', $file);
            $data['img'] = $myfile->url($path);
            // ???????????????????????????
            File::delete(public_path($dbData->img));
        }else{
            // ???????????????
            $data['img'] = $dbData->img;
        }
        $dbData->update($data);

        return InfoImg::with('info')->get();
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
            // ??????Info????????????
            File::delete(public_path($dbData->img));
        }
        // ???????????????????????????
        $result = InfoImg::destroy($id);

        return InfoImg::with('info')->get();
    }

    public function indexDataTable()
    {
        return InfoImg::with('info')->get();
    }

    public function crop($img)
    {
        // ??????????????????base64?????????
        if (!($img && Str::contains($img, ['src="data:image', 'src=\'data:image']))) {
            return $img;
        }

        // ([^;]+) : ???????????????(;)????????????(+?????????)??????
        // ([^\"]+) : ??????????????????"?????????(+?????????)???????????????"??????
        $pattern = '/(data:image\/)([^;]+)(;base64,)([^\"]+)/';

        $check = preg_match($pattern, $img, $matches);
        if ($check) {
            return base64_decode($matches[4]);
        }
    }
}
