<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "pavani19";
$db_name = "se";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<html>
    <head>
    <link rel="stylesheet" href="style.css">
</head>
</html>
