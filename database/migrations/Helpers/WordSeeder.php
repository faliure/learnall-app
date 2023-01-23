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
    public static function import(Language $language, string $batchName, string $delimiter = "|"): void
    {
        $languageId = $language->getKey();

        $parser = new Parser();
        $parser->setCsv(dirname(__DIR__) . '/batches/words/' . $batchName . '.csv');
        $parser->setDelimeter($delimiter);
        $parser->parse();

        $words = collect($parser->all())
            ->map(fn ($word) => array_map('trim', (array) $word))
            ->map(fn ($word) => $word + ['language_id' => $languageId])
            ->map(fn ($word) => array_map(fn ($value) => $value ?: null, $word))
            ->all();

        Word::upsert($words, [], []);
    }
};
