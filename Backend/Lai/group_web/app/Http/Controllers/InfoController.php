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
use Illuminate\Support\Str;

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
        $data = $request->all();

        if ($request->img) {
            $request->img = $this->crop($request->img);
        }

        if ($data['content']) {
            $data['content'] = $this->content_base64_check($data['content']);
        }

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
    public function update($id, Request $request)
    {
        $data = $request->all();
        $dbData = Info::find($id);

        // content????????????????????????
        $data['content'] = $this->summernote_update($dbData->content, $data['content']);

        // ??????????????????
        if ($request->hasFile('img')) {
            $myfile = Storage::disk('local');
            $file = $request->file('img');
            $path = $myfile->putFile('public', $file);
            $data['img'] = $myfile->url($path);
            // ???????????????????????????
            File::delete(public_path($dbData->img));
        } else {
            // ???????????????
            $data['img'] = $dbData->img;
        }
        // ??????updata ??????????????????????????????
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

        // ??????content????????????
        $dbData->content = $this->summernote_destroy_image($dbData->content);

        if (isset($dbData->img)) {
            // ??????Info????????????
            File::delete(public_path($dbData->img));
        }
        // ???????????????????????????
        $result = Info::destroy($id);
        // ???????????????????????????????????????
        $this->deleteSubImg($id);
        // // ????????????????????????deleteSubImg?????????
        // $imgs = InfoImg::where('info_id', $id)->get();
        // foreach ($imgs ?? [] as $img) {
        //     // ???????????????????????????
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
        // where?????????????????????????????????
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

    public function content_base64_check($content)
    {
        // https://learnku.com/articles/33047
        // ??????????????????base64?????????
        // ??????base64????????????????????????content??????base64???????????????image path
        if (!($content && Str::contains($content, ['src="data:image', 'src=\'data:image']))) {
            return $content;
        }

        // ([^;]+) : ???????????????(;)????????????(+?????????)??????
        // ([^\"]+) : ??????????????????"?????????(+?????????)???????????????"??????
        $pattern = '/(data:image\/)([^;]+)(;base64,)([^\"]+)/';
        $res = preg_replace_callback($pattern, function ($matches) {
            // ????????????
            $public_path = public_path();
            $folder_path = '/storage/summernote/';
            if (!is_dir($dir = $public_path . $folder_path)) {
                mkdir($dir, 0777, true);
            }

            // ???????????????
            $matches[2] = $matches[2] === 'jpeg' ? 'jpg' : $matches[2];
            $filename = md5(time() . \Illuminate\Support\Str::random()) . '.' . $matches[2];
            $file = $dir . $filename;

            // ????????????
            file_put_contents($file, base64_decode($matches[4])); // base64 ?????????

            // ??????????????????
            return $folder_path . $filename;
        }, $content);

        return $res;
    }

    public function summernote_destroy_image($content)
    {
        if (!($content && Str::contains($content, ['summernote']))) {
            return $content;
        }

        $pattern = '/(\/storage\/summernote[^\'\"]+)/';
        $times = preg_match_all($pattern, $content, $matches);
        if ($times) {
            foreach ($matches[0] as $value) {
                if (file_exists(public_path() . $value)) {
                    unlink(public_path() . $value);
                }
            }
        }
    }

    public function summernote_update($oldContent, $content)
    {
        // ??????????????????path
        $pattern = '/(\/storage\/summernote[^\'\"]+)/';
        $oldCheck = preg_match_all($pattern, $oldContent, $oldMatches);
        $oldArray = [];
        // ??????????????????????????????????????????image path???array
        // $oldArray
        if ($oldCheck) {
            foreach ($oldMatches[0] as $value) {
                $oldArray[] = $value;
            }
        }
        // ????????????????????????????????????image path
        $content = $this->content_base64_check($content);
        $pattern = '/(\/storage\/summernote[^\'\"]+)/';
        $newCheck = preg_match_all($pattern, $content, $newMatches);
        $newArray = [];
        // ??????????????????????????????????????????image path???array
        // $newArray
        if ($newCheck) {
            foreach ($newMatches[0] as $value) {
                $newArray[] = $value;
            }
        }
        // $a1?????????????????????$oldNeedDel
        $oldNeedDel = array_diff($oldArray, $newArray);
        if ($oldNeedDel !== []) {
            foreach ($oldNeedDel as $value) {
                if (file_exists(public_path() . $value)) {
                    unlink(public_path() . $value);
                }
            }
        }
        return $content;
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
