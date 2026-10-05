<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="14associativearrays.php" method="post">
        <input type="text" name="student">
        <input type="submit">
    </form>

    <?php
    $grades = array("Jim"=> "A+", "Pam" => "B-", "Oscar" =>"c+");
    $grades["Jim"] = "A";
    echo $grades[$_POST["student"]];

    ?>
    
</body>
</html>