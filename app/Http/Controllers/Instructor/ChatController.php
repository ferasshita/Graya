<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:instructor']);
    }

    public function index()
    {
        $instructor = Auth::user();
        
        // Get students from instructor's courses
        $students = User::whereIn('id', function($query) use ($instructor) {
            $query->select('student_id')
                ->from('enrollments')
                ->whereIn('course_id', function($subQuery) use ($instructor) {
                    $subQuery->select('id')
                        ->from('courses')
                        ->where('instructor_id', $instructor->id);
                });
        })->get();

        return view('instructor.chat', compact('students'));
    }

    public function conversation(User $student)
    {
        if (!$student->isStudent()) {
            abort(404);
        }

        $instructor = Auth::user();
        
        $messages = ChatMessage::where(function($q) use ($instructor, $student) {
            $q->where('sender_id', $instructor->id)->where('receiver_id', $student->id);
        })->orWhere(function($q) use ($instructor, $student) {
            $q->where('sender_id', $student->id)->where('receiver_id', $instructor->id);
        })->with(['sender', 'receiver'])->orderBy('created_at')->get();

        // Mark messages as read
        ChatMessage::where('sender_id', $student->id)
            ->where('receiver_id', $instructor->id)
            ->whereNull('read_at')
            ->update(['read_at' => now()]);

        return view('instructor.conversation', compact('student', 'messages'));
    }

    public function send(Request $request, User $student)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
            'course_id' => 'nullable|exists:courses,id',
        ]);

        $message = ChatMessage::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $student->id,
            'course_id' => $request->course_id,
            'message' => $request->message,
        ]);

        return response()->json(['success' => true, 'message' => $message->load('sender')]);
    }

    public function getMessages(User $student)
    {
        $instructor = Auth::user();
        
        $messages = ChatMessage::where(function($q) use ($instructor, $student) {
            $q->where('sender_id', $instructor->id)->where('receiver_id', $student->id);
        })->orWhere(function($q) use ($instructor, $student) {
            $q->where('sender_id', $student->id)->where('receiver_id', $instructor->id);
        })->with(['sender', 'receiver'])
        ->where('created_at', '>', now()->subMinutes(1))
        ->orderBy('created_at')
        ->get();

        return response()->json($messages);
    }
}
