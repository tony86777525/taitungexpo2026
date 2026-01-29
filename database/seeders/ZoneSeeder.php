<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $zones = [
            '舊站特區',
            '美術館區',
            '寶町區',
            '臨海區',
            '就藝會區',
            '衛星展區',
            '民間展區',
            '限定活動',
        ];

        foreach ($zones as $zone) {
            DB::table('zones')->insert([
                'name' => $zone,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
