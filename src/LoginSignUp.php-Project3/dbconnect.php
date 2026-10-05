<?php
$host="localhost";
$dbname="project";
$username="root";
$password="";

$pdo=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
/* creates a new connection in sql database using the values,handles the connection with my sql */