# Laravel Overview

#### Laravel is a PHP framework used for building web applications. It is designed to make the development process easier and more enjoyable by providing a clean and elegant syntax. Laravel follows the MVC (Model-View-Controller) architectural pattern, which helps in separating the logic of an application into three interconnected components.


## Key Features of Laravel

#### **Eloquent ORM**: A powerful Active Record implementation for working with your database.
#### **Routing**: A simple and expressive way to define routes for your application.
#### **Blade Templating Engine**: A lightweight yet powerful templating engine for creating dynamic views.
#### **Authentication**: Built-in features for handling user authentication and authorization.
#### **Artisan Console**: A command-line tool for automating repetitive tasks.
#### **Middleware**: A mechanism for filtering HTTP requests entering your application.
</br>

## Laravel Directory Structure

<pre>When you create a new Laravel project, it comes with a predefined directory structure. </br>Here’s an overview of the main files and folders:

<b>app/ :</b> Contains the core code of your application, including models, controllers, and middleware.

<b>bootstrap/ :</b> Contains the app.php file which bootstraps the framework.

<b>config/ :</b> Contains all of your application’s configuration files.

<b>database/ :</b> Contains your database migrations, seeders, and factories.

<b>public/ :</b> The public directory contains the index.php file, which is the entry point for all requests entering your application.

<b>resources/ :</b> Contains your views (Blade templates), raw assets (SASS, JavaScript, etc.), and language files.

<b>routes/ :</b> Contains all of your route definitions. By default, there are web.php and api.php files.

<b>storage/ :</b> Contains compiled Blade templates, file-based sessions, file caches, and other files generated by the framework.

<b>tests/ :</b> Contains your automated tests.

<b>vendor/ :</b> Contains your Composer dependencies.
</pre>


</br>

## Blade Templating Engine
#### Blade is the simple yet powerful templating engine provided with Laravel. All Blade templates should use the .blade.php file extension and are typically stored in the resources/views directory.

<pre>
<b>Blade provides a variety of directives for common tasks:</b>

@if: Conditional statements.

@foreach: Looping through data.

@include: Including other Blade templates.

@extends and @section: Template inheritance.

{{ $slot }}: Echoing variable 
</pre>

</br>

# Laravel Migration Guide

This guide provides instructions on how to create and run migration files using Laravel's Artisan command-line tool.

## Prerequisites

Ensure you have the following installed:
- PHP
- Composer
- Laravel

## Artisan Commands Overview

To view all Artisan commands related to Laravel, use the following command in your terminal:

```
php artisan list
```

### Creating a Migration File

To create a new migration file, use the make:migration Artisan command. This command will generate a new migration file in the database/migrations directory.

```
php artisan make:migration <migration_file_name>
```

<div style="background-color: white; color: black; padding: 10px; border-left: 6px solid #ccc; transition: all 0.3s ease;">
<strong>Note:</strong> Path to see the created file: /project_path/database/migrations
</div>

### Running Migrations
After creating the migration file, you can run the migration to update your database schema. Use the migrate Artisan command to apply all pending migrations.

```
php artisan migrate
```

### Additional Information
If you need to roll back the last migration operation, you can use the following command:

```
php artisan migrate:rollback
```
To refresh the entire database and run all migrations from scratch, use:

```
php artisan migrate:refresh
```

