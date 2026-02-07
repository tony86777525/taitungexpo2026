<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurationNatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            [
                'name_tw' => '種子',
                'name_en' => 'Seeds',
            ],
            [
                'name_tw' => '空氣',
                'name_en' => 'Air',
            ],
            [
                'name_tw' => '水',
                'name_en' => 'Water',
            ],
            [
                'name_tw' => '自然力量',
                'name_en' => 'Natural Power',
            ],
            [
                'name_tw' => '聲音',
                'name_en' => 'Sound',
            ],
            [
                'name_tw' => '生活',
                'name_en' => 'Life',
            ],
            [
                'name_tw' => '漂流',
                'name_en' => 'Drift',
            ],
            [
                'name_tw' => '慢經濟體',
                'name_en' => 'Slow Economy',
            ],
            [
                'name_tw' => '台東品牌',
                'name_en' => 'Taitung Brand',
            ],
            [
                'name_tw' => '永續台東',
                'name_en' => 'Sustainable Taitung',
            ],
        ];

        foreach ($tags as $tag) {
            DB::table('curation_natures')->insert([
                'name_tw' => $tag['name_tw'],
                'name_en' => $tag['name_en'],
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
