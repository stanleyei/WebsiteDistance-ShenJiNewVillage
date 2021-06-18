<?php

use App\ShopImg;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ShopImgTableSeeder extends Seeder
{
    /**
     * 有三家假資料
     */
    public function run()
    {
        ShopImg::insert([
            [
                'shop_id' => '1',
                'content' => '圖片假內容',
                'img' => 'https://memes.tw/user-template/a03333632536be8fe3c13c453f5bcb31.png',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'shop_id' => '2',
                'content' => '圖片假內容',
                'img' => 'https://memes.tw/user-template/a03333632536be8fe3c13c453f5bcb31.png',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'shop_id' => '3',
                'content' => '圖片假內容',
                'img' => 'https://memes.tw/user-template/a03333632536be8fe3c13c453f5bcb31.png',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
        ]);
    }
}
