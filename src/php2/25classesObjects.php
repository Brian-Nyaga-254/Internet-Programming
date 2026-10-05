<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="">

    <input type="submit">
    </form>

    <?php
        class Book {
            var $title;
            var $author;
            var $pages;
        }

        $book1 = new Book;
        $book1->title = "Dragon Ball";
        $book1->author = "Akira toriyama";
        $book1->pages = 400;
        
        $book2 = new Book;
        $book2->title = "Attack on titan";
        $book2->author = "Hajime Isayama";
        $book2->pages = 100;

        echo $book1->author;

    ?>
    
</body>
</html>