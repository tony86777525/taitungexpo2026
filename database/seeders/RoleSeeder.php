<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'system_admin',
                'guard_name' => 'web',
                'name_tw' => '全網站管理者',
            ],
            [
                'name' => 'reservation_system_admin',
                'guard_name' => 'web',
                'name_tw' => '全預約系統管理者',
            ],
            [
                'name' => 'venue_reservation_system_admin',
                'guard_name' => 'web',
                'name_tw' => '分場館預約系統管理者',
            ],
            [
                'name' => 'private_sector_project_system_admin',
                'guard_name' => 'web',
                'name_tw' => '民間參與計畫專區管理',
            ],
        ];

        foreach ($roles as $role) {
            DB::table('roles')->insert([
                'name' => $role['name'],
                'guard_name' => $role['guard_name'],
                'name_tw' => $role['name_tw'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
