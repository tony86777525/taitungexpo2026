<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivityNatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            [
                'name_zh_TW' => '展覽',
                'name_en' => 'Exhibition',
            ],
            [
                'name_zh_TW' => '展演',
                'name_en' => 'Performance',
            ],
            [
                'name_zh_TW' => '遊程',
                'name_en' => 'Tour',
            ],
            [
                'name_zh_TW' => '論壇',
                'name_en' => 'Forum',
            ],
            [
                'name_zh_TW' => '講座',
                'name_en' => 'Talk',
            ],
            [
                'name_zh_TW' => '工作坊',
                'name_en' => 'Workshop',
            ],
            [
                'name_zh_TW' => '市集',
                'name_en' => 'Market',
            ],
            [
                'name_zh_TW' => '銷售',
                'name_en' => 'Sales',
            ],
            [
                'name_zh_TW' => '競賽',
                'name_en' => 'Competition',
            ],
            [
                'name_zh_TW' => '徵選',
                'name_en' => 'Open Call',
            ],
        ];

        foreach ($tags as $tag) {
            DB::table('activity_natures')->insert([
                'name_zh_TW' => $tag['name_zh_TW'],
                'name_en' => $tag['name_en'],
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
