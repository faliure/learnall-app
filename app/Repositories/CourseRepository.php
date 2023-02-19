<?php

namespace App\Repositories;

use App\Data\CourseData;
use App\Services\Api;

class CourseRepository
{
    public function __construct(protected Api $api)
    {
    }

    public function getActiveCourse(): ?CourseData
    {
        if (! $courseId = my('activeCourseId')) {
            return null;
        } elseif (cache('activeCourse')?->id === $courseId) {
            return cache('activeCourse');
        }

        $course = $this->api->get("/courses/$courseId", [
            'withRelations' => [ '*' ],
        ])->json();

        return cache('activeCourse', CourseData::from($course));
    }
}
