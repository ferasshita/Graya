@extends('layouts.app')

@section('title', 'About Graya')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4">About Graya E-Learning Platform</h1>
            
            <div class="card mb-4">
                <div class="card-body">
                    <h3>Welcome to Graya 3.0</h3>
                    <p class="lead">Graya is an open-source e-learning platform designed to connect students with quality education.</p>
                    
                    <h4 class="mt-4">Our Features</h4>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="fas fa-check text-success"></i> Browse and enroll in courses</li>
                        <li class="list-group-item"><i class="fas fa-check text-success"></i> Track your learning progress</li>
                        <li class="list-group-item"><i class="fas fa-check text-success"></i> Take quizzes and assessments</li>
                        <li class="list-group-item"><i class="fas fa-check text-success"></i> Chat with instructors</li>
                        <li class="list-group-item"><i class="fas fa-check text-success"></i> Access video, PDF, and text materials</li>
                        <li class="list-group-item"><i class="fas fa-check text-success"></i> Flexible payment options (cash or free courses)</li>
                    </ul>
                    
                    <h4 class="mt-4">For Instructors</h4>
                    <p>Create and manage your courses, track student progress, and engage with learners through our built-in chat system.</p>
                    
                    <h4 class="mt-4">Technology</h4>
                    <p>Built with Laravel framework for robust, secure, and scalable performance.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
