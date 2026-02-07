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
            [
                'code' => 'A',
                'name_tw' => '舊站特區',
                'name_en' => '',
            ],
            [
                'code' => 'B',
                'name_tw' => '美術館區',
                'name_en' => '',
            ],
            [
                'code' => 'C',
                'name_tw' => '寶町區',
                'name_en' => '',
            ],
            [
                'code' => 'D',
                'name_tw' => '臨海區',
                'name_en' => '',
            ],
            [
                'code' => 'E',
                'name_tw' => '就藝會區',
                'name_en' => '',
            ],
            [
                'code' => 'F',
                'name_tw' => '衛星展區',
                'name_en' => '',
            ],
            [
                'code' => 'G',
                'name_tw' => '民間展區',
                'name_en' => '',
            ],
            [
                'code' => 'H',
                'name_tw' => '限定活動',
                'name_en' => '',
            ],
        ];

        foreach ($zones as $zone) {
            DB::table('zones')->insert([
                'code' => $zone['code'],
                'name_tw' => $zone['name_tw'],
                'name_en' => $zone['name_en'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
