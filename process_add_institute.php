<?php
// Include the database configuration
require_once('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $location = $_POST['location'];
    $capacity = $_POST['capacity'];
    $num_branches = $_POST['num_branches'];
    $email = $_POST['email'];
    $contact_no = $_POST['contact_no'];

    // Add more fields as needed

    // You should perform input validation and error handling here

    // Insert data into the database
    $query = "INSERT INTO Institute (name, location, capacity, num_branches, email, contact_no) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssiiis", $name, $location, $capacity, $num_branches, $email, $contact_no);

    if ($stmt->execute()) {
        echo "Institute added successfully!";
    } else {
        echo "Error adding institute: " . $conn->error;
    }

    $stmt->close();
}

// Redirect back to the institute list or show other options as needed
?>
<html>
    <head>
    <link rel="stylesheet" href="style.css">
</head>
</html>
