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
                'img' => '/img/views/01-台中文學館/主要圖片/台中文學館-01',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '2',
                'img' => '/img/views/02-國立自然科學博物館之植物園/主要圖片/國立自然科學博物館-植物園-01',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '3',
                'img' => '/img/views/03-柳川水岸步道/主要圖片/柳川水岸步道-01',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '4',
                'img' => '/img/views/04-國立自然科學博物館/主要圖片/國立自然科學博物館-01',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '5',
                'img' => '/img/views/05-道禾六藝文化館_臺中刑務所演武場/主要圖片/道禾六藝文化館-01',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '6',
                'img' => '/img/views/06-國立臺灣美術館/主要圖片/國立臺灣美術館-01',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
        ]);
    }
}
