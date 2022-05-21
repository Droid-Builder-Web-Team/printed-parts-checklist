<?php

namespace Database\Seeders;

use app\Models\DroidFaq;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            'droid_id' => '1',
            'title' => 'Question 1',
            'content' => '',
        ];
    }
}
