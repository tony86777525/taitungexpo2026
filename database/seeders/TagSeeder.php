<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            [
                'name_zh_TW' => '官方公告',
                'name_en' => 'Official',
            ],
            [
                'name_zh_TW' => '活動消息',
                'name_en' => 'Events',
            ],
            [
                'name_zh_TW' => '媒體報導',
                'name_en' => 'Media',
            ],
        ];

        foreach ($tags as $tag) {
            DB::table('tags')->insert([
                'name_zh_TW' => $tag['name_zh_TW'],
                'name_en' => $tag['name_en'],
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
