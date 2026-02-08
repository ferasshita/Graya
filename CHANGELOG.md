# Changelog

All notable changes to the Graya project will be documented in this file.

## [3.0.0] - 2026-02-08

### Major Update - Complete Laravel Migration 🚀

This is a complete rewrite of Graya, migrating from basic PHP to Laravel 11 framework with comprehensive LMS features.

### Added

#### Framework & Architecture
- Laravel 11.x framework integration
- Modern MVC architecture
- Eloquent ORM for database operations
- Blade templating engine
- Comprehensive routing system
- Middleware-based authorization

#### User Management
- Four-tier role system (Guest, Student, Instructor, Admin)
- Role-based access control (RBAC)
- Session-based authentication
- User registration and login
- Role management via admin panel

#### Course System
- Complete course management for instructors
- Multiple content types (video, PDF, text)
- Modular course structure
- Course thumbnails and descriptions
- Course status management (draft, published, archived)
- Flexible pricing (free or paid courses)

#### Learning Features
- Student course enrollment
- Module-based content delivery
- Progress tracking per module
- Course completion percentage
- Enrollment history and status

#### Assessment System
- Quiz creation and management
- Multiple-choice questions
- Configurable passing scores
- Timed quizzes
- Automatic grading
- Quiz attempt history
- Detailed result displays

#### Communication
- Built-in chat system
- Instructor-student messaging
- Message read receipts
- Course-specific conversations

#### Payment System
- Unique cash-based payment workflow
- Free course option
- Admin payment approval system
- Payment status tracking
- Payment history

#### Admin Panel
- User management (students and instructors)
- Role promotion/demotion
- Payment approval workflow
- Enrollment oversight
- Platform statistics dashboard
- Course management overview

#### UI/UX
- Bootstrap 5 responsive design
- Mobile-friendly interface
- Font Awesome icons
- Role-specific dashboards
- Clean, modern design
- Intuitive navigation

#### Documentation
- Comprehensive README
- Detailed INSTALLATION.md guide
- API documentation
- Implementation summary
- Automated installation script

#### Security
- CSRF protection
- Password hashing with bcrypt
- SQL injection protection via Eloquent
- XSS protection
- Authorization middleware
- Secure session management

### Changed
- Complete migration from procedural PHP to Laravel framework
- Database structure modernized with migrations
- Improved security with Laravel's built-in protection
- Enhanced code organization with MVC pattern
- Better separation of concerns

### Removed
- Old procedural PHP structure
- Direct database queries
- Legacy authentication system
- Old CSS/JS assets
- Obsolete configuration files

### Database Schema
- `users` - User accounts with roles
- `courses` - Course information
- `modules` - Course content modules
- `enrollments` - Student-course relationships
- `progress` - Module completion tracking
- `quizzes` - Quiz definitions
- `quiz_questions` - Quiz questions and answers
- `quiz_attempts` - Student quiz submissions
- `chat_messages` - Messaging system
- `payments` - Payment tracking
- `sessions` - Session management
- `cache` - Application cache
- `jobs` - Queue management

### Technical Stack
- PHP 8.2+
- Laravel 11.x
- MySQL/MariaDB
- Bootstrap 5
- Font Awesome 6
- Composer for dependency management

### Installation
- Automated installation script (install.sh)
- Comprehensive setup guide
- Database seeder with sample data
- Default admin account creation

---

## [2.0.0] - 2023

### Features from Previous Version
- Basic E-learning functionality
- Admin panel
- Arabic/English support
- Subject and class management
- Chapter-based content
- PDF, video, and link support
- Basic chat functionality

---

## Notes

- Version 3.0.0 represents a complete architectural overhaul
- All features from 2.0 have been reimplemented and enhanced
- System is now production-ready with modern standards
- Designed for scalability and maintainability
- Comprehensive documentation for developers

For migration guidance from v2.0 to v3.0, please refer to INSTALLATION.md as this is essentially a new application.
