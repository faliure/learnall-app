<?php

use App\Models\Language;
use App\Models\Word;
use Database\Migrations\Helpers\WordSeeder;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    private const LANGUAGE_CODE = 'ua';
    private const BATCH_NAME    = 'ua-1';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        WordSeeder::import(Language::firstWhere('code', self::LANGUAGE_CODE), self::BATCH_NAME);
    }
};
