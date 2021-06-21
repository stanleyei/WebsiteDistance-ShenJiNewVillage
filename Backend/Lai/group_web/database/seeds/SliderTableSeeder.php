<?php

use App\Slider;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::insert([
            [
                'name' => '審計新村照片',
                'img' => '/img/aboutUs/backup/swiper (4)',
                'content' => '審計新村照片',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'name' => '審計新村照片',
                'img' => '/img/aboutUs/備用/審計新村-06',
                'content' => '審計新村照片',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'name' => '審計新村照片',
                'img' => '/img/aboutUs/備用/審計新村-07',
                'content' => '審計新村照片',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'name' => '審計新村照片',
                'img' => '/img/aboutUs/備用/審計新村-11',
                'content' => '審計新村照片',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'name' => '審計新村照片',
                'img' => '/img/aboutUs/備用/審計新村-26',
                'content' => '審計新村照片',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
        ]);
    }
}
