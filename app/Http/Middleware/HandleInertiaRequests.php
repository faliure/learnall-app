<?php

namespace App\Http\Middleware;

use App\Repositories\CourseRepository;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    public function __construct(protected CourseRepository $courseRepository)
    {
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'user'     => auth()->guest() ? null : [
                'id'        => me()->id,
                'name'      => me()->name,
                'email'     => me()->email,
                'course_id' => me()->activeCourseId,
                'course'    => $this->courseRepository->active(
                    withRelations: [ 'fromLanguage', 'language' ],
                ),
            ],
            'location' => $request->url(),
            'env'      => app()->environment(),
            'response' => $request->session()->get('response'),
        ]);
    }
}
