<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Payment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    public function dashboard()
    {
        $stats = [
            'total_students' => User::where('role', User::ROLE_STUDENT)->count(),
            'total_instructors' => User::where('role', User::ROLE_INSTRUCTOR)->count(),
            'total_courses' => Course::count(),
            'total_enrollments' => Enrollment::count(),
            'pending_payments' => Payment::where('status', Payment::STATUS_PENDING)->count(),
            'total_revenue' => Payment::where('status', Payment::STATUS_COMPLETED)->sum('amount'),
        ];

        $recentEnrollments = Enrollment::with(['student', 'course'])
            ->latest()
            ->limit(10)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentEnrollments'));
    }

    public function students()
    {
        $students = User::where('role', User::ROLE_STUDENT)
            ->withCount('enrollments')
            ->paginate(20);

        return view('admin.students', compact('students'));
    }

    public function instructors()
    {
        $instructors = User::where('role', User::ROLE_INSTRUCTOR)
            ->withCount('courses')
            ->paginate(20);

        return view('admin.instructors', compact('instructors'));
    }

    public function updateUserRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:guest,student,instructor,admin',
        ]);

        $user->update(['role' => $request->role]);

        return back()->with('success', 'User role updated successfully!');
    }

    public function deleteUser(User $user)
    {
        // Prevent deleting yourself
        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot delete your own account!');
        }

        $user->delete();

        return back()->with('success', 'User deleted successfully!');
    }

    public function enrollments()
    {
        $enrollments = Enrollment::with(['student', 'course', 'payment'])
            ->latest()
            ->paginate(20);

        return view('admin.enrollments', compact('enrollments'));
    }

    public function updateEnrollmentStatus(Request $request, Enrollment $enrollment)
    {
        $request->validate([
            'status' => 'required|in:active,completed,cancelled',
        ]);

        $enrollment->update(['status' => $request->status]);

        return back()->with('success', 'Enrollment status updated successfully!');
    }

    public function payments()
    {
        $payments = Payment::with(['student', 'enrollment.course'])
            ->latest()
            ->paginate(20);

        return view('admin.payments', compact('payments'));
    }

    public function updatePaymentStatus(Request $request, Payment $payment)
    {
        $request->validate([
            'status' => 'required|in:pending,completed,cancelled',
        ]);

        $data = ['status' => $request->status];
        
        if ($request->status === Payment::STATUS_COMPLETED && !$payment->paid_at) {
            $data['paid_at'] = now();
        }

        $payment->update($data);

        return back()->with('success', 'Payment status updated successfully!');
    }

    public function courses()
    {
        $courses = Course::with('instructor')
            ->withCount('enrollments')
            ->paginate(20);

        return view('admin.courses', compact('courses'));
    }
}
