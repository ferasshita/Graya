<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Student\ProgressController;
use App\Http\Controllers\Student\QuizController as StudentQuizController;
use App\Http\Controllers\Student\ChatController as StudentChatController;
use App\Http\Controllers\Instructor\InstructorController;
use App\Http\Controllers\Instructor\ModuleController;
use App\Http\Controllers\Instructor\QuizController as InstructorQuizController;
use App\Http\Controllers\Instructor\ChatController as InstructorChatController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

// Guest/Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/course/{id}', [HomeController::class, 'courseDetails'])->name('course.details');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Student Routes
Route::prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('dashboard');
    Route::get('/courses', [StudentController::class, 'courses'])->name('courses');
    Route::get('/enrolled-courses', [StudentController::class, 'enrolledCourses'])->name('enrolled-courses');
    Route::post('/enroll/{course}', [StudentController::class, 'enroll'])->name('enroll');
    Route::get('/course/{course}', [StudentController::class, 'viewCourse'])->name('course.view');
    
    // Progress
    Route::post('/progress/module/{module}/complete', [ProgressController::class, 'markComplete'])->name('progress.complete');
    
    // Quizzes
    Route::get('/quiz/{quiz}', [StudentQuizController::class, 'show'])->name('quiz.show');
    Route::post('/quiz/{quiz}/start', [StudentQuizController::class, 'start'])->name('quiz.start');
    Route::get('/quiz/{quiz}/take/{attempt}', [StudentQuizController::class, 'take'])->name('quiz.take');
    Route::post('/quiz/{quiz}/submit/{attempt}', [StudentQuizController::class, 'submit'])->name('quiz.submit');
    Route::get('/quiz/{quiz}/result/{attempt}', [StudentQuizController::class, 'result'])->name('quiz.result');
    
    // Chat
    Route::get('/chat', [StudentChatController::class, 'index'])->name('chat');
    Route::get('/chat/{instructor}', [StudentChatController::class, 'conversation'])->name('chat.conversation');
    Route::post('/chat/{instructor}/send', [StudentChatController::class, 'send'])->name('chat.send');
    Route::get('/chat/{instructor}/messages', [StudentChatController::class, 'getMessages'])->name('chat.messages');
});

// Instructor Routes
Route::prefix('instructor')->name('instructor.')->group(function () {
    Route::get('/dashboard', [InstructorController::class, 'dashboard'])->name('dashboard');
    Route::get('/courses', [InstructorController::class, 'courses'])->name('courses');
    
    // Course Management
    Route::get('/course/create', [InstructorController::class, 'createCourse'])->name('course.create');
    Route::post('/course', [InstructorController::class, 'storeCourse'])->name('course.store');
    Route::get('/course/{course}/edit', [InstructorController::class, 'editCourse'])->name('course.edit');
    Route::put('/course/{course}', [InstructorController::class, 'updateCourse'])->name('course.update');
    Route::delete('/course/{course}', [InstructorController::class, 'deleteCourse'])->name('course.delete');
    Route::get('/course/{course}/students', [InstructorController::class, 'students'])->name('course.students');
    
    // Module Management
    Route::get('/course/{course}/module/create', [ModuleController::class, 'create'])->name('module.create');
    Route::post('/course/{course}/module', [ModuleController::class, 'store'])->name('module.store');
    Route::get('/course/{course}/module/{module}/edit', [ModuleController::class, 'edit'])->name('module.edit');
    Route::put('/course/{course}/module/{module}', [ModuleController::class, 'update'])->name('module.update');
    Route::delete('/course/{course}/module/{module}', [ModuleController::class, 'delete'])->name('module.delete');
    Route::post('/course/{course}/module/reorder', [ModuleController::class, 'reorder'])->name('module.reorder');
    
    // Quiz Management
    Route::get('/course/{course}/quiz/create', [InstructorQuizController::class, 'create'])->name('quiz.create');
    Route::post('/course/{course}/quiz', [InstructorQuizController::class, 'store'])->name('quiz.store');
    Route::get('/course/{course}/quiz/{quiz}/edit', [InstructorQuizController::class, 'edit'])->name('quiz.edit');
    Route::put('/course/{course}/quiz/{quiz}', [InstructorQuizController::class, 'update'])->name('quiz.update');
    Route::delete('/course/{course}/quiz/{quiz}', [InstructorQuizController::class, 'delete'])->name('quiz.delete');
    
    // Quiz Questions
    Route::post('/course/{course}/quiz/{quiz}/question', [InstructorQuizController::class, 'addQuestion'])->name('quiz.question.add');
    Route::put('/course/{course}/quiz/{quiz}/question/{question}', [InstructorQuizController::class, 'updateQuestion'])->name('quiz.question.update');
    Route::delete('/course/{course}/quiz/{quiz}/question/{question}', [InstructorQuizController::class, 'deleteQuestion'])->name('quiz.question.delete');
    
    // Chat
    Route::get('/chat', [InstructorChatController::class, 'index'])->name('chat');
    Route::get('/chat/{student}', [InstructorChatController::class, 'conversation'])->name('chat.conversation');
    Route::post('/chat/{student}/send', [InstructorChatController::class, 'send'])->name('chat.send');
    Route::get('/chat/{student}/messages', [InstructorChatController::class, 'getMessages'])->name('chat.messages');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // User Management
    Route::get('/students', [AdminController::class, 'students'])->name('students');
    Route::get('/instructors', [AdminController::class, 'instructors'])->name('instructors');
    Route::put('/user/{user}/role', [AdminController::class, 'updateUserRole'])->name('user.role');
    Route::delete('/user/{user}', [AdminController::class, 'deleteUser'])->name('user.delete');
    
    // Enrollment Management
    Route::get('/enrollments', [AdminController::class, 'enrollments'])->name('enrollments');
    Route::put('/enrollment/{enrollment}/status', [AdminController::class, 'updateEnrollmentStatus'])->name('enrollment.status');
    
    // Payment Management
    Route::get('/payments', [AdminController::class, 'payments'])->name('payments');
    Route::put('/payment/{payment}/status', [AdminController::class, 'updatePaymentStatus'])->name('payment.status');
    
    // Course Management
    Route::get('/courses', [AdminController::class, 'courses'])->name('courses');
});
