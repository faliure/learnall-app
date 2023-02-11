<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class CourseData extends Data
{
    public function __construct(
        public int  $id,
        public bool $enabled,
        public ?int  $cefrLevel,
        public ?int  $languageId,
        public ?int  $fromLanguageId,
        public ?array  $language,
        public ?array $fromLanguage,
        public ?array $units,
        public string $created_at,
        public string $updated_at,
    ) {}
}
