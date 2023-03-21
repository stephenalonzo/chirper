<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        \App\Models\User::factory(1)->create([
            'name'      => 'Austin Reaves',
            'email'     => 'ar15@lakers.com',
            'username'  => 'ar15',
            'password'  => bcrypt('ihatejoshgreen')
        ]);

        \App\Models\User::factory(1)->create([
            'name'      => 'Josh Green',
            'email'     => 'frog@mavs.com',
            'username'  => 'frog',
            'password'  => bcrypt('isuckeggs')
        ]);
        
        // \App\Models\Chirp::factory(1)->create([
        //     'user_id'   => '1',
        //     'name'  => 'Austin Reaves',
        //     'username'  => 'ar15',
        //     'subject'   => 'Hello World'
        // ]);
    }
}
