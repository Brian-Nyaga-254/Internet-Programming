# Website Presentation Documentation

## 1. Project Overview
This website is a simple PHP and MySQL-based web application that allows users to register, log in, view their profile, send messages, and review submissions.

## 2. Main Pages
- Login page: lets existing users sign in.
- Register page: allows new users to create an account.
- Home page: shows the logged-in user’s details and links to other pages.
- Profile page: displays the user’s saved information.
- Contact Us page: collects messages from visitors.
- Submissions page: shows all stored contact messages.
- Information Hub: provides summary information about the form and data.

## 3. How It Works
1. A user opens the website and logs in or registers.
2. The system validates the form data and stores it in the database.
3. After successful login, a session is created to keep the user logged in.
4. The user can navigate to different pages and submit contact messages.
5. Submitted messages are saved in the database and displayed on the submissions page.

## 4. Database
The website uses a MySQL database named project with two main tables:
- users: stores user account information.
- contact_messages: stores contact form submissions.

## 5. Key Features
- User authentication
- Secure password handling
- Session-based login
- Form validation
- Database storage and retrieval

## 6. Summary
This project demonstrates how a basic dynamic website works using PHP, MySQL, sessions, and form processing.
