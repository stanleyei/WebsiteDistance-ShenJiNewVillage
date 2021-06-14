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
        $data = Info::find(14);
        // dd($data->content);
        // 取得舊字串的path
        $pattern = '/(\/storage\/summernote[^\'\"]+)/';
        $times = preg_match_all($pattern, $data->content, $oldMatches);
        $oldArray = [];
        if ($times) {
            foreach ($oldMatches as $v) {
                $oldArray[] = $v[0];
            }
        }
        dd($oldArray);

        $data = Info::find(2);
        // 現在$data->content裡面有兩張base64圖
        // dd($data->content);
        // 用正規表示式抓出來
        $subject = $data->content;
        // // $pattern = '/^(data:image/)([A-Za-z]+)(;base64,)()"$/';
        $pattern = '/(data:image\/)([^;]+)(;base64,)([^\"]+)/';

        preg_match_all($pattern, $subject, $matches);
        /***
        // 找到的整串base64
        dd($matches[0]);
        圖片副檔名
        dd($matches[2]);
        // 要轉換成file的內容
        dd($matches[4]);
         ***/

        // $pattern = '/(data:image\/)([^;]+)(;base64,)([^\"]+)/';
        // $res = preg_replace_callback($pattern, function ($matches) {
        //     // 生成路径
        //     $public_path = public_path();
        //     $folder_path = '/summernote/' . date('Ym') . '/' . date('d') . '/';
        //     if (!is_dir($dir = $public_path . $folder_path)) {
        //         mkdir($dir, 0777, true);
        //     }

        //     // 生成文件名
        //     $matches[2] = $matches[2] === 'jpeg' ? 'jpg' : $matches[2];
        //     $filename = md5(time() . \Illuminate\Support\Str::random()) . '.' . $matches[2];
        //     $file = $dir . $filename;

        //     // // 保存文件
        //     // file_put_contents($file, base64_decode($matches[4])); // base64 转图片

        //     // 返回相对路径
        //     // return $folder_path . $filename;
        //     return asset($filename);
        // }, $subject);
        // dd($res);


        return view('test', compact('data'));
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
