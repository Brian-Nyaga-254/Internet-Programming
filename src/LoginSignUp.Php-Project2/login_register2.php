<?php


/* ) It starts a PHP session
At the top, it calls session_start();.
That lets the script store messages like errors or which form is active using $_SESSION. */
session_start();

/* Connects to the database */
require_once 'config2.php';


/* 3) It checks whether a register form was submitted
It looks for a POST request with the field register:

if (isset($_POST['register'])) { ... }
That means the form likely has a submit button named register. 
checks if the register button has been pressed*/
if (isset($_POST['Register'])) {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $plainPassword = $_POST['password'] ?? '';

    $checkEmail = $conn->prepare('SELECT email FROM user WHERE email = ?');
    $checkEmail->bind_param('s', $email);
    $checkEmail->execute();
    $checkEmail->store_result();

    if ($checkEmail->num_rows > 0) {
        $_SESSION['register_error'] = 'Email is already registered';
    } else {
        $password = password_hash($plainPassword, PASSWORD_DEFAULT);
        $insertUser = $conn->prepare('INSERT INTO user (name, email, password) VALUES (?, ?, ?)');
        $insertUser->bind_param('sss', $name, $email, $password);
        $insertUser->execute();
        $_SESSION['register_success'] = 'Registration successful. You can now log in.';
    }

    $_SESSION['active_form'] = 'register';
    header('Location: index2.php');
    exit();
}

if (isset($_POST['Login'])) {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    $getUser = $conn->prepare('SELECT name, email, password FROM user WHERE email = ?');
    $getUser->bind_param('s', $email);
    $getUser->execute();
    $getUser->store_result();
    $userName = '';
    $userEmail = '';
    $userPassword = '';
    $getUser->bind_result($userName, $userEmail, $userPassword);
    if ($getUser->num_rows > 0) {
        $getUser->fetch();
        if (password_verify($password, $userPassword)) {
            $_SESSION['name'] = $userName;
            $_SESSION['email'] = $userEmail;

            header('Location: userpage2.php');
            exit();
        }
    }

    $_SESSION['login_error'] = 'Incorrect email or password';
    $_SESSION['active_form'] = 'login';
    header('Location: index2.php');
    exit();
}

if (isset($_POST['Logout'])) {
    $_SESSION = [];
    session_destroy();
    header('Location: index2.php');
    exit();
}

header('Location: index2.php');
exit();


