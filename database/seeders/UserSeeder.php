<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        if (User::whereName('Luke Skywalker')->doesntExist()) {
            User::factory()->unverified()->create([
                'name'  => 'Luke Skywalker',
                'email' => 'luke@jedi.com',
            ]);
        }

        User::factory(5)->create();
    }
}
