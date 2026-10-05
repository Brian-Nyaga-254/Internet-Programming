<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        class Student {
            var $name;
            var $major;
            var $gpa;

            function __construct($name, $major, $gpa){
                $this->name = $name;
                $this->major = $major;
                $this->gpa = $gpa;

            }

            function hasHonors(){
                if($this->gpa >= 2.5){
                    return "true";

                }
                return "false";
            }
        }

        $student1 = new Student("Brian", "BSE", 2.8);
        $student1 = new Student("Frank", "ART", 2.5);

        echo $student1->hashonors();
    ?>
    
</body>
</html>