<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stocks = [
            [
                'name' => 'フィルムカメラ',
                'explain' => '1960年式のカメラです',
                'fee' => '200000',
                'stock_count' => '5',
                'image_path' => 'filmcamera.jpg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'Android Garxy10',
                'explain' => '中古美品です',
                'fee' => '84200',
                'stock_count' => '3',
                'image_path' => 'mobile.jpg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ];
        DB::table('stocks')->insert($stocks);
    }
}
