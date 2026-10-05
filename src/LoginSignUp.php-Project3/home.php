<?php
session_start();
if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
}else{
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            min-height: 100vh;
        }

        .header {
            background: white;
            padding: 20px 30px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header__h1 {
            color: green;
            font-size: 28px;
        }

        .header__nav ul {
            list-style: none;
            display: flex;
            gap: 25px;
        }

        .header__nav ul li a {
            color: #333;
            text-decoration: none;
            font-size: 16px;
            padding: 8px 12px;
            border-radius: 5px;
            transition: all 0.3s;
        }

        .header__nav ul li a:hover {
            background: green;
            color: white;
        }

        .user-details {
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            text-align: center;
        }

        .user-details p {
            margin: 15px 0;
            color: #333;
            font-size: 16px;
        }

        .user-details p:first-child {
            font-size: 18px;
            font-weight: bold;
            color: green;
            border-bottom: 2px solid #e0e0e0;
            padding-bottom: 15px;
        }

        .user-details a {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 40px;
            background: #dc3545;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: background 0.3s;
        }

        .user-details a:hover {
            background: #c82333;
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                gap: 15px;
                padding: 15px;
            }

            .header__nav ul {
                flex-direction: column;
                align-items: center;
                gap: 10px;
            }

            .user-details {
                margin: 30px 20px;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <h1 class="header__h1">Home</h1>
        <nav aria-label="Primary-Navigation" class="header__nav">
            <ul class="header__ul">
                <li><a href="profile.php">Profile</a></li>
                <li><a href="contactUs.php">Contact Us</a></li>
                <li><a href="submissions.php">Your Messages</a></li>
                <li><a href="informationHub.php">Settings</a></li>
            </ul>
        </nav>
    </header>

    <section class="user-details">
        <p>Logged in user</p>
        <?php
            echo '<p>Email: '.$user['email'].'</p>';
            echo '<p>Name: '.$user['name'].'</p>';
        ?>
        <a href="logout.php">Logout</a>
    </section>
</body>
</html>