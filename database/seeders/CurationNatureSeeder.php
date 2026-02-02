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
                'name_zh_TW' => '種子',
                'name_en' => 'Seeds',
            ],
            [
                'name_zh_TW' => '空氣',
                'name_en' => 'Air',
            ],
            [
                'name_zh_TW' => '水',
                'name_en' => 'Water',
            ],
            [
                'name_zh_TW' => '自然力量',
                'name_en' => 'Natural Power',
            ],
            [
                'name_zh_TW' => '聲音',
                'name_en' => 'Sound',
            ],
            [
                'name_zh_TW' => '生活',
                'name_en' => 'Life',
            ],
            [
                'name_zh_TW' => '漂流',
                'name_en' => 'Drift',
            ],
            [
                'name_zh_TW' => '慢經濟體',
                'name_en' => 'Slow Economy',
            ],
            [
                'name_zh_TW' => '台東品牌',
                'name_en' => 'Taitung Brand',
            ],
            [
                'name_zh_TW' => '永續台東',
                'name_en' => 'Sustainable Taitung',
            ],
        ];

        foreach ($tags as $tag) {
            DB::table('curation_natures')->insert([
                'name_zh_TW' => $tag['name_zh_TW'],
                'name_en' => $tag['name_en'],
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
