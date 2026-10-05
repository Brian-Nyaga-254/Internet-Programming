<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="9matlibsgame.php" method="get">
        Color: <input type="text" name="color"> <br>
        Plural noun: <input type="text" name="pluralNoun"> <br>
        Goat: <input type="text" name="goat"> <br>

    <input type="submit"> <br>
    </form>
        
    <?php

        $color = $_GET["color"];
        $pluralNoun = $_GET["pluralNoun"];
        $goat = $_GET["goat"];

        echo "Roses are $color <br>";
        echo "$pluralNoun are blue <br>";
        echo "$goat is the Goat <br>";

    ?>
    
</body>
</html>