<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class CourseData extends Data
{
    public function __construct(
        public int  $id,
        public ?string  $cefrLevel,
        public ?int  $languageId,
        public ?int  $fromLanguageId,
        public ?array  $language,
        public ?array $fromLanguage,
        public ?array $units,
    ) {
    }
}
