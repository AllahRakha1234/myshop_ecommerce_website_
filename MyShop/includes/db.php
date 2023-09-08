<?php

$servername = "localhost";
$username = "root";
$password = "root";
$database = "shop";
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    // die("Connection failed: " . mysqli_connect_error());
    echo '<script>console.log("Connection failed:");</script>';
} else {
    echo '<script>console.log("Connected successfully");</script>';
}
?>