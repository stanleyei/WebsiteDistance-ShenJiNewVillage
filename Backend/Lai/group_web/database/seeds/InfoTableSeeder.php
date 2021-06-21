<?php

use App\Info;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class InfoTableSeeder extends Seeder
{
    /**
     * type_id
     * 1 => 活動花絮
     * 2 => 審計公告
     * 3 => 最新消息
     */
    public function run()
    {
        Info::insert([
            [
                'type_id' => '1',
                'name' => '小蝸牛市集出攤囉',
                'content' => '出攤名單：
                ［植栽 / 木作類］
                深白曙光工房
                Lady Is Gaga 手木系
                古夜天工坊
                Tadpole Teak 得寶老柚木
                ',
                'img' => 'img/',
                'date_start' => Carbon::parse('2021-01-20 10:00:00')->toDateTimeString(),
                'date_end' => Carbon::parse('2021-01-31 19:00:00')->toDateTimeString(),
                'location' => '台中市西區民生路368巷',
                'organizer' => '審計新村',
                'calendar' => '活動花絮的資訊之一日曆',
                'created_at' => Carbon::parse('2021-01-18 10:00:00')->toDateTimeString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'type_id' => '2',
                'name' => '審計公告的資訊之一',
                'content' => '審計公告的資訊之一內容',
                'img' => 'https://memes.tw/user-template/a03333632536be8fe3c13c453f5bcb31.png',
                'date_start' => Carbon::parse('2021-6-15')->toDateTimeString(),
                'date_end' => Carbon::parse('2021-10-15')->toDateTimeString(),
                'location' => '審計公告的資訊之一地點',
                'organizer' => '審計公告的資訊之一擁有者',
                'calendar' => '審計公告的資訊之一日曆',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'type_id' => '3',
                'name' => '最新消息的資訊之一',
                'content' => '最新消息的資訊之一內容',
                'img' => 'https://memes.tw/user-template/a03333632536be8fe3c13c453f5bcb31.png',
                'date_start' => Carbon::parse('2021-3-15')->toDateTimeString(),
                'date_end' => Carbon::parse('2021-4-15')->toDateTimeString(),
                'location' => '最新消息的資訊之一地點',
                'organizer' => '最新消息的資訊之一擁有者',
                'calendar' => '最新消息的資訊之一日曆',
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
        ]);
    }
}
