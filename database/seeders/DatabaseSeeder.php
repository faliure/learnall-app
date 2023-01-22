<?php

namespace Database\Seeders;

use App\Models\Sentence;
use App\Models\Word;
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
        Sentence::factory(10)->create();

        Word::factory(10)->create();
    }
}
