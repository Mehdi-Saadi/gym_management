<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CourseController extends Controller
{
    public function classes()
    {
        $courses = Course::query();

        if ($keyword = request('search')) {
            $courses->where('name', 'LIKE', "%{$keyword}%")
                ->orWhere('sessions_per_week', $keyword);
        }

        $courses = $courses->orderBy('name')->paginate(20);

        return view('admin.class.classes', compact('courses'));
    }

    public function createClass()
    {
        $categories = Category::all();
        $trainers = User::where('is_trainer', 1)->get();
        return view('admin.class.newClass', compact(['categories', 'trainers']));
    }

    public function addClass(Request $request)
    {
        // the given user must be trainer
        $trainer_ids = User::where('is_trainer', 1)->pluck('id')->toArray();

        $data = $request->validate([
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'user_id' => ['required', Rule::in($trainer_ids)],
            'name' => ['required', 'max:100', Rule::unique('courses', 'name')],
            'sessions_per_week' => ['required', 'min:1'],
        ]);

        Course::create($data);

        alert('', 'Class Created!', 'success');
        return to_route('admin.classes');
    }

    public function deleteClass(Course $course)
    {
        $course->delete();

        alert('', 'Class Deleted!', 'success');
        return back();
    }

    public function editClass(Course $course)
    {
        $categories = Category::all();
        $trainers = User::where('is_trainer', 1)->get();

        return view('admin.class.editClass', compact(['course', 'categories', 'trainers']));
    }

    public function updateClass(Request $request, Course $course)
    {
        // the given user must be trainer
        $trainer_ids = User::where('is_trainer', 1)->pluck('id')->toArray();

        $data = $request->validate([
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'user_id' => ['required', Rule::in($trainer_ids)],
            'name' => ['required', 'max:100', Rule::unique('courses', 'name')->ignore($course->id)],
            'sessions_per_week' => ['required', 'min:1'],
        ]);

        $course->update($data);

        alert('', 'Class Changed!', 'success');
        return to_route('admin.classes');
    }

    //todo infoClass method for displaying all class members
}
