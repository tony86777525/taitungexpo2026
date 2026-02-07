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
                'name_tw' => '展覽',
                'name_en' => 'Exhibition',
            ],
            [
                'name_tw' => '展演',
                'name_en' => 'Performance',
            ],
            [
                'name_tw' => '遊程',
                'name_en' => 'Tour',
            ],
            [
                'name_tw' => '論壇',
                'name_en' => 'Forum',
            ],
            [
                'name_tw' => '講座',
                'name_en' => 'Talk',
            ],
            [
                'name_tw' => '工作坊',
                'name_en' => 'Workshop',
            ],
            [
                'name_tw' => '市集',
                'name_en' => 'Market',
            ],
            [
                'name_tw' => '銷售',
                'name_en' => 'Sales',
            ],
            [
                'name_tw' => '競賽',
                'name_en' => 'Competition',
            ],
            [
                'name_tw' => '徵選',
                'name_en' => 'Open Call',
            ],
        ];

        foreach ($tags as $tag) {
            DB::table('activity_natures')->insert([
                'name_tw' => $tag['name_tw'],
                'name_en' => $tag['name_en'],
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
