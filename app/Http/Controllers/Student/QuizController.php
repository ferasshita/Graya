<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:student']);
    }

    public function show(Quiz $quiz)
    {
        $user = Auth::user();
        
        // Check if student is enrolled in the course
        $enrollment = $user->enrollments()->where('course_id', $quiz->course_id)->first();
        
        if (!$enrollment) {
            return redirect()->route('student.courses')->with('error', 'You must be enrolled to take this quiz.');
        }

        $quiz->load('questions');
        $attempts = $user->quizAttempts()->where('quiz_id', $quiz->id)->get();

        return view('student.quiz', compact('quiz', 'attempts'));
    }

    public function start(Quiz $quiz)
    {
        $user = Auth::user();

        $attempt = QuizAttempt::create([
            'student_id' => $user->id,
            'quiz_id' => $quiz->id,
            'started_at' => now(),
            'score' => 0,
        ]);

        return redirect()->route('student.quiz.take', ['quiz' => $quiz->id, 'attempt' => $attempt->id]);
    }

    public function take(Quiz $quiz, QuizAttempt $attempt)
    {
        if ($attempt->student_id !== Auth::id()) {
            abort(403);
        }

        if ($attempt->completed_at) {
            return redirect()->route('student.quiz.result', ['quiz' => $quiz->id, 'attempt' => $attempt->id]);
        }

        $quiz->load('questions');

        return view('student.take-quiz', compact('quiz', 'attempt'));
    }

    public function submit(Request $request, Quiz $quiz, QuizAttempt $attempt)
    {
        if ($attempt->student_id !== Auth::id() || $attempt->completed_at) {
            abort(403);
        }

        $answers = $request->input('answers', []);
        $score = 0;
        $totalPoints = 0;

        foreach ($quiz->questions as $question) {
            $totalPoints += $question->points;
            
            if (isset($answers[$question->id]) && $answers[$question->id] === $question->correct_answer) {
                $score += $question->points;
            }
        }

        $scorePercentage = $totalPoints > 0 ? round(($score / $totalPoints) * 100) : 0;

        $attempt->update([
            'answers' => $answers,
            'score' => $scorePercentage,
            'completed_at' => now(),
        ]);

        return redirect()->route('student.quiz.result', ['quiz' => $quiz->id, 'attempt' => $attempt->id])
            ->with('success', 'Quiz submitted successfully!');
    }

    public function result(Quiz $quiz, QuizAttempt $attempt)
    {
        if ($attempt->student_id !== Auth::id()) {
            abort(403);
        }

        $quiz->load('questions');

        return view('student.quiz-result', compact('quiz', 'attempt'));
    }
}
