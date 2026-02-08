<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class InstructorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:instructor']);
    }

    public function dashboard()
    {
        $instructor = Auth::user();
        $courses = $instructor->courses()->withCount(['enrollments', 'modules'])->get();
        $totalStudents = $instructor->courses()->withCount('enrollments')->get()->sum('enrollments_count');

        return view('instructor.dashboard', compact('courses', 'totalStudents'));
    }

    public function courses()
    {
        $courses = Auth::user()->courses()->withCount(['enrollments', 'modules'])->get();
        return view('instructor.courses', compact('courses'));
    }

    public function createCourse()
    {
        return view('instructor.create-course');
    }

    public function storeCourse(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'is_free' => 'boolean',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        $validated['instructor_id'] = Auth::id();
        $validated['status'] = 'draft';

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $course = Course::create($validated);

        return redirect()->route('instructor.course.edit', $course->id)
            ->with('success', 'Course created successfully!');
    }

    public function editCourse(Course $course)
    {
        if ($course->instructor_id !== Auth::id()) {
            abort(403);
        }

        $course->load(['modules', 'quizzes']);
        return view('instructor.edit-course', compact('course'));
    }

    public function updateCourse(Request $request, Course $course)
    {
        if ($course->instructor_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'is_free' => 'boolean',
            'status' => 'required|in:draft,published,archived',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($course->thumbnail) {
                Storage::disk('public')->delete($course->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $course->update($validated);

        return back()->with('success', 'Course updated successfully!');
    }

    public function deleteCourse(Course $course)
    {
        if ($course->instructor_id !== Auth::id()) {
            abort(403);
        }

        if ($course->thumbnail) {
            Storage::disk('public')->delete($course->thumbnail);
        }

        $course->delete();

        return redirect()->route('instructor.courses')
            ->with('success', 'Course deleted successfully!');
    }

    public function students(Course $course)
    {
        if ($course->instructor_id !== Auth::id()) {
            abort(403);
        }

        $enrollments = $course->enrollments()
            ->with(['student', 'payment'])
            ->get();

        return view('instructor.students', compact('course', 'enrollments'));
    }
}
