<!-- To show errors in login page -->
<?php
    session_start();
    if(isset($_SESSION['errors'])){
        $errors=$_SESSION['errors'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.0/css/all.min.css">
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

        .header {
            width: 100%;
            padding: 20px;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

        .form-title {
            color: green;
            text-align: center;
            margin-bottom: 25px;
            font-size: 28px;
            position: relative;
        }

        .error-main {
            background: #ffebee;
            color: #c62828;
            padding: 10px;
            border-radius: 5px;
            margin: 10px 0;
            font-size: 14px;
            text-align: center;
            border-left: 4px solid #c62828;
        }

        .error {
            color: #c62828;
            font-size: 12px;
            margin-top: 5px;
            font-weight: normal;
        }

        .input-group {
            margin-bottom: 15px;
            position: relative;
            font-weight: normal;
        }

        .input-group input {
            width: 100%;
            padding: 12px 40px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s;
            background: #fafafa;
        }

        .input-group input:focus {
            outline: none;
            border-color: green;
            background: white;
        }

        .input-group i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
            font-size: 18px;
        }

        .input-group .fa-eye {
            left: auto;
            right: 12px;
            cursor: pointer;
            color: #999;
        }

        .input-group .fa-eye:hover {
            color: #333;
        }

    
        .headerSection_recoverrecover {
            text-align: right;
            margin: 10px 0 20px 0;
        }

        .headerSection_recoverrecover a {
            color: green;
            text-decoration: none;
            font-size: 14px;
        }

        .headerSection_recoverrecover a:hover {
            text-decoration: underline;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background: green;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
            margin-top: 10px;
        }

        .btn:hover {
            background: #006400;
        }

        .or {
            text-align: center;
            margin: 25px 0;
            color: #999;
            font-size: 14px;
        }

        .icons {
            text-align: center;
            font-size: 30px;
            margin: 20px 0;
            font-weight: normal;
        }

        .icons i {
            margin: 0 15px;
            cursor: pointer;
            transition: transform 0.3s;
            color: #555;
        }

        .icons i:hover {
            transform: scale(1.2);
        }

        .icons .fa-google:hover {
            color: #db4437;
        }

        .icons .fa-facebook:hover {
            color: #4267B2;
        }

        .links {
            text-align: center;
            margin-top: 20px;
            font-weight: normal;
            font-size: 14px;
        }

        .links p {
            margin-bottom: 8px;
            color: #666;
        }

        .links a {
            color: green;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
        }

        .links a:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .container {
                padding: 20px;
                margin: 10px;
            }
            
            .form-title {
                font-size: 24px;
            }
            
            .input-group input {
                padding: 10px 35px;
                font-size: 13px;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <section class="container">
            <h1 class="form-title"> Sign In 
             <?php
            if(isset($errors['login']))
                {
                    echo '<section class="error-main"><p>'.$errors['login'].'</p> </section>';
                }
            ?>
            </h1>
                <form method="POST" action="user-account.php">
                    <h2 class="input-group">
                        <i class="fas fa-envelope"></i>
                            <input type="email" name="email" id="email" required placeholder="email">
                     <?php
                        if(isset($errors['email'])){
                            echo '<h2 class="error"> <p>' .$errors['email']. '</p></h2>';
                        }
                    ?>

                    </h2>

                    <h2 class="input-group">
                        <i class="fas fa-lock"></i>
                            <input type="password" name="password" id="password"  placeholder="password" required>
                        <i class="fa fa-eye"></i>
                         <?php
                        if(isset($errors['password'])){
                            echo '<h2 class="error"> <p>' .$errors['password']. '</p></h2>';
                        }
                        ?>
                    </h2>
                    <p class="headerSection_recoverrecover">
                        <a href="#">Recover Password</a>
                    </p>
                    <input type="submit" class="btn" value="Sign In" name="signin">
                </form>

                <p class="or">
                    ------------or-------------
                </p>
                <h2 class="icons">
                    <i class="fab fa-google"></i>
                    <i class="fab fa-facebook"></i>
                </h2>
                <h2 class="links">
                    <p>Don't have account yet?</p>
                    <a href="register.php">Sign up</a>
                </h2>
                <script src="script.js"></script>


        </section>
    </header>
    
</body>
</html>

<!-- Remove session variable so errrors dont persist -->

<?php
    if(isset($_SESSION['errors'])){
        unset($_SESSION['errors']);
    }
?>