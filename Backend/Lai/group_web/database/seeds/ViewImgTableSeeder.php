<?php

use App\ViewImg;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ViewImgTableSeeder extends Seeder
{
    /**
     * 3筆假資料能附屬
     */
    public function run()
    {
        ViewImg::insert([
            [
                'view_id' => '1',
                'img' => 'https://memes.tw/user-template/a03333632536be8fe3c13c453f5bcb31.png',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '2',
                'img' => 'https://memes.tw/user-template/a03333632536be8fe3c13c453f5bcb31.png',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '3',
                'img' => 'https://memes.tw/user-template/a03333632536be8fe3c13c453f5bcb31.png',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
        ]);
    }
}
