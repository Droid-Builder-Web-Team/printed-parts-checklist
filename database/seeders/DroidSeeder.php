<?php

namespace Database\Seeders;

use App\Models\Droid;
use Illuminate\Database\Seeder;

class DroidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Droid::create([
            'name' => 'R2-D2',
            'version' => 'MK1',
            'description' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.',
            'tags' => 'Test Tag',
            'type_id' => 1,
            'image' => 'public/droids/14/droid-mainframe-images/QWp4tCtTwt6f2JT3PPSWHv60vRghpbF7mfk9aCZu.webp',
        ]);
    }
}
