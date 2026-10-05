<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        class Chef {
            function makeChicken(){
                echo "The chef makes chicken <br>";
            }
            function makeSalad(){
                echo "The chef makes salad <br>";
            }
            function makeRibs(){
                echo "The chef makes ribs <br>";
            }
        }

        class ItalianChef extends Chef{
            function makePasta(){
                echo "The chef makes pasta";
            }

            /* Overriding a function */
            function makeChicken(){
                "The chef makes chips chicken";
            }

        }

        $chef = new Chef();
        $chef->makeChicken();
        
        $italianchef = new ItalianChef();
        $italianchef->makeChicken();

    ?>
    
</body>
</html>