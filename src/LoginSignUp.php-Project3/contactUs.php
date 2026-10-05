<?php
require_once 'dbconnect.php';

session_start();
$errors=[];

if(isset($_SESSION['errors'])){
    $errors=$_SESSION['errors'];
    unset($_SESSION['errors']);
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_submit'])){
    $name=$_POST['name'];
    $email=filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
    $subject=$_POST['subject'];
    $messageText=$_POST['message'];

    if(empty($name)){
        $errors['name']='Name is required';
    }

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors['email']='Invalid email format';
    }

    if(empty($subject)){
        $errors['subject']='Subject is required';
    }

    if(empty($messageText)){
        $errors['message']='Message is required';
    }

    if(!empty($errors)){
        $_SESSION['errors']=$errors;
        header('Location: contactUs.php');
        exit();
    }

    $pdo->exec("CREATE TABLE IF NOT EXISTS contact_messages (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        subject VARCHAR(255) NOT NULL,
        message TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");

    $stmt=$pdo->prepare('INSERT INTO contact_messages (name,email,subject,message,created_at) VALUES(:name,:email,:subject,:message,:created_at)');
    $stmt->execute([
        'name'=>$name,
        'email'=>$email,
        'subject'=>$subject,
        'message'=>$messageText,
        'created_at'=>date('Y-m-d H:i:s')
    ]);
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
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
            padding: 20px;
        }

        .contact-container {
            max-width: 600px;
            width: 100%;
            padding: 40px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

        .contact-title {
            color: green;
            font-size: 28px;
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid green;
            padding-bottom: 15px;
        }

        fieldset {
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            padding: 25px;
            background: #fafafa;
        }

        legend {
            font-size: 20px;
            font-weight: bold;
            color: green;
            padding: 0 15px;
        }

        .error-container {
            background: #ffebee;
            border-left: 4px solid #c62828;
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .error-container p {
            color: #c62828;
            margin: 5px 0;
            font-size: 14px;
        }
        .form-group {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            font-weight: bold;
            color: #555;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-group label .required {
            color: #c62828;
        }

        .form-group input,
        .form-group textarea {
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            font-family: Arial, sans-serif;
            transition: border-color 0.3s;
            background: white;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: green;
            box-shadow: 0 0 0 3px rgba(0, 128, 0, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 150px;
        }

        .form-group input.error-input,
        .form-group textarea.error-input {
            border-color: #c62828;
            background: #fff5f5;
        }

        .btn-submit {
            width: 100%;
            padding: 14px;
            background: green;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
            margin-top: 10px;
        }

        .btn-submit:hover {
            background: #006400;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 128, 0, 0.3);
        }

        .btn-submit:active {
            transform: translateY(0);
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: green;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        .back-link:hover {
            color: #006400;
            text-decoration: underline;
        }
        @media (max-width: 480px) {
            .contact-container {
                padding: 20px;
            }

            fieldset {
                padding: 15px;
            }

            .contact-title {
                font-size: 24px;
            }

            legend {
                font-size: 18px;
            }

            .form-group input,
            .form-group textarea {
                padding: 10px 12px;
                font-size: 13px;
            }

            .btn-submit {
                font-size: 16px;
                padding: 12px;
            }
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <fieldset>
            <legend>Send Us A Message</legend>

            <?php if(!empty($errors)): ?>
                <?php foreach($errors as $error): ?>
                    <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
                <?php endforeach; ?>
            <?php endif; ?>

            Name: <input type="text" name="name"> <br>
            Email: <input type="email" name="email"> <br>
            Subject: <input type="text" name="subject"> <br>
            <textarea name="message" id="message" cols="70" rows="10" placeholder="Type your message here"></textarea><br><br>
            <button type="submit" name="contact_submit">Send Message</button>
        </fieldset>
    </form>
</body>
</html>