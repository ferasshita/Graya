<!-- Project Title -->
<h1 align="center">Graya 3.0 - Laravel E-Learning Platform</h1>

<!-- Project Description -->
<p align="center">
A modern, open-source E-Learning platform built with Laravel. Create courses, engage students, and manage your learning community with ease.
</p>

<!-- Badges (Optional) -->
<p align="center">
  <img src="https://img.shields.io/badge/version-v3.0-blue.svg" alt="Version">
  <img src="https://img.shields.io/badge/laravel-11.x-red.svg" alt="Laravel">
  <img src="https://img.shields.io/badge/php-8.2+-purple.svg" alt="PHP">
  <img src="https://img.shields.io/badge/license-MIT-green.svg" alt="License">
</p>

<!-- Table of Contents -->
## Table of Contents
- [Features](#features)
- [Installation](#installation)
- [Documentation](#documentation)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)
- [Contact](#contact-me)

<!-- Features -->
## Features

### For Students
- Browse and enroll in courses (free or paid)
- Track learning progress with visual indicators
- Access course materials (videos, PDFs, text content)
- Take quizzes and assessments
- Chat with instructors
- View course completion status

### For Instructors
- Create and manage courses
- Add modules with different content types (video, PDF, text)
- Track student progress and enrollments
- Create quizzes with multiple-choice questions
- Chat with enrolled students
- Manage course pricing (free or paid)

### For Administrators
- Manage all users (students, instructors, admins)
- Oversee all courses and enrollments
- Process and track payments (cash/free)
- View platform statistics and analytics
- Manage user roles and permissions

### Technical Features
- Built with Laravel 11 framework
- Role-based access control (Student, Instructor, Admin, Guest)
- Responsive Bootstrap 5 UI
- Secure authentication system
- File upload management for course materials
- Progress tracking system
- Real-time chat functionality

<!-- Installation -->
## Installation

### Requirements
- PHP 8.2 or higher
- Composer
- MySQL/MariaDB database
- Node.js and NPM (optional, for frontend assets)

### Installation Steps

1. **Clone the repository**
   ```bash
   git clone https://github.com/ferasshita/Graya.git
   cd Graya
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Configure environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Update database configuration**
   Edit `.env` file and set your database credentials:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=graya
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Create database**
   Create a MySQL database named `graya` (or whatever you specified in .env)

6. **Run migrations**
   ```bash
   php artisan migrate
   ```

7. **Create storage link**
   ```bash
   php artisan storage:link
   ```

8. **Start the development server**
   ```bash
   php artisan serve
   ```

9. **Access the application**
   Open your browser and visit `http://localhost:8000`

### First Time Setup
- The first user to register will need to be manually set as admin in the database
- Update the `role` column in the `users` table to `admin` for your user
- You can then promote other users through the admin panel

## Documentation

For detailed information about the implementation, see:
- **[INSTALLATION.md](INSTALLATION.md)** - Complete installation guide
- **[IMPLEMENTATION.md](IMPLEMENTATION.md)** - Technical implementation details
- **[API.md](API.md)** - API documentation and extension guide

### Quick Links
- Database schema and migrations: `database/migrations/`
- Sample data seeder: `database/seeders/DatabaseSeeder.php`
- Routes: `routes/web.php`
- Models: `app/Models/`
- Controllers: `app/Http/Controllers/`

### Default Credentials (After Seeding)
```
Admin:      admin@graya.com / admin123
Instructor: instructor@graya.com / instructor123
Student:    student@graya.com / student123
```

<!-- Usage -->

<!-- Contributing -->
## Contributing

Thank you for considering contributing to this project! Contributions are welcome and greatly appreciated. To ensure a smooth collaboration, please follow these guidelines:

1. Fork the repository and create your branch from `main`.
2. Make sure your code follows the project's coding style and conventions.
3. Provide clear and concise commit messages.
4. Test your changes thoroughly before submitting a pull request.
5. Include relevant documentation and update the README, if necessary.
6. Be respectful and considerate towards others when participating in discussions or addressing issues.

### Opening Issues
If you encounter any bugs, have questions, or have a feature request, please open an issue on the GitHub repository. When opening an issue, provide as much detail as possible, including steps to reproduce the issue or a clear description of the feature request.

### Pull Requests
To contribute code changes:

1. Ensure that your changes are compatible with the project's license (see [LICENSE](LICENSE)).
2. Fork the repository and create a new branch for your changes.
3. Make your changes, ensuring that your code adheres to the project's coding style and conventions.
4. Test your changes to ensure they function as intended.
5. Commit your changes with a descriptive and concise commit message.
6. Push your changes to your forked repository.
7. Submit a pull request, providing a clear description of the changes made and why they are beneficial.

Please note that all contributions will be reviewed, and constructive feedback may be provided to help improve the quality and maintainability of the project.

Thank you for your contributions and support in making this project better!

<!-- License -->
## License
This project is licensed under the [MIT License](LICENSE).

<!-- Contact Me -->
## Contact Me

If you have any questions, suggestions, or feedback regarding this project, I would be happy to hear from you. You can reach me through the following channels:

- **Email**: [Email](mailto:shitaferas195@gmail.com)
- **linkedIn**: [@Feras Shita](https://linkedin.com/in/feras-shita-988395258)
- **GitHub**: [ferasshita](https://github.com/YourGitHubUsername)

Feel free to reach out with any inquiries or discussions related to the project. I will do my best to respond in a timely manner.

<!-- Footer -->
<p align="center">
  <sub>Made with ❤️ by Feras</sub>
</p>


