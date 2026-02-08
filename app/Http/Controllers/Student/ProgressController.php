<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Progress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgressController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:student']);
    }

    public function markComplete(Module $module)
    {
        $user = Auth::user();

        // Check if student is enrolled in the course
        $enrollment = $user->enrollments()->where('course_id', $module->course_id)->first();
        
        if (!$enrollment) {
            return response()->json(['error' => 'Not enrolled in this course'], 403);
        }

        // Create or update progress
        $progress = Progress::updateOrCreate(
            [
                'student_id' => $user->id,
                'module_id' => $module->id,
            ],
            [
                'completed' => true,
                'completed_at' => now(),
            ]
        );

        // Update enrollment progress
        $this->updateEnrollmentProgress($enrollment);

        return response()->json([
            'success' => true,
            'progress' => $enrollment->fresh()->progress
        ]);
    }

    private function updateEnrollmentProgress($enrollment)
    {
        $totalModules = $enrollment->course->modules()->count();
        
        if ($totalModules === 0) {
            return;
        }

        $completedModules = Progress::where('student_id', $enrollment->student_id)
            ->whereHas('module', function($q) use ($enrollment) {
                $q->where('course_id', $enrollment->course_id);
            })
            ->where('completed', true)
            ->count();

        $progressPercentage = ($completedModules / $totalModules) * 100;

        $enrollment->update([
            'progress' => round($progressPercentage, 2),
            'completed_at' => $progressPercentage >= 100 ? now() : null,
            'status' => $progressPercentage >= 100 ? 'completed' : 'active',
        ]);
    }
}