For more advanced migration options, refer to the [Laravel Migration Documentation](https://laravel.com/docs/11.x/migrations).

</br>

# Eloquent

Eloquent is Laravel's built-in Object-Relational Mapper (ORM) that provides an expressive and easy-to-use syntax for interacting with your database. It simplifies database operations by allowing you to work with your database using models rather than writing raw SQL queries.

### Models:

Models in Eloquent represent tables in your database. Each model corresponds to a table and interacts with it. 

For example, if you have a users table, you would create a User model to interact with this table.
```
php artisan make:model User
```
<pre><strong style="color: orange">NOTE:</strong> This command generates a User model in the <strong>app/Models</strong> directory. </pre>

### Retrieving Data:

Eloquent provides several methods to retrieve data from your database. The most common ones include `all()`, `find()`, `where()`, and `get()`.

```php
// Retrieve all users
$users = User::all();

// Retrieve a user by primary key
$user = User::find(1);

// Retrieve users with a specific condition
$activeUsers = User::where('active', 1)->get();
```

### Inserting Data:

You can insert data into your database using Eloquent's `save()` method or the `create()` method.

```php
// Using save() method
$user = new User;
$user->name = 'John Doe';
$user->email = 'johndoe@example.com';
$user->save();

// Using create() method
User::create([
    'name' => 'Jane Doe',
    'email' => 'janedoe@example.com',
]);
```

<pre><strong style="color: orange">NOTE:</strong> To use the create() method, make sure the fields are listed in the $fillable property of the model to allow mass assignment.
<code>
class User extends Model
{
    protected $fillable = ['name', 'email'];
}
</code>
</pre>

### Updating Data:

Updating data is as simple as retrieving the model, modifying the attributes, and then saving it.

```php
// Updating a user
$user = User::find(1);
$user->email = 'newemail@example.com';
$user->save();

// Using update() method
User::where('id', 1)->update(['email' => 'newemail@example.com']);
```
### Deleting Data:

Eloquent allows you to delete records using the `delete()` method. You can either delete a specific record or multiple records based on a condition.

```php
// Deleting a single user
$user = User::find(1);
$user->delete();

// Deleting multiple users
User::where('active', 0)->delete();
```

### For more detailed information about Eloquent, refer to the official [Laravel Eloquent documentation.](https://laravel.com/docs/11.x/eloquent)

</br>

# Model Factories

Model Factories allow us to create models with fake data, making it easier to test and seed your database. Laravel provides a fluent API for defining factories and comes with built-in support for Faker, a library for generating fake data.

## Creating a model factory

To create a new factory in Laravel, you can use the make:factory Artisan command:

```bash
# This is the most common command, where you specify the factory name and associate it with a model.
php artisan make:factory UserFactory --model=User

# Creating a Factory Without a Model
php artisan make:factory UserFactory

# Creating model with factory
php artisan make:model User -f

# If you want to overwrite an existing factory class, you can use the --force option:
php artisan make:factory UserFactory --model=User --force
```
</br>

# Database Seeding

Database seeding is a crucial part of the development process in Laravel, allowing you to populate your database with initial or test data. This can be particularly useful when setting up a new project, creating test environments, or running automated tests.

Laravel provides a simple and flexible seeding system that allows you to define seed classes, which can then be executed to insert data into your database tables.

## Creating a Seeder Class
To create a new seeder class, use the Artisan command:

```bash
php artisan make:seeder <SeederName>

Example:
php artisan make:seeder UsersTableSeeder
```

This command generates a seeder file in the <strong>database/seeders</strong> directory.

## Defining Seed Data
Once you have your seeder class, you can define the data that will be inserted into the database. Open the created seeder class, and within the run method, define your data:

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@example.com',
            'password' => bcrypt('password'),
        ]);
    }
}
```

## Running Seeders
To run your seeder, use the following Artisan command:

```bash
php artisan db:seed --class=<SeederName>

Example:
php artisan db:seed --class=UsersTableSeeder
```

## Running All Seeders
If you have multiple seeders and want to run them all at once, Laravel provides a way to register all your seeders in the DatabaseSeeder class.

### Registering Seeders
In the database/seeders/DatabaseSeeder.php file, call the seeders you want to execute:

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            // Other seeders can be added here
        ]);
    }
}
```

To run all registered seeders, use the following command:
```bash
php artisan db:seed
```

### Refreshing the Database with Seeders
If you need to reset your database and seed it from scratch, Laravel provides a convenient way to do this:

```bash
php artisan migrate:refresh --seed
```

This command will rollback all migrations, re-run them, and then execute the seeders.


</br>

# Routes Tips

- Route controller
- Route groups
- Route view
- Route resources

> Watch this video to get tips for routes : [Video](https://laracasts.com/series/30-days-to-learn-laravel-11/episodes/19)


</br>

# Authorization Tips

- Gate
- Policy

> Watch this video to get tips for routes : [Video](https://laracasts.com/series/30-days-to-learn-laravel-11/episodes/23)