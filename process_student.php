<?php
// Include the database configuration
require_once('../config/database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];

    // Add more fields as needed (pessat_score, kcet_score, category, etc.)

    // You should perform input validation and error handling here

    // Insert data into the database
    $query = "INSERT INTO Student (name, last_name, dob, email) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $name, $last_name, $dob, $email);

    if ($stmt->execute()) {
        echo "Student added successfully!";
    } else {
        echo "Error adding student: " . $conn->error;
    }

    $stmt->close();
}
// Redirect back to the student list or show other options as needed
?>

<?php
// Include the footer
include('../includes/footer.php');
?>
<html>
    <head>
    <link rel="stylesheet" href="style.css">
</head>
</html>