<?php
// Include the database configuration
require_once('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and validate form data
    $name = $_POST['name'];
    $institute_id = $_POST['institute_id'];
    $credits = $_POST['credits'];
    $description = $_POST['description'];
    $capacity = $_POST['capacity'];

    // Add more validation and error handling here

    // Insert the branch data into the database
    $query = "INSERT INTO Branch (name, institute_id, credits, description, capacity) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sisss", $name, $institute_id, $credits, $description, $capacity);

    if ($stmt->execute()) {
        // Branch added successfully
        echo "Branch added successfully!";
    } else {
        // Error adding branch
        echo "Error adding branch: " . $conn->error;
    }

    $stmt->close();
}
?>
<html>
    <head>
    <link rel="stylesheet" href="style.css">
</head>
</html>
