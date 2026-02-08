<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create default admin user
        \App\Models\User::create([
            'name' => 'Admin User',
            'email' => 'admin@graya.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);

        // Create sample instructor
        $instructor = \App\Models\User::create([
            'name' => 'John Instructor',
            'email' => 'instructor@graya.com',
            'password' => bcrypt('instructor123'),
            'role' => 'instructor',
        ]);

        // Create sample student
        \App\Models\User::create([
            'name' => 'Jane Student',
            'email' => 'student@graya.com',
            'password' => bcrypt('student123'),
            'role' => 'student',
        ]);

        // Create a sample course
        $course = \App\Models\Course::create([
            'title' => 'Introduction to Web Development',
            'description' => 'Learn the basics of web development including HTML, CSS, and JavaScript.',
            'instructor_id' => $instructor->id,
            'price' => 0,
            'is_free' => true,
            'status' => 'published',
        ]);

        // Create sample modules
        \App\Models\Module::create([
            'course_id' => $course->id,
            'title' => 'Getting Started with HTML',
            'description' => 'Learn the fundamentals of HTML markup',
            'type' => 'text',
            'content' => 'HTML is the standard markup language for creating web pages.',
            'order' => 1,
            'duration' => 30,
        ]);

        \App\Models\Module::create([
            'course_id' => $course->id,
            'title' => 'CSS Basics',
            'description' => 'Introduction to styling with CSS',
            'type' => 'text',
            'content' => 'CSS is used to style and layout web pages.',
            'order' => 2,
            'duration' => 45,
        ]);

        // Create a sample quiz
        $quiz = \App\Models\Quiz::create([
            'course_id' => $course->id,
            'title' => 'HTML & CSS Quiz',
            'description' => 'Test your knowledge of HTML and CSS basics',
            'passing_score' => 70,
            'duration_minutes' => 15,
        ]);

        // Create sample quiz questions
        \App\Models\QuizQuestion::create([
            'quiz_id' => $quiz->id,
            'question_text' => 'What does HTML stand for?',
            'options' => [
                'A' => 'Hyper Text Markup Language',
                'B' => 'High Tech Modern Language',
                'C' => 'Home Tool Markup Language',
                'D' => 'Hyperlinks and Text Markup Language'
            ],
            'correct_answer' => 'A',
            'points' => 10,
        ]);

        \App\Models\QuizQuestion::create([
            'quiz_id' => $quiz->id,
            'question_text' => 'Which CSS property is used to change text color?',
            'options' => [
                'A' => 'text-color',
                'B' => 'font-color',
                'C' => 'color',
                'D' => 'text-style'
            ],
            'correct_answer' => 'C',
            'points' => 10,
        ]);
    }
}
