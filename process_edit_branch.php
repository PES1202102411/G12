<?php
// Include the database configuration
require_once('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['branch_id'])) {
    $branch_id = $_POST['branch_id'];
    $name = $_POST['name'];
    $institute_id = $_POST['institute_id'];
    $credits = $_POST['credits'];
    $description = $_POST['description'];
    $capacity = $_POST['capacity'];

    // You should perform input validation and error handling here

    // Update data in the database
    $query = "UPDATE Branch SET name = ?, institute_id = ?, credits = ?, description = ?, capacity = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sisssi", $name, $institute_id, $credits, $description, $capacity, $branch_id);

    if ($stmt->execute()) {
        echo "Branch updated successfully!";
    } else {
        echo "Error updating branch: " . $conn->error;
    }

    $stmt->close();
}

// Redirect back to the branch list or show other options as needed
?>
<html>
    <head>
    <link rel="stylesheet" href="style.css">
</head>
</html>
