<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use App\Models\Course;

class CourseController extends Controller
{
    public function classes()
    {
        // get all classes of the authenticated trainer
        $courses = Course::query();
        $courses->where('user_id', auth()->user()->id);

        if ($keyword = request('search')) {
            $courses->where('name', 'LIKE', "%{$keyword}%")
                ->orWhere('sessions_per_week', $keyword);
        }

        $courses = $courses->orderBy('name')->get();

        return view('trainer.class.classes', compact('courses'));
    }

    //todo infoClass method for displaying all class members
}
