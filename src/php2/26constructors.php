<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        class Book {
            var $title;
            var $author;
            var $pages;

            function __construct($Title, $Author, $Pages){
               $this->title = $Title;
               $this->author = $Author;
               $this->pages = $Pages;
            }
        }

        $book1 = new Book("Dragon Ball", "Akira toriyama", "400");
       

        $book2 = new Book("Attack on titan", "Hajime Isayama", "100");
       

        echo $book1->author;

    ?>
    
</body>
</html>