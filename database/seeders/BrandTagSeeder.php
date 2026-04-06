<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            [
                'name_tw' => '慢飲山海',
                'name_en' => 'Slow Sips',
            ],
            [
                'name_tw' => '慢食土地',
                'name_en' => 'Slow Food',
            ],
            [
                'name_tw' => '慢作風景',
                'name_en' => 'Slow Craft',
            ],
            [
                'name_tw' => '慢活台東',
                'name_en' => 'Slow Living',
            ],
        ];

        foreach ($tags as $tag) {
            DB::table('brand_tags')->insert([
                'name_tw' => $tag['name_tw'],
                'name_en' => $tag['name_en'],
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
