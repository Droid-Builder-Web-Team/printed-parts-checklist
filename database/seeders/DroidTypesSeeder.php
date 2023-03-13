<?php

namespace Database\Seeders;

use App\Models\DroidType;
use Illuminate\Database\Seeder;

class DroidTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $droidTypes = [
            'Full Droid',
            'Dome',
            'Body',
            'Work In Progress',
            'MicroDroid',
            'MiniDroid',
            'BabyDroid'

        ];


        foreach ($droidTypes as $type) {
            app(DroidType::class)->create([
                'type' => $type
            ]);
        }
    }
}
