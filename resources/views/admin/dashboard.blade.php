@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container">
    <h1 class="mb-4">Admin Dashboard</h1>
    
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-center bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Students</h5>
                    <h2>{{ $stats['total_students'] }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Instructors</h5>
                    <h2>{{ $stats['total_instructors'] }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center bg-info text-white">
                <div class="card-body">
                    <h5 class="card-title">Courses</h5>
                    <h2>{{ $stats['total_courses'] }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center bg-warning text-white">
                <div class="card-body">
                    <h5 class="card-title">Pending Payments</h5>
                    <h2>{{ $stats['pending_payments'] }}</h2>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Quick Actions</h5>
                </div>
                <div class="card-body">
                    <a href="{{ route('admin.students') }}" class="btn btn-primary me-2">
                        <i class="fas fa-user-graduate"></i> Manage Students
                    </a>
                    <a href="{{ route('admin.instructors') }}" class="btn btn-success me-2">
                        <i class="fas fa-chalkboard-teacher"></i> Manage Instructors
                    </a>
                    <a href="{{ route('admin.payments') }}" class="btn btn-warning me-2">
                        <i class="fas fa-money-bill"></i> Manage Payments
                    </a>
                    <a href="{{ route('admin.enrollments') }}" class="btn btn-info me-2">
                        <i class="fas fa-clipboard-list"></i> Manage Enrollments
                    </a>
                    <a href="{{ route('admin.courses') }}" class="btn btn-secondary">
                        <i class="fas fa-book"></i> View All Courses
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Recent Enrollments</h5>
                </div>
                <div class="card-body">
                    @if($recentEnrollments->count() > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Student</th>
                                        <th>Course</th>
                                        <th>Status</th>
                                        <th>Progress</th>
                                        <th>Enrolled Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentEnrollments as $enrollment)
                                        <tr>
                                            <td>{{ $enrollment->student->name }}</td>
                                            <td>{{ $enrollment->course->title }}</td>
                                            <td>
                                                <span class="badge bg-{{ $enrollment->status === 'active' ? 'success' : 'secondary' }}">
                                                    {{ ucfirst($enrollment->status) }}
                                                </span>
                                            </td>
                                            <td>{{ round($enrollment->progress) }}%</td>
                                            <td>{{ $enrollment->enrolled_at->format('M d, Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-muted">No enrollments yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