/* Read , lines 1 to 200
Completed with input: {
  "path": "c:\\xampp\\htdocs\\loginRegister\\login_register2.php",
  "view_range": [
    1,
    200
  ]
}

This file, `login_register2.php`, is the backend processor for the forms in `index2.php`. In other words:

- When the user clicks Login or Register on the page, the browser sends the form data here.
- This file checks which form was submitted.
- It talks to the database.
- It either creates a user, logs in a user, logs them out, or redirects back to the main page.

Here is how it works, step by step.

1. Start the session
- At the top:
  - session_start();
- This makes the script able to read and write session data like:
  - $_SESSION['login_error']
  - $_SESSION['register_error']
  - $_SESSION['register_success']
  - $_SESSION['name']
  - $_SESSION['email']

This is important because the login page uses session messages to show “wrong password”, “registration successful”, etc.

2. Connect to the database
- require_once 'config2.php';
- This loads the database connection file and gives access to $conn.
- So the script can query the database using MySQLi.

3. Register branch
This block runs when the Register button is submitted:

- if (isset($_POST['Register'])) { ... }

The actual form from `index2.php` has:
- <button type="submit" name="Register">Register</button>

So this condition is true when someone submits the register form.

Then the code does this:

- $name = trim($_POST['name'] ?? '');
- $email = trim($_POST['email'] ?? '');
- $plainPassword = $_POST['password'] ?? '';

This collects the form values:
- name
- email
- password

It trims spaces and uses null coalescing (?? '') so it won’t crash if a field is missing.

Then it checks whether the email already exists:

- $checkEmail = $conn->prepare('SELECT email FROM user WHERE email = ?');
- $checkEmail->bind_param('s', $email);
- $checkEmail->execute();
- $checkEmail->store_result();

This query:
- looks in the user table
- searches for a row with the same email

Then:

- if ($checkEmail->num_rows > 0) {
    $_SESSION['register_error'] = 'Email is already registered';
  }

If the email already exists:
- it stores an error message in the session

Otherwise:
- $password = password_hash($plainPassword, PASSWORD_DEFAULT);
- This hashes the password securely before saving it to the database.
- password_hash() is the safe way to store passwords.

Then the user is inserted:

- $insertUser = $conn->prepare('INSERT INTO user (name, email, password) VALUES (?, ?, ?)');
- $insertUser->bind_param('sss', $name, $email, $password);
- $insertUser->execute();

This inserts:
- name
- email
- hashed password

Then:
- $_SESSION['register_success'] = 'Registration successful. You can now log in.';

This sets a success message that will be shown on the login/register page after redirect.

Finally:
- $_SESSION['active_form'] = 'register';
- header('Location: index2.php');
- exit();

This means:
- the page will go back to `index2.php`
- the register form should stay active
- the user sees the success message

4. Login branch
This block runs when the Login button is submitted:

- if (isset($_POST['Login'])) { ... }

In `index2.php`, login button is:
- <button type="submit" name="Login">Login</button>

So this is the login handler.

It reads form values:

- $email = trim($_POST['email'] ?? '');
- $password = $_POST['password'] ?? '';

Then it fetches the user by email:

- $getUser = $conn->prepare('SELECT name, email, password FROM user WHERE email = ?');
- $getUser->bind_param('s', $email);
- $getUser->execute();
- $getUser->store_result();

This searches the user table by email.

Then it binds the result fields:
- $userName = '';
- $userEmail = '';
- $userPassword = '';
- $getUser->bind_result($userName, $userEmail, $userPassword);

Now if the user exists:
- if ($getUser->num_rows > 0) {
    $getUser->fetch();
    if (password_verify($password, $userPassword)) {
        $_SESSION['name'] = $userName;
        $_SESSION['email'] = $userEmail;

        header('Location: userpage2.php');
        exit();
    }
  }

This checks:
- Does a user with that email exist?
- If yes, does the submitted password match the hashed password in the DB?
- password_verify($password, $userPassword) compares the plain password with the stored hash.

If the password matches:
- it stores the user’s name and email in the session
- redirects to userpage2.php

If not:
- it sets an error:
  - $_SESSION['login_error'] = 'Incorrect email or password';
- sets active_form = 'login'
- redirects back to `index2.php`

So the login page shows an error if the credentials are wrong.

5. Logout branch
This block runs when the logout form is submitted:

- if (isset($_POST['Logout'])) { ... }

It does:
- $_SESSION = [];
- session_destroy();

This clears all session data and deletes the session.

Then:
- header('Location: index2.php');
- exit();

This sends the user back to the login/register page.

6. Final fallback
At the end:
- header('Location: index2.php');
- exit();

This means:
- if no known button was submitted,
- or if the script reached the end without a valid action,
- it just redirects the user to the main page.

How the whole flow works together

- User fills the form on `index2.php`
- Form submits to `login_register2.php`
- Script checks whether the request is for Register or Login
- It interacts with the database
- It stores messages in $_SESSION if needed
- It redirects back to `index2.php`
- That page reads the session values and displays the error/success message
- Then it clears the messages from the session so they only appear once

Simple summary:
- index2.php = the interface
- login_register2.php = the logic/controller
- config2.php = database connection
- userpage2.php = page shown after successful login

If you want, I can also explain:
- how the database table is structured
- how password_hash() and password_verify() work
- how the login flow ties to userpage2.php with session data */