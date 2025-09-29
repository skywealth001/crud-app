 ## CRUD Application

A simple CRUD (Create, Read, Update, Delete) web application built with PHP, MySQL, HTML, CSS, and JavaScript.  
This project demonstrates the fundamentals of web development, including user authentication, database operations, profile management, and responsive UI/UX design.

---

## 🚀 Features

- *User Authentication*
  - User registration with username, email, full name, and password confirmation
  - Secure password hashing
  - Login & logout functionality with session management
  - "Remember Me" option for persistent login
  - Password reset via email or reset page

- *Dashboard*
  - Accessible only to logged-in users
  - Displays user profile details & quick statistics
  - Task/item summary with navigation to CRUD operations

- *Profile Management*
  - View and edit profile information
  - Change password securely
  - Form validation with success/error messages

- *CRUD Operations*
  - Add new tasks/items
  - View all tasks with details
  - Edit and update existing tasks
  - Delete tasks with confirmation
  - Input validation & error handling

- *UI/UX Enhancements*
  - Responsive design (desktop & mobile)
  - Clean, intuitive interface
  - Dark/Light theme toggle
  - JavaScript-enhanced interactions (form validation, dynamic updates)

---

## 🛠️ Technologies Used

- *Frontend:* HTML, CSS, JavaScript  
- *Backend:* PHP  
- *Database:* MySQL  
- *Other: Session management, Password hashing (PHP password_hash)

---

## 📂 Project Structure

```
CRUD-APP/
├── assets/
│   ├── css/
│   │   └── style.css          
│   └── js/
│       ├── auth.js            
│       ├── dashboard.js       
│       ├── script.js          
│       ├── test.js         
│       └── theme.js           
├── config/
│   └── config.php         
├── includes/
│   └── footer.php    
├── pages/
│   ├── dashboard.php          
│   ├── edit.php               
│   ├── login.php  
│   ├── logout.php             
│   ├── profile.php            
│   ├── register.php          
│   └── reset-password.php 
├── screenshots/     
├── database.sql     
└── index.php
└── README.md
```

---

## ⚙️ Setup Instructions

*Clone the repository*
(in your git bash run:)
git clone https://github.com/skywealth001/crud-app.git (to clone repository to your local machine)

  ## Database Setup
-Import database.sql into your MySQL server

-Update database credentials in config/config.php

-Start Local Server
-Place the project in your server root:

-htdocs for XAMPP or wamp

Run Apache and MySQL services

Access the application at:
👉 http://localhost/crud-app/

## 📸 Screenshots
The following screenshots are available in the screenshots/ folder:

-Homepage & Authentication

-Dashboard

-Profile Management

-CRUD Operations

-Dark/Light Mode

## 🎯 Learning Objectives Achieved
-User Authentication - Secure login/registration system

-Database Integration - MySQL database with proper configuration

-CRUD Operations - Complete Create, Read, Update, Delete functionality

-Responsive Design - Interface with dark/light mode toggle

-Form Validation - Robust validation & error handling

-Code Organization - Structured MVC-like architecture


