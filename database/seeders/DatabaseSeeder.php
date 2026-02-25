<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ActivityNatureSeeder::class,
            CurationNatureSeeder::class,
            ProjectCategorySeeder::class,
            ProjectNatureSeeder::class,
            ProjectTypeSeeder::class,
            RoleSeeder::class,
            TagSeeder::class,
            ZoneSeeder::class,
        ]);
    }
}
