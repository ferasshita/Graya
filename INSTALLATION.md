# Graya 3.0 - Installation and Setup Guide

## Quick Start Guide

This document provides detailed instructions for setting up Graya 3.0 on your local machine or server.

## Prerequisites

Before you begin, ensure you have the following installed:

- **PHP**: Version 8.2 or higher
- **Composer**: Latest version
- **Database**: MySQL 5.7+ or MariaDB 10.3+
- **Web Server**: Apache or Nginx (optional for development)
- **Git**: For cloning the repository

## Step-by-Step Installation

### 1. Clone the Repository

```bash
git clone https://github.com/ferasshita/Graya.git
cd Graya
```

### 2. Install PHP Dependencies

```bash
composer install
```

If you encounter any errors, make sure your PHP version is 8.2 or higher:
```bash
php --version
```

### 3. Environment Configuration

Copy the example environment file:
```bash
cp .env.example .env
```

Generate an application key:
```bash
php artisan key:generate
```

### 4. Database Setup

Edit your `.env` file with your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=graya
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

Create the database:
```bash
# MySQL Command Line
mysql -u root -p
CREATE DATABASE graya;
EXIT;
```

### 5. Run Migrations

Execute the database migrations:
```bash
php artisan migrate
```

### 6. Seed Sample Data (Optional)

To populate the database with sample data including a default admin user:
```bash
php artisan db:seed
```

This will create:
- **Admin User**: admin@graya.com / admin123
- **Instructor User**: instructor@graya.com / instructor123
- **Student User**: student@graya.com / student123
- A sample course with modules and quiz

### 7. Storage Link

Create a symbolic link for file storage:
```bash
php artisan storage:link
```

### 8. Set Permissions

Make sure the storage and bootstrap/cache directories are writable:
```bash
chmod -R 775 storage bootstrap/cache
```

### 9. Start the Development Server

```bash
php artisan serve
```

The application will be available at `http://localhost:8000`

## Production Deployment

### Additional Steps for Production

1. **Set environment to production**:
   ```env
   APP_ENV=production
   APP_DEBUG=false
   ```

2. **Optimize the application**:
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

3. **Set up a queue worker** (optional):
   ```bash
   php artisan queue:work
   ```

4. **Configure your web server** (Apache/Nginx) to point to the `public` directory

### Apache Configuration Example

```apache
<VirtualHost *:80>
    ServerName graya.local
    DocumentRoot /path/to/Graya/public

    <Directory /path/to/Graya/public>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

### Nginx Configuration Example

```nginx
server {
    listen 80;
    server_name graya.local;
    root /path/to/Graya/public;

    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```

## First Time Setup

### Creating Your First Admin User

If you didn't run the seeder, you'll need to manually create an admin user:

1. Register a new account through the web interface
2. Access your database and update the user's role:
   ```sql
   UPDATE users SET role = 'admin' WHERE email = 'your@email.com';
   ```

## User Roles

Graya has four user roles:

1. **Guest**: Can browse courses and register
2. **Student**: Can enroll in courses, track progress, take quizzes, and chat with instructors
3. **Instructor**: Can create courses, add modules, track student progress, and chat with students
4. **Admin**: Full system access to manage users, courses, payments, and enrollments

## Features Overview

### For Students
- Browse and enroll in courses
- Track learning progress
- Access course materials (videos, PDFs, text)
- Take quizzes and view results
- Chat with course instructors

### For Instructors
- Create and manage courses
- Add modules (video, PDF, text content)
- Create quizzes with multiple-choice questions
- Track student enrollments and progress
- Chat with enrolled students
- Set course pricing (free or paid)

### For Administrators
- Manage all users (students, instructors)
- Oversee all courses and enrollments
- Process and track payments
- View platform statistics
- Change user roles

## Troubleshooting

### Common Issues

**Issue**: "Class not found" errors
- **Solution**: Run `composer dump-autoload`

**Issue**: "Permission denied" errors
- **Solution**: Check directory permissions on `storage` and `bootstrap/cache`

**Issue**: Database connection errors
- **Solution**: Verify database credentials in `.env` file

**Issue**: "No application encryption key has been specified"
- **Solution**: Run `php artisan key:generate`

## Support

For issues, questions, or contributions:
- GitHub Issues: https://github.com/ferasshita/Graya/issues
- Email: shitaferas195@gmail.com

## License

Graya is open-source software licensed under the MIT license.
