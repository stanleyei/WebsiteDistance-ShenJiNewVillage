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
                'img' => '/img/views/views-01/main/views-01.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '1',
                'img' => '/img/views/views-01/other/other-01-01.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '2',
                'img' => '/img/views/views-02/main/views-02.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '3',
                'img' => '/img/views/views-03/main/views-03.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '4',
                'img' => '/img/views/views-04/main/views-04.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '5',
                'img' => '/img/views/views-05/main/views-05.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'view_id' => '6',
                'img' => '/img/views/views-06/main/views-06.jpg',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
        ]);
    }
}
