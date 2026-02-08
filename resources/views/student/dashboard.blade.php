@extends('layouts.app')

@section('title', 'Student Dashboard')

@section('content')
<div class="container">
    <h1 class="mb-4">Student Dashboard</h1>
    
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>My Enrolled Courses</h5>
                </div>
                <div class="card-body">
                    @if($enrollments->count() > 0)
                        <div class="list-group">
                            @foreach($enrollments as $enrollment)
                                <a href="{{ route('student.course.view', $enrollment->course->id) }}" 
                                   class="list-group-item list-group-item-action">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-1">{{ $enrollment->course->title }}</h6>
                                            <small class="text-muted">Instructor: {{ $enrollment->course->instructor->name }}</small>
                                        </div>
                                        <div>
                                            <div class="progress" style="width: 150px;">
                                                <div class="progress-bar" role="progressbar" 
                                                     style="width: {{ $enrollment->progress }}%">
                                                    {{ round($enrollment->progress) }}%
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted">You haven't enrolled in any courses yet.</p>
                        <a href="{{ route('student.courses') }}" class="btn btn-primary">Browse Courses</a>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Quick Stats</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <h6>Total Enrollments</h6>
                        <h3>{{ $enrollments->count() }}</h3>
                    </div>
                    <div class="mb-3">
                        <h6>Completed Courses</h6>
                        <h3>{{ $enrollments->where('status', 'completed')->count() }}</h3>
                    </div>
                    <div class="mb-3">
                        <h6>Active Courses</h6>
                        <h3>{{ $enrollments->where('status', 'active')->count() }}</h3>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <h5>Quick Actions</h5>
                </div>
                <div class="card-body">
                    <a href="{{ route('student.courses') }}" class="btn btn-primary w-100 mb-2">
                        <i class="fas fa-book"></i> Browse Courses
                    </a>
                    <a href="{{ route('student.chat') }}" class="btn btn-outline-primary w-100">
                        <i class="fas fa-comments"></i> Chat with Instructors
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
