<?php


/* ) It starts a PHP session
At the top, it calls session_start();.
That lets the script store messages like errors or which form is active using $_SESSION. */
session_start();

/* Connects to the database */
require_once 'config.php';

/* 3) It checks whether a register form was submitted
It looks for a POST request with the field register:

if (isset($_POST['register'])) { ... }
That means the form likely has a submit button named register. 
checks if the register button has been pressed*/
if (isset($_POST['Register'])) {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $plainPassword = $_POST['password'] ?? '';
    $role = $_POST['role'] ?? '';

    $checkEmail = $conn->prepare('SELECT email FROM users WHERE email = ?');
    $checkEmail->bind_param('s', $email);
    $checkEmail->execute();
    $checkEmail->store_result();

    if ($checkEmail->num_rows > 0) {
        $_SESSION['register_error'] = 'Email is already registered';
        $_SESSION['active_form'] = 'register';
    } else {
        $password = password_hash($plainPassword, PASSWORD_DEFAULT);
        $insertUser = $conn->prepare('INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)');
        $insertUser->bind_param('ssss', $name, $email, $password, $role);
        $insertUser->execute();
    }

    header("Location: index.php");
    exit();
    }

/* Isset checks if login button has been clicked */
    if (isset($_POST['Login'])) {
     $email = trim($_POST['email'] ?? '');
     $password = $_POST['password'] ?? '';

    $getUser = $conn->prepare('SELECT name, email, password, role FROM users WHERE email = ?');
     $getUser->bind_param('s', $email);
     $getUser->execute();
    $getUser->store_result();
    $userName = '';
    $userEmail = '';
    $userPassword = '';
    $userRole = '';
    $getUser->bind_result($userName, $userEmail, $userPassword, $userRole);
    if ($getUser->num_rows > 0){
        $getUser->fetch();
        if (password_verify($password, $userPassword)) {
            $_SESSION['name'] = $userName;
            $_SESSION['email'] = $userEmail;

            if ($userRole === 'admin') {
                header("Location: admin_page.php");
            } else {
                header("Location: user_page.php");

            }
            exit();
        }
    }

    $_SESSION['login_error'] = "Incorrect email or password";
    $_SESSION['active_form'] = 'login';
    header("Location: index.php");
    exit();
   } 
?>