A simple PHP + MySQL CRUD system with an admin-only login. This system allows you to manage student records (Add, Edit, Delete, View) with a secure session-based login.

🚀 Features
🔐 Admin-only login system
📋 Add student records
✏ Edit student information
🗑 Delete student records
📊 View all students in a table
🚪 Logout system
🎨 Modern Blue Whale UI design
🔒 Session protection (no login = no access)
🧑‍💻 Default Login
Username: admin
Password: admin123
📁 Project Structure
Student Record System/
│
├── config.php
├── login.php
├── logout.php
├── index.php
├── add.php
├── edit.php
├── delete.php
└── create_admin.php (optional setup file)
⚙️ Setup Instructions
1. Install Requirements
XAMPP / Laragon
PHP 7+ or higher
MySQL
2. Import Database

Create database:

CREATE DATABASE school_db;

Create table:

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    course VARCHAR(100)
);
3. Create Admin User

Run this file once:

create_admin.php

Or manually insert:

username: admin
password: admin123
4. Run Project

Open in browser:

http://localhost/Student Record System/login.php
🔐 Security Features
Session-based authentication
Password protection for admin login
Protected index page (no login = redirect)
Secure logout (session destroy)
🎨 UI Theme
Blue Whale Ocean Theme 🌊🐋
Glassmorphism design
Responsive form layout
Modern button hover effects
📌 Future Improvements
🔍 Search student feature
📊 Dashboard analytics (total students)
👥 Role-based access (admin / user)
📱 Mobile responsive upgrade
🧠 Better password encryption system
👨‍💻 Developer

Created for school project purposes
Built using:

PHP
MySQL
HTML
CSS
