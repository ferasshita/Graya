<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
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

        return view('instructor.create-quiz', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        if ($course->instructor_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'passing_score' => 'required|integer|min:0|max:100',
            'duration_minutes' => 'nullable|integer|min:1',
        ]);

        $validated['course_id'] = $course->id;
        $quiz = Quiz::create($validated);

        return redirect()->route('instructor.quiz.edit', ['course' => $course->id, 'quiz' => $quiz->id])
            ->with('success', 'Quiz created successfully! Now add questions.');
    }

    public function edit(Course $course, Quiz $quiz)
    {
        if ($course->instructor_id !== Auth::id() || $quiz->course_id !== $course->id) {
            abort(403);
        }

        $quiz->load('questions');
        return view('instructor.edit-quiz', compact('course', 'quiz'));
    }

    public function update(Request $request, Course $course, Quiz $quiz)
    {
        if ($course->instructor_id !== Auth::id() || $quiz->course_id !== $course->id) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'passing_score' => 'required|integer|min:0|max:100',
            'duration_minutes' => 'nullable|integer|min:1',
        ]);

        $quiz->update($validated);

        return back()->with('success', 'Quiz updated successfully!');
    }

    public function delete(Course $course, Quiz $quiz)
    {
        if ($course->instructor_id !== Auth::id() || $quiz->course_id !== $course->id) {
            abort(403);
        }

        $quiz->delete();

        return redirect()->route('instructor.course.edit', $course->id)
            ->with('success', 'Quiz deleted successfully!');
    }

    public function addQuestion(Request $request, Course $course, Quiz $quiz)
    {
        if ($course->instructor_id !== Auth::id() || $quiz->course_id !== $course->id) {
            abort(403);
        }

        $validated = $request->validate([
            'question_text' => 'required|string',
            'options' => 'required|array|min:2',
            'correct_answer' => 'required|string',
            'points' => 'required|integer|min:1',
        ]);

        $validated['quiz_id'] = $quiz->id;
        QuizQuestion::create($validated);

        return back()->with('success', 'Question added successfully!');
    }

    public function updateQuestion(Request $request, Course $course, Quiz $quiz, QuizQuestion $question)
    {
        if ($course->instructor_id !== Auth::id() || $quiz->course_id !== $course->id || $question->quiz_id !== $quiz->id) {
            abort(403);
        }

        $validated = $request->validate([
            'question_text' => 'required|string',
            'options' => 'required|array|min:2',
            'correct_answer' => 'required|string',
            'points' => 'required|integer|min:1',
        ]);

        $question->update($validated);

        return back()->with('success', 'Question updated successfully!');
    }

    public function deleteQuestion(Course $course, Quiz $quiz, QuizQuestion $question)
    {
        if ($course->instructor_id !== Auth::id() || $quiz->course_id !== $course->id || $question->quiz_id !== $quiz->id) {
            abort(403);
        }

        $question->delete();

        return back()->with('success', 'Question deleted successfully!');
    }
}
