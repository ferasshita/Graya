<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ModuleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:instructor']);
    }

    public function create(Course $course)
    {
        if ($course->instructor_id !== Auth::id()) {
            abort(403);
        }

        return view('instructor.create-module', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        if ($course->instructor_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:video,pdf,text',
            'content' => 'nullable|string',
            'file' => 'nullable|file|max:51200', // 50MB max
            'duration' => 'nullable|integer|min:0',
        ]);

        $validated['course_id'] = $course->id;
        $validated['order'] = $course->modules()->count() + 1;

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('modules', 'public');
            $validated['file_path'] = $path;
        }

        Module::create($validated);

        return redirect()->route('instructor.course.edit', $course->id)
            ->with('success', 'Module added successfully!');
    }

    public function edit(Course $course, Module $module)
    {
        if ($course->instructor_id !== Auth::id() || $module->course_id !== $course->id) {
            abort(403);
        }

        return view('instructor.edit-module', compact('course', 'module'));
    }

    public function update(Request $request, Course $course, Module $module)
    {
        if ($course->instructor_id !== Auth::id() || $module->course_id !== $course->id) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:video,pdf,text',
            'content' => 'nullable|string',
            'file' => 'nullable|file|max:51200',
            'duration' => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('file')) {
            if ($module->file_path) {
                Storage::disk('public')->delete($module->file_path);
            }
            $validated['file_path'] = $request->file('file')->store('modules', 'public');
        }

        $module->update($validated);

        return back()->with('success', 'Module updated successfully!');
    }

    public function delete(Course $course, Module $module)
    {
        if ($course->instructor_id !== Auth::id() || $module->course_id !== $course->id) {
            abort(403);
        }

        if ($module->file_path) {
            Storage::disk('public')->delete($module->file_path);
        }

        $module->delete();

        return back()->with('success', 'Module deleted successfully!');
    }

    public function reorder(Request $request, Course $course)
    {
        if ($course->instructor_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'modules' => 'required|array',
            'modules.*' => 'exists:modules,id',
        ]);

        foreach ($request->modules as $order => $moduleId) {
            Module::where('id', $moduleId)
                ->where('course_id', $course->id)
                ->update(['order' => $order + 1]);
        }

        return response()->json(['success' => true]);
    }
}
