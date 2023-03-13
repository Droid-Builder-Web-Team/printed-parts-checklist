<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            PermissionsSeeder::class,
            DroidFaqSeeder::class,
            DroidTypesSeeder::class,
            DroidSeeder::class,
        ]);
    }
}
