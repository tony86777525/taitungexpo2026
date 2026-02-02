<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            [
                'name_zh_TW' => '主題展區',
                'name_en' => 'Exhibition',
            ],
            [
                'name_zh_TW' => '限定活動',
                'name_en' => 'Event',
            ],
            [
                'name_zh_TW' => '民間展區',
                'name_en' => 'Community',
            ],
            [
                'name_zh_TW' => '台東活動品牌',
                'name_en' => 'Taitung Brand',
            ],
            [
                'name_zh_TW' => '響應展區',
                'name_en' => 'Partner',
            ],
            [
                'name_zh_TW' => '場域新生',
                'name_en' => 'Revitalization',
            ],
        ];

        foreach ($tags as $tag) {
            DB::table('project_types')->insert([
                'name_zh_TW' => $tag['name_zh_TW'],
                'name_en' => $tag['name_en'],
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
