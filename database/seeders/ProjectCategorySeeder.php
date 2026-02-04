<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            [
                'name_zh_TW' => '文化發展',
                'name_en' => 'Culture',
            ],
            [
                'name_zh_TW' => '教育學習',
                'name_en' => 'Education',
            ],
            [
                'name_zh_TW' => '社會系統',
                'name_en' => 'Society',
            ],
            [
                'name_zh_TW' => '生活提案',
                'name_en' => 'Living',
            ],
            [
                'name_zh_TW' => '經濟產業',
                'name_en' => 'Economy',
            ],
            [
                'name_zh_TW' => '環境永續',
                'name_en' => 'Sustainability',
            ],
        ];

        foreach ($tags as $tag) {
            DB::table('project_categories')->insert([
                'name_zh_TW' => $tag['name_zh_TW'],
                'name_en' => $tag['name_en'],
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
