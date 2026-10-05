<?php

session_start();


/* $_SESSION['login_error'] ?? '' means: if login_error exists in the session, use it; otherwise use an empty string. */
$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? '',
];
$success = $_SESSION['register_success'] ?? '';
$activeForm = $_SESSION['active_form'] ?? 'login';

unset(
    $_SESSION['login_error'],
    $_SESSION['register_error'],
    $_SESSION['register_success'],
    $_SESSION['active_form']
);

function showError($error) {
    return !empty($error) ? "<p class='error-message'>" .
        htmlspecialchars($error, ENT_QUOTES, 'UTF-8') . "</p>" : '';
}

function showSuccess($message) {
    return !empty($message) ? "<p class='success-message'>" .
        htmlspecialchars($message, ENT_QUOTES, 'UTF-8') . "</p>" : '';
}

function isActiveForm($formName, $activeForm) {
    return $formName === $activeForm ? 'active' : '';
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Register Page</title>
    <link rel="stylesheet" href="style2.css?v=3">
</head>
<body>
    <article class="container">
        <section class="form-box <?= isActiveForm('login', $activeForm);  ?>" id="login-form">
        <form action="login_register2.php" method="post">
            <h2>Login</h2>
            <?=  showError($errors['login']); ?>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="Login">Login</button>


            <!-- Shows the register form when clicked -->
            <p>Don't have an account? <a href="#" onclick="showForm('register-form')">Register </a></p>
        </form>
        </section>


        <section class="form-box <?= isActiveForm('register', $activeForm);  ?>" id="register-form">
        <form action="login_register2.php" method="post">
            <h2>Register</h2>
            <?= showSuccess($success) ?>
            <?=  showError($errors['register']) ?>
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="Register">Register</button>


            <!-- Show form uses login form id to switch to login form when clicked -->
            <p>Already have an account? <a href="#" onclick="showForm('login-form')">Login</a></p>
        </form>
        </section>


    </article>
    
    <script src="script2.js"></script>
</body>
</html>


<!-- Here’s the overall flow of `index2.php`:

- It starts a PHP session with session_start().
  - This lets the page read values stored in $_SESSION from the previous PHP file, such as error messages or which form should be visible.

- It gets saved flash messages:
  - $_SESSION['login_error']
  - $_SESSION['register_error']
  - $_SESSION['register_success']
  - $_SESSION['active_form']
  - If they don’t exist, it assigns empty strings or a default value.

- Right after reading them, it clears them:
  - unset($_SESSION['login_error'], ...)
  - This is important because these messages should only appear once, then disappear after the page reloads.

- It defines helper functions:
  - showError($error)
    - If there is an error, it returns HTML like <p class='error-message'>...</p>
    - It uses htmlspecialchars() so the message is safe and won’t break the page.
  - showSuccess($message)
    - Same idea, but for success messages.
  - isActiveForm($formName, $activeForm)
    - Returns active if the given form should be shown as the current one.

- Then it renders the page HTML:
  - login form section
  - register form section
  - both are displayed inside the same article container

- The login form:
  - action="login_register2.php"
  - method="post"
  - It sends email and password to the backend file.
  - The submit button is named Login, so the backend can tell which form triggered the request.

- The register form:
  - same action and method
  - fields: name, email, password
  - button name is Register

- It prints errors/success messages inside each form:
  - The login form prints the login error
  - The register form prints success and register error

- At the end it loads script2.js
  - This script probably switches between the two forms by toggling the active class and changing which section is visible.

How it really works in practice:
1. A user submits either form.
2. The browser sends POST data to login_register2.php.
3. That backend file checks the submitted data.
4. If something is wrong, it stores an error in $_SESSION.
5. It redirects back to this page.
6. This page loads, reads the session value, shows it to the user, then clears it.
7. The user sees the message once.

This file is mostly the presentation layer, not the logic layer. The actual login/register logic happens in login_register2.php.

If you want, I can also explain:
- the exact flow of login_register2.php
- what the active class does in CSS
- how the switch between forms works with script2.js -->