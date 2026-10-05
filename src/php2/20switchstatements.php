<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="20switchstatements.php" method="post">
        What was your grade?
        <input type="text" name="grade">
        <input type="submit">

    </form>

    <?php
    $grade = $_POST["grade"];
    switch($grade){
        case "A":
            echo "You did amazing!";
            break;
        case "B":
            echo "You did good";
            break;
        case "C":
            echo "You could do better";
            break;
        case "D":
            echo "You did very bad";
            break;
        case "F":
            echo "You failed";
            break;
        default:
            echo "Invalid grade";

    }

    ?>
</body>
</html>