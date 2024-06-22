<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class MineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mines')->insert([
            'name' => 'test',
            'age' => '20',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
