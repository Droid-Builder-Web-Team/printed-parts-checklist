<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'robhowdle94@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('ngf9axd@TWC3xrk0hec') // ngf9axd@TWC3xrk0hec
        ]);
    }
}
