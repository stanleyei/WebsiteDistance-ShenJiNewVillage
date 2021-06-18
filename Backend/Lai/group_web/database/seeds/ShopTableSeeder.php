<?php

use App\Shop;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ShopTableSeeder extends Seeder
{
    /**
     * 1 => 食物類
     * 2 => 小物類
     */
    public function run()
    {
        Shop::insert([
            [
                'type_id' => '1',
                'name' => '食物類假店家1',
                'url' => '假網址',
                'phone' => '假電話',
                'content' => '假內容',
                'location' => '假地點',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'type_id' => '1',
                'name' => '食物類假店家2',
                'url' => '假網址',
                'phone' => '假電話',
                'content' => '假內容',
                'location' => '假地點',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'type_id' => '2',
                'name' => '小物類假店家1',
                'url' => '假網址',
                'phone' => '假電話',
                'content' => '假內容',
                'location' => '假地點',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
        ]);
    }
}
