@extends('layouts.app')

@section('title', 'Welcome to Graya')

@section('content')
<div class="container">
    <!-- Hero Section -->
    <div class="jumbotron bg-light p-5 rounded mb-5">
        <h1 class="display-4">Welcome to Graya 3.0</h1>
        <p class="lead">Your gateway to knowledge. Learn from the best instructors and achieve your goals.</p>
        @guest
            <hr class="my-4">
            <p>Join our community today and start learning!</p>
            <a class="btn btn-primary btn-lg" href="{{ route('register') }}" role="button">Get Started</a>
            <a class="btn btn-outline-primary btn-lg" href="{{ route('login') }}" role="button">Sign In</a>
        @endguest
    </div>

    <!-- Courses Section -->
    <h2 class="mb-4">Available Courses</h2>
    
    @if($courses->count() > 0)
        <div class="row">
            @foreach($courses as $course)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if($course->thumbnail)
                            <img src="{{ asset('storage/' . $course->thumbnail) }}" class="card-img-top" alt="{{ $course->title }}">
                        @else
                            <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="fas fa-book fa-3x text-white"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $course->title }}</h5>
                            <p class="card-text">{{ Str::limit($course->description, 100) }}</p>
                            <p class="text-muted">
                                <i class="fas fa-user"></i> {{ $course->instructor->name }}
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                @if($course->is_free)
                                    <span class="badge bg-success">Free</span>
                                @else
                                    <span class="badge bg-primary">${{ $course->price }}</span>
                                @endif
                                <a href="{{ route('course.details', $course->id) }}" class="btn btn-sm btn-outline-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $courses->links() }}
        </div>
    @else
        <div class="alert alert-info">
            <i class="fas fa-info-circle"></i> No courses available at the moment. Check back soon!
        </div>
    @endif
</div>
@endsection
