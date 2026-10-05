<?php
session_start();
if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
}else{
    header('Location: home.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .profile-container {
            max-width: 500px;
            width: 90%;
            padding: 40px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            text-align: center;
        }

        .profile-title {
            color: green;
            font-size: 28px;
            margin-bottom: 30px;
            border-bottom: 3px solid green;
            padding-bottom: 15px;
        }

        .profile-detail {
            margin: 20px 0;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
            border-left: 4px solid green;
            text-align: left;
        }

        .profile-detail label {
            font-weight: bold;
            color: #555;
            display: inline-block;
            min-width: 80px;
        }

        .profile-detail span {
            color: #333;
            font-size: 16px;
        }

        .profile-actions {
            margin-top: 30px;
            display: flex;
            gap: 15px;
            justify-content: center;
        }

        .btn {
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
        }

        .btn-back {
            background: #6c757d;
            color: white;
        }

        .btn-back:hover {
            background: #5a6268;
        }

        .btn-edit {
            background: green;
            color: white;
        }

        .btn-edit:hover {
            background: #006400;
        }

        .btn-logout {
            background: #dc3545;
            color: white;
        }

        .btn-logout:hover {
            background: #c82333;
        }

        @media (max-width: 480px) {
            .profile-container {
                padding: 25px;
                width: 95%;
            }

            .profile-title {
                font-size: 24px;
            }

            .profile-actions {
                flex-direction: column;
                gap: 10px;
            }

            .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <h1 class="user-details">
        <p>User Details</p>
        <?php
            echo '<p> Email : '.$user['email']. '</p><br>';
            echo '<p> Name : '.$user['name']. '</p><br>';
        ?>
    </h1>
    
</body>
</html>