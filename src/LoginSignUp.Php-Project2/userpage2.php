<?php
session_start();

if (!isset($_SESSION['name'], $_SESSION['email'])) {
    header('Location: index2.php');
    exit();
}

$name = htmlspecialchars($_SESSION['name'], ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars($_SESSION['email'], ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="style2.css?v=3">
</head>
<body>
    <article class="container">
        <section class="form-box active">
            <h2>Welcome, <?= $name ?>!</h2>
            <p>You are logged in as <?= $email ?>.</p>
            <form action="login_register2.php" method="post">
                <button type="submit" name="Logout">Log out</button>
            </form>
        </section>
    </article>
</body>
</html>