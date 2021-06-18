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
                'name' => 'Slider假資料1',
                'img' => 'https://memes.tw/user-template/a03333632536be8fe3c13c453f5bcb31.png',
                'content' => 'Slider假內容1',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'name' => 'Slider假資料2',
                'img' => 'https://memes.tw/user-template/a03333632536be8fe3c13c453f5bcb31.png',
                'content' => 'Slider假內容2',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'name' => 'Slider假資料3',
                'img' => 'https://memes.tw/user-template/a03333632536be8fe3c13c453f5bcb31.png',
                'content' => 'Slider假內容3',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
        ]);
    }
}
