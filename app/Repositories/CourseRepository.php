<?php

namespace App\Repositories;

use App\Data\CourseData;
use App\Services\Api;

class CourseRepository
{
    public function __construct(protected Api $api)
    {
    }

    public function all(array $withRelations = [], array $withCounters = []): array
    {
        return $this->api->get('courses', [
            'withRelations' => $withRelations,
            'withCounters'  => $withCounters,
        ])->json();
    }

    public function active(array $withRelations = [], array $withCounters = []): ?CourseData
    {
        if (! $courseId = my('activeCourseId')) {
            return null;
        } elseif (cache('activeCourse')?->id === $courseId) {
            return cache('activeCourse');
        }

        $course = $this->api->get("/courses/$courseId", [
            'withRelations' => $withRelations,
            'withCounters'  => $withCounters,
        ])->json();

        return cache('activeCourse', CourseData::from($course));
    }
}
