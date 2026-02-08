@extends('layouts.app')

@section('title', $course->title)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @if($course->thumbnail)
                <img src="{{ asset('storage/' . $course->thumbnail) }}" class="img-fluid rounded mb-4" alt="{{ $course->title }}">
            @else
                <div class="bg-secondary text-white p-5 rounded mb-4 text-center">
                    <i class="fas fa-book fa-5x mb-3"></i>
                    <h2>{{ $course->title }}</h2>
                </div>
            @endif
            
            <h1>{{ $course->title }}</h1>
            
            <div class="mb-3">
                <span class="badge bg-primary">{{ ucfirst($course->status) }}</span>
                @if($course->is_free)
                    <span class="badge bg-success">Free Course</span>
                @else
                    <span class="badge bg-info">${{ $course->price }}</span>
                @endif
            </div>
            
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Course Description</h5>
                </div>
                <div class="card-body">
                    <p>{{ $course->description }}</p>
                </div>
            </div>
            
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Course Content</h5>
                </div>
                <div class="card-body">
                    @if($course->modules->count() > 0)
                        <div class="list-group">
                            @foreach($course->modules as $module)
                                <div class="list-group-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-1">{{ $module->title }}</h6>
                                            <small class="text-muted">
                                                <i class="fas fa-{{ $module->type === 'video' ? 'video' : ($module->type === 'pdf' ? 'file-pdf' : 'text') }}"></i>
                                                {{ ucfirst($module->type) }}
                                                @if($module->duration)
                                                    • {{ $module->duration }} minutes
                                                @endif
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted">No modules added yet.</p>
                    @endif
                </div>
            </div>
            
            @if($course->quizzes->count() > 0)
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>Quizzes</h5>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            @foreach($course->quizzes as $quiz)
                                <div class="list-group-item">
                                    <h6>{{ $quiz->title }}</h6>
                                    <small class="text-muted">
                                        Passing Score: {{ $quiz->passing_score }}%
                                        @if($quiz->duration_minutes)
                                            • Duration: {{ $quiz->duration_minutes }} minutes
                                        @endif
                                    </small>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
        
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Instructor</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <i class="fas fa-user-circle fa-3x text-primary"></i>
                        </div>
                        <div>
                            <h6 class="mb-0">{{ $course->instructor->name }}</h6>
                            <small class="text-muted">{{ $course->instructor->email }}</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <h5>Enrollment</h5>
                </div>
                <div class="card-body">
                    @auth
                        @if(auth()->user()->isStudent())
                            <form action="{{ route('student.enroll', $course->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary w-100 mb-2">
                                    <i class="fas fa-graduation-cap"></i> Enroll in This Course
                                </button>
                            </form>
                            @if(!$course->is_free)
                                <small class="text-muted">
                                    <i class="fas fa-info-circle"></i> 
                                    You will need to pay ${{ $course->price }} to the admin to activate your enrollment.
                                </small>
                            @endif
                        @else
                            <p class="text-muted">Only students can enroll in courses.</p>
                        @endif
                    @else
                        <p class="text-muted mb-3">Please login or register as a student to enroll.</p>
                        <a href="{{ route('login') }}" class="btn btn-primary w-100 mb-2">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-outline-primary w-100">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
