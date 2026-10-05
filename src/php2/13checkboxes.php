<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="13checkboxes.php" method="post">
        Apples: <input type="checkbox" name="fruits[]" value="apples"> <br>
        Oranges: <input type="checkbox" name="fruits[]" value="oranges"> <br>
        Mangoes: <input type="checkbox" name="fruits[]" value="mangoes"> <br>
        Pinneaples: <input type="checkbox" name="fruits[]" value="pinneaples"> <br>

    <input type="submit">
    </form>

    <?php
    $fruits = $_POST["fruits"];
    echo $fruits[0];
 
    ?>
    
</body>
</html>