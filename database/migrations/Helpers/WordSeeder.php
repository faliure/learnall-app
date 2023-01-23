<?php

namespace Database\Migrations\Helpers;

use App\Models\Language;
use App\Models\Word;
use JamesGordo\CSV\Parser;

class WordSeeder
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public static function import(Language $language, string $batchName): void
    {
        $languageId = $language->getKey();

        $words = new Parser(dirname(__DIR__) . '/batches/words/' . $batchName . '.csv');

        $items = collect($words->all())
            ->map(fn ($word) => array_map('trim', (array) $word))
            ->map(fn ($word) => $word + ['language_id' => $languageId])
            ->map(fn ($word) => array_map(fn ($value) => $value ?: null, $word))
            ->all();

        Word::upsert($items, [], []);
    }
};
