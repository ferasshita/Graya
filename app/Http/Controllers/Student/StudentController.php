<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:student']);
    }

    public function dashboard()
    {
        $user = Auth::user();
        $enrollments = $user->enrollments()->with('course')->get();
        $availableCourses = Course::where('status', 'published')
            ->whereNotIn('id', $enrollments->pluck('course_id'))
            ->get();

        return view('student.dashboard', compact('enrollments', 'availableCourses'));
    }

    public function courses()
    {
        $courses = Course::where('status', 'published')
            ->with('instructor')
            ->paginate(12);

        return view('student.courses', compact('courses'));
    }

    public function enrolledCourses()
    {
        $enrollments = Auth::user()->enrollments()
            ->with('course.instructor')
            ->get();

        return view('student.enrolled-courses', compact('enrollments'));
    }

    public function enroll(Request $request, Course $course)
    {
        $user = Auth::user();

        // Check if already enrolled
        if ($user->enrollments()->where('course_id', $course->id)->exists()) {
            return back()->with('error', 'You are already enrolled in this course.');
        }

        // Create enrollment
        $enrollment = Enrollment::create([
            'student_id' => $user->id,
            'course_id' => $course->id,
            'status' => Enrollment::STATUS_ACTIVE,
            'enrolled_at' => now(),
            'progress' => 0,
        ]);

        // Create payment record
        Payment::create([
            'student_id' => $user->id,
            'enrollment_id' => $enrollment->id,
            'amount' => $course->is_free ? 0 : $course->price,
            'method' => $course->is_free ? Payment::METHOD_FREE : Payment::METHOD_CASH,
            'status' => $course->is_free ? Payment::STATUS_COMPLETED : Payment::STATUS_PENDING,
            'paid_at' => $course->is_free ? now() : null,
        ]);

        $message = $course->is_free 
            ? 'Successfully enrolled in the course!'
            : 'Enrollment created. Please pay the course fee to the admin to activate your enrollment.';

        return redirect()->route('student.course.view', $course->id)->with('success', $message);
    }

    public function viewCourse(Course $course)
    {
        $user = Auth::user();
        $enrollment = $user->enrollments()->where('course_id', $course->id)->first();

        if (!$enrollment) {
            return redirect()->route('student.courses')->with('error', 'You must enroll in this course first.');
        }

        $course->load(['modules', 'quizzes', 'instructor']);
        $progress = $user->progress()->whereHas('module', function($q) use ($course) {
            $q->where('course_id', $course->id);
        })->get();

        return view('student.view-course', compact('course', 'enrollment', 'progress'));
    }
}
