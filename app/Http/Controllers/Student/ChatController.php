<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:student']);
    }

    public function index()
    {
        $user = Auth::user();
        
        // Get instructors from enrolled courses
        $instructors = User::whereIn('id', function($query) use ($user) {
            $query->select('instructor_id')
                ->from('courses')
                ->whereIn('id', function($subQuery) use ($user) {
                    $subQuery->select('course_id')
                        ->from('enrollments')
                        ->where('student_id', $user->id);
                });
        })->get();

        return view('student.chat', compact('instructors'));
    }

    public function conversation(User $instructor)
    {
        if (!$instructor->isInstructor()) {
            abort(404);
        }

        $user = Auth::user();
        
        $messages = ChatMessage::where(function($q) use ($user, $instructor) {
            $q->where('sender_id', $user->id)->where('receiver_id', $instructor->id);
        })->orWhere(function($q) use ($user, $instructor) {
            $q->where('sender_id', $instructor->id)->where('receiver_id', $user->id);
        })->with(['sender', 'receiver'])->orderBy('created_at')->get();

        // Mark messages as read
        ChatMessage::where('sender_id', $instructor->id)
            ->where('receiver_id', $user->id)
            ->whereNull('read_at')
            ->update(['read_at' => now()]);

        return view('student.conversation', compact('instructor', 'messages'));
    }

    public function send(Request $request, User $instructor)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
            'course_id' => 'nullable|exists:courses,id',
        ]);

        $message = ChatMessage::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $instructor->id,
            'course_id' => $request->course_id,
            'message' => $request->message,
        ]);

        return response()->json(['success' => true, 'message' => $message->load('sender')]);
    }

    public function getMessages(User $instructor)
    {
        $user = Auth::user();
        
        $messages = ChatMessage::where(function($q) use ($user, $instructor) {
            $q->where('sender_id', $user->id)->where('receiver_id', $instructor->id);
        })->orWhere(function($q) use ($user, $instructor) {
            $q->where('sender_id', $instructor->id)->where('receiver_id', $user->id);
        })->with(['sender', 'receiver'])
        ->where('created_at', '>', now()->subMinutes(1))
        ->orderBy('created_at')
        ->get();

        return response()->json($messages);
    }
}
