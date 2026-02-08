<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $courses = Course::where('status', 'published')
            ->with('instructor')
            ->latest()
            ->paginate(12);

        return view('guest.home', compact('courses'));
    }

    public function about()
    {
        return view('guest.about');
    }

    public function courseDetails($id)
    {
        $course = Course::with(['instructor', 'modules', 'quizzes'])
            ->where('status', 'published')
            ->findOrFail($id);

        return view('guest.course-details', compact('course'));
    }
}
