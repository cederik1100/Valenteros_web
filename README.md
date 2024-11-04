# Login To-Do List App - CodeIgniter 4

This is a login-protected To-Do List application built with CodeIgniter 4 (CI4). Users can register, log in, and manage their personal to-do lists. The app includes CRUD functionality and basic authentication.

## Features
- User registration and login
- Secure password hashing
- CRUD (Create, Read, Update, Delete) operations for tasks
- Responsive design (optional: mention framework if used)

## Prerequisites
- **PHP** >= 7.3
- **Composer** installed
- **MySQL** or **SQLite** database

## Getting Started

### Clone the Repository
```bash
git clone https://github.com/yourusername/todolist-ci4.git
cd todolist-ci4
```

# Make sure you have Composer installed, then run:
composer install

# Copy the .env.example file to create a new .env file
cp env.example .env

# Open the .env file and set up your database connection:
database.default.hostname = localhost
database.default.database = your_database_name
database.default.username = your_username
database.default.password = your_password
database.default.DBDriver = MySQL or SQLite (set accordingly)

# Open the .env file and set up your database connection:
php spark migrate

# Start the development server with:
php spark serve

# The application will be available at http://localhost:8080.

Usage
Register a new account.
Log in with your credentials.
Create, view, update, or delete tasks from your to-do list.
Folder Structure
app/Controllers: Contains the main application controllers (Login, Register, ToDo).
app/Models: Contains database models for Users and Tasks.
app/Views: Contains the views for pages like login, registration, and the task list.




