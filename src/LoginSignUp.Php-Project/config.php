<?php
/* Creates a connection with the database */
$host = "localhost";
$user = "root";
$password = "";
$database = "users_db";

$conn = new mysqli($host, $user, $password, $database);


/* If connection fails the connection is terminated */
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

?>