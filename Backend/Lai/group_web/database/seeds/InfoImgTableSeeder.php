<?php

use App\InfoImg;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class InfoImgTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InfoImg::insert([
            [
                'info_id' => '1',
                'name' => '假資料name',
                'content' => '假資料content',
                'img' => 'https://memes.tw/user-template/a03333632536be8fe3c13c453f5bcb31.png',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'info_id' => '2',
                'name' => '假資料name',
                'content' => '假資料content',
                'img' => 'https://memes.tw/user-template/a03333632536be8fe3c13c453f5bcb31.png',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'info_id' => '3',
                'name' => '假資料name',
                'content' => '假資料content',
                'img' => 'https://memes.tw/user-template/a03333632536be8fe3c13c453f5bcb31.png',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
        ]);
    }
}
