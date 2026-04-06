<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParticipationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $participationTypes = [
            [
                'name_tw' => '自由參加',
                'name_en' => 'Drop-in',
            ],
            [
                'name_tw' => '預約參加',
                'name_en' => 'Reservation Required',
                'link_name_tw' => '預約',
                'link_name_en' => 'Reserve',
            ],
            [
                'name_tw' => '事前報名',
                'name_en' => 'Registration Required',
                'link_name_tw' => '報名',
                'link_name_en' => 'Register',
            ],
            [
                'name_tw' => '需購票',
                'name_en' => 'Ticket Required',
                'link_name_tw' => '購票',
                'link_name_en' => 'Tickets',
            ],
        ];

        foreach ($participationTypes as $participationType) {
            DB::table('participation_types')->insert([
                'name_tw' => $participationType['name_tw'],
                'name_en' => $participationType['name_en'],
                'link_name_tw' => $participationType['link_name_tw'] ?? null,
                'link_name_en' => $participationType['link_name_en'] ?? null,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
