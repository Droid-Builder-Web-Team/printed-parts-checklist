<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DroidFaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faq = [
            'droids_id' => '1',
            'title' => 'Question 1',
            'content' => '',
        ];
    }
}
