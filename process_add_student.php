<?php
// Include the database configuration
require_once('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    $pessat_score = $_POST['pessat_score'];
    $kcet_score = $_POST['kcet_score'];
    $entrance_test = $_POST['entrance_test'];
    $category = $_POST['category'];
    $email = $_POST['email'];
    $preference1 = $_POST['preference1'];
    $preference2 = $_POST['preference2'];

    // You should perform input validation and error handling here

    // Insert data into the database
    $query = "INSERT INTO Student (name, last_name, dob, pessat_score, kcet_score, entrance_test, category, email, preference1, preference2)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssiisssss", $name, $last_name, $dob, $pessat_score, $kcet_score, $entrance_test, $category, $email, $preference1, $preference2);

    if ($stmt->execute()) {
        echo "Student added successfully!";
    } else {
        echo "Error adding student: " . $conn->error;
    }

    $stmt->close();
}
// Redirect to a student list page or show other options as needed
?>
<html>
    <head>
    <link rel="stylesheet" href="style.css">
</head>
</html>
