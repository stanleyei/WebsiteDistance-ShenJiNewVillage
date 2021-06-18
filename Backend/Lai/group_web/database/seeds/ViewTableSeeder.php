<?php

use App\View;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ViewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        View::insert([
            [
                'name' => '假景點1的name',
                'content' => '假景點1的content',
                'phone' => '假景點1的phone',
                'address' => '假景點1的address',
                'time_open' => rand(0, 23),
                'time_close' => rand(0, 23),
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'name' => '假景點2的name',
                'content' => '假景點2的content',
                'phone' => '假景點2的phone',
                'address' => '假景點2的address',
                'time_open' => rand(0, 23),
                'time_close' => rand(0, 23),
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
            [
                'name' => '假景點3的name',
                'content' => '假景點3的content',
                'phone' => '假景點3的phone',
                'address' => '假景點3的address',
                'time_open' => rand(0, 23),
                'time_close' => rand(0, 23),
                'created_at' => now()->toDateString(),
                'updated_at' => now()->toDateString(),
            ],
        ]);
    }
}
