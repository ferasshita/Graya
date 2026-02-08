@extends('layouts.app')

@section('title', 'Instructor Dashboard')

@section('content')
<div class="container">
    <h1 class="mb-4">Instructor Dashboard</h1>
    
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Total Courses</h5>
                    <h2>{{ $courses->count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Total Students</h5>
                    <h2>{{ $totalStudents }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Published Courses</h5>
                    <h2>{{ $courses->where('status', 'published')->count() }}</h2>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>My Courses</h5>
                    <a href="{{ route('instructor.course.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Create New Course
                    </a>
                </div>
                <div class="card-body">
                    @if($courses->count() > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Enrollments</th>
                                        <th>Modules</th>
                                        <th>Price</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($courses as $course)
                                        <tr>
                                            <td>{{ $course->title }}</td>
                                            <td>
                                                <span class="badge bg-{{ $course->status === 'published' ? 'success' : 'secondary' }}">
                                                    {{ ucfirst($course->status) }}
                                                </span>
                                            </td>
                                            <td>{{ $course->enrollments_count }}</td>
                                            <td>{{ $course->modules_count }}</td>
                                            <td>{{ $course->is_free ? 'Free' : '$' . $course->price }}</td>
                                            <td>
                                                <a href="{{ route('instructor.course.edit', $course->id) }}" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('instructor.course.students', $course->id) }}" class="btn btn-sm btn-info">
                                                    <i class="fas fa-users"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-muted">You haven't created any courses yet.</p>
                        <a href="{{ route('instructor.course.create') }}" class="btn btn-primary">Create Your First Course</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
