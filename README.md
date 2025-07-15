# Laravel MongoDB Starter Kit

A Laravel application pre-configured with MongoDB integration, complete with authentication system and user management functionality. This starter kit provides all the necessary configurations and components to quickly build Laravel applications with MongoDB as the database.

## Features

- **Laravel 12** - Latest version of the Laravel framework
- **MongoDB Integration** - Seamless MongoDB database connection using `mongodb/laravel-mongodb`
- **Authentication System** - Complete auth flow with Laravel Breeze
- **User Management** - CRUD operations for user administration
- **Email Verification** - Built-in email verification system
- **Password Reset** - Secure password reset functionality
- **Profile Management** - User profile editing capabilities
- **Pre-configured Models & Controllers** - Ready-to-use User model and authentication controllers

## Requirements

- PHP 8.2 or higher
- MongoDB extension (`ext-mongodb`)
- MongoDB server (local or cloud)
- Composer

## Installation

Create a new Laravel project using this starter kit:

```bash
composer create-project mongodb-developer/laravel-with-mongodb-starter-kit my-project
cd my-project
```

## Pre-configured Components

This starter kit comes with the following pre-configured components:

### 1. Database Configuration

The MongoDB connection is already configured in `config/database.php`:

```php
'mongodb' => [
    'driver' => 'mongodb',
    'dsn' => env('MONGODB_URI', 'mongodb://localhost:27017'),
    'database' => env('MONGODB_DATABASE', 'laravel_app'),
],
```

### 2. Environment Variables

The `.env.example` file includes MongoDB-specific configuration:

```env
###> mongodb/laravel-mongodb ###
# DB_CONNECTION=mongodb
# Format described at https://www.mongodb.com/docs/php-library/current/connect/connection-options/
# MONGODB_URI="mongodb://username:password@localhost:27017/?authSource=auth-db"
# MONGODB_URI="mongodb+srv://username:password@YOUR_CLUSTER_NAME.YOUR_HASH.mongodb.net/?retryWrites=true&w=majority"
# MONGODB_DATABASE="test"
```

### 3. User Model

Pre-configured User model (`app/Models/User.php`) with MongoDB support:

```php
<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Notifications\Notifiable;

class User extends Model implements AuthenticatableContract
{
    use Notifiable, Authenticatable;

    protected $connection = 'mongodb'; 
    protected $collection = 'users';   

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
```

### 4. Authentication Controllers

Complete set of authentication controllers in `app/Http/Controllers/Auth/`:

- `AuthenticatedSessionController.php` - Login/logout functionality
- `RegisteredUserController.php` - User registration
- `PasswordResetLinkController.php` - Password reset links
- `NewPasswordController.php` - Password reset handling
- `EmailVerificationPromptController.php` - Email verification
- `ConfirmablePasswordController.php` - Password confirmation
- And more...

### 5. User Management Controller

`UserController.php` with full CRUD operations:

```php
class UserController extends Controller
{
    public function index()        // List all users
    public function edit(User $user)     // Show edit form
    public function update(Request $request, User $user)  // Save changes
    public function destroy(User $user)  // Delete user
}
```

### 6. Profile Management

`ProfileController.php` for user profile management:

```php
class ProfileController extends Controller
{
    public function edit(Request $request)     // Display profile form
    public function update(ProfileUpdateRequest $request)  // Update profile
    public function destroy(Request $request)  // Delete account
}
```

## Setup Instructions

### 1. Generate Application Key

```bash
php artisan key:generate
```

### 2. Configure MongoDB Connection

Update your `.env` file with your MongoDB connection details:

**For Local MongoDB:**
```env
DB_CONNECTION=mongodb
MONGODB_URI=mongodb://localhost:27017
MONGODB_DATABASE=your_database_name
```

**For MongoDB Atlas:**
```env
DB_CONNECTION=mongodb
MONGODB_URI=mongodb+srv://username:password@YOUR_CLUSTER_NAME.YOUR_HASH.mongodb.net/?retryWrites=true&w=majority
MONGODB_DATABASE=your_database_name
```

### 3. Start the Development Server

```bash
php artisan serve
```

## Available Routes

### Authentication Routes
- `GET /login` - Login page
- `POST /login` - Process login
- `GET /register` - Registration page
- `POST /register` - Process registration
- `POST /logout` - Logout user
- `GET /forgot-password` - Password reset request
- `POST /forgot-password` - Send reset link
- `GET /reset-password/{token}` - Password reset form
- `POST /reset-password` - Process password reset

### User Management Routes
- `GET /users` - List all users
- `GET /users/{user}/edit` - Edit user form
- `PUT /users/{user}` - Update user
- `DELETE /users/{user}` - Delete user

### Profile Routes
- `GET /profile` - View profile
- `PATCH /profile` - Update profile
- `DELETE /profile` - Delete account

## Features Overview

### 🔐 Authentication System
Complete authentication flow with:
- User registration with email verification
- Secure login with rate limiting
- Password reset functionality
- Remember me functionality
- Session management

### 👥 User Management
Administrative interface for:
- Viewing all users
- Editing user information
- Deleting users

### 📧 Email Features
- Email verification for new registrations
- Password reset emails
- Configurable mail settings

### 🛡️ Security Features
- Password hashing with bcrypt
- CSRF protection
- Rate limiting on login attempts
- Secure session handling
- Input validation

## Development Commands

### Run Tests
```bash
php artisan test
```

### Code Formatting
```bash
./vendor/bin/pint
```

## MongoDB Specific Features

### Document Structure
Users are stored as MongoDB documents with flexible schema support:

```json
{
  "_id": ObjectId("..."),
  "name": "John Doe",
  "email": "john@example.com",
  "password": "$2y$12$...",
  "email_verified_at": ISODate("..."),
  "created_at": ISODate("..."),
  "updated_at": ISODate("...")
}
```

### Indexing
Consider adding indexes for better performance:

```javascript
// In MongoDB shell
db.users.createIndex({ "email": 1 }, { unique: true })
db.users.createIndex({ "created_at": -1 })
```

## Customization

### Adding New Fields
To add fields to the User model:

1. Update the `$fillable` array in `app/Models/User.php`
2. Update validation rules in request classes
3. Update forms and views accordingly

### Custom Authentication
The authentication system can be customized by modifying controllers in `app/Http/Controllers/Auth/`

## What's Included

This starter kit provides:

✅ **Database Configuration** - MongoDB connection ready to use  
✅ **User Model** - MongoDB-compatible User model with authentication  
✅ **Authentication Controllers** - Complete auth flow (login, register, password reset, etc.)  
✅ **User Management** - CRUD operations for user administration  
✅ **Profile Management** - User profile editing capabilities  
✅ **Form Requests** - Validation classes for user input  
✅ **Routes** - Pre-defined routes for all functionality  
✅ **Security** - Built-in security features and rate limiting  

## Troubleshooting

### MongoDB Connection Issues
1. Ensure MongoDB is running
2. Check connection string in `.env`
3. Verify MongoDB extension is installed: `php -m | grep mongodb`

### Permission Issues
```bash
chmod -R 775 storage bootstrap/cache
```

### Clear Cache
```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
```

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Add tests if applicable
5. Submit a pull request

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Support

For issues and questions:
- Check the [Issues](https://github.com/aasawariMongoDB/mongodb-starter-kit-for-laravel/issues) page
- Create a new issue if needed
- Contact: aasawari.sahasrabuddhe@mongodb.com

## Acknowledgments

- Laravel Framework
- MongoDB Laravel Integration
- Laravel Breeze for authentication scaffolding

---
