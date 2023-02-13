<?php

namespace App\Http\Middleware;

use App\Repositories\CourseRepository;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    public function __construct(
        protected CourseRepository $courseRepository
    ) {
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'user'     => [
                'id'        => me()->id,
                'name'      => me()->name,
                'email'     => me()->email,
                'course_id' => me()->activeCourse_id,
            ],
            'location' => $request->url(),
            'env'      => app()->environment(),
            'course'   => $this->courseRepository->getActiveCourse(),
            'response' => $request->session()->get('response'),
        ]);
    }
}
