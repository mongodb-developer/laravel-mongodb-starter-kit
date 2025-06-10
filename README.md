# Laravel with MongoDB Starter Kit

This starter kit provides a ready-to-use Laravel setup configured to use MongoDB as the primary database. It simplifies the initial configuration so you can get started with building Laravel apps using MongoDB right away.

---

##  Prerequisites

Before using this starter kit, make sure the following dependencies are installed on your machine:

### 1. Install PHP

Make sure PHP is installed (version 8.1 or higher recommended).

```bash
php -v
```

If not installed, follow instructions on [php.net](https://www.php.net/manual/en/install.php) to install PHP on your system.

### 2. Install MongoDB Extension for PHP

Use PECL to install the MongoDB driver:

```bash
pecl install mongodb
```

> ✅ You may need to enable the extension in your `php.ini` file:

```ini
extension=mongodb.so
```

For more details, refer to the [official MongoDB PHP driver documentation](https://www.php.net/manual/en/mongodb.installation.pecl.php).

---

##  Create a New Laravel Project Using the Starter Kit

Run the following command to create a new Laravel project with MongoDB support:

```bash
laravel new your-app-name --using=aasawari.sahasrabuddhe/laravel-with-mongodb-starter-kit
```

This command will scaffold a Laravel project with MongoDB configured out of the box.

---

## ⚙️ Configuration Details

### `config/database.php`

The starter kit sets the default database connection to MongoDB and adds a connection config block:

```php
'default' => env('DB_CONNECTION', 'mongodb'),

'mongodb' => [
    'driver'   => 'mongodb',
    'dsn'      => env('MONGODB_URI', 'mongodb://localhost:27017'),
    'database' => env('MONGODB_DATABASE', 'laravel_app'),
],
```

### `.env.example`

The `.env.example` file includes sample environment variables for MongoDB:

```env
###> mongodb/laravel-mongodb ###
# DB_CONNECTION=mongodb
# Format described at https://www.mongodb.com/docs/php-library/current/connect/connection-options/
# MONGODB_URI="mongodb://username:password@localhost:27017/?authSource=auth-db"
# MONGODB_URI="mongodb+srv://username:password@YOUR_CLUSTER_NAME.YOUR_HASH.mongodb.net/?retryWrites=true&w=majority"
# MONGODB_DATABASE="test"
###< mongodb/laravel-mongodb ###
```

You can update these values in your `.env` file to point to your local or cloud MongoDB instance.

---

## ✅ You're All Set!

After setting the correct MongoDB credentials in your `.env`, you can now run the Laravel app:

```bash
php artisan serve
```

Start building your Laravel + MongoDB-powered application!

---
