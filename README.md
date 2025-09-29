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
   ``bash (on your git)
git clone https://github.com/skywealth001/crud-app.git (to clone repository to your local machine)

   Set up the database
	•	Import database.sql into your MySQL server
	•	Update database credentials in config/config.php
	3.	Start local server
	•	Place the project in your server root (htdocs for XAMPP, WAMP, etc.)
	•	Run Apache and MySQL
	4.	Access the app
	•	Open browser and go to:
    http://localhost/crud-app/

    ## 📸 Screenshots
To provide a better understanding of the application, several screenshots have been added in the screenshots/ folder.
	•	Homepage & Authentication
Shows the registration and login pages, highlighting form validation and error messages.
    •	Dashboard
Displays the user dashboard with navigation and task summaries.
	•	Profile Management
Example of the profile editing and password change functionality.
	•	CRUD Operations
Demonstrates creating, editing, and deleting tasks.
	•	Dark/Light Mode
The theme toggle in action.

    ## Learning Objectives Achieved
	•	Implemented user authentication with secure login/registration
	•	Connected to a MySQL database with proper configuration
	•	Developed CRUD operations (Create, Read, Update, Delete)
	•	Designed a responsive interface with dark/light mode
	•	Implemented form validation & error handling
	•	Organized code with a structured MVC-like approach