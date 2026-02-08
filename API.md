# Graya 3.0 - API Documentation

## Overview

Graya provides a REST API for integration with external systems. The API uses standard HTTP methods and returns JSON responses.

## Base URL

```
http://your-domain.com/api
```

## Authentication

Currently, the API uses session-based authentication. For API access, you'll need to:

1. Login via the web interface
2. Use the session cookie for subsequent API requests

## Endpoints

### Health Check

Check if the API is running:

```
GET /api/health
```

**Response:**
```json
{
  "status": "ok"
}
```

## Extending the API

To add new API endpoints, edit `routes/api.php` and create corresponding controllers in `app/Http/Controllers/Api`.

### Example API Controller

```php
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseApiController extends Controller
{
    public function index()
    {
        $courses = Course::where('status', 'published')
            ->with('instructor')
            ->paginate(20);
        
        return response()->json($courses);
    }
    
    public function show($id)
    {
        $course = Course::with(['instructor', 'modules', 'quizzes'])
            ->findOrFail($id);
        
        return response()->json($course);
    }
}
```

### Adding API Routes

In `routes/api.php`:

```php
Route::get('/courses', [CourseApiController::class, 'index']);
Route::get('/courses/{id}', [CourseApiController::class, 'show']);
```

## Rate Limiting

To add rate limiting to your API:

1. Update `bootstrap/app.php` to include rate limiting middleware
2. Configure limits in your middleware

## Future Enhancements

- Token-based authentication (Laravel Sanctum)
- API versioning
- Comprehensive CRUD operations for all resources
- Webhook support
- GraphQL support

For more information, see the Laravel documentation on API development.
