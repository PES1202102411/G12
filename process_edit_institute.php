<?php
// Include the database configuration
require_once('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['institute_id'])) {
    // Retrieve form data
    $institute_id = $_POST['institute_id'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $capacity = $_POST['capacity'];
    $num_branches = $_POST['num_branches'];
    $email = $_POST['email'];
    $contact_no = $_POST['contact_no'];

    // Add more fields as needed

    // You should perform input validation and error handling here

    // Update data in the database
    $query = "UPDATE Institute SET name = ?, location = ?, capacity = ?, num_branches = ?, email = ?, contact_no = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssiiisi", $name, $location, $capacity, $num_branches, $email, $contact_no, $institute_id);

    if ($stmt->execute()) {
        echo "Institute updated successfully!";
    } else {
        echo "Error updating institute: " . $conn->error;
    }

    $stmt->close();
} else {
    // Handle cases where the form was not submitted correctly
    echo "Invalid request.";
}
?>
<html>
    <head>
    <link rel="stylesheet" href="style.css">
</head>
</html>
