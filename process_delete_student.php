<?php
// Include the database configuration
require_once('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['student_id'])) {
    $student_id = $_POST['student_id']; // Retrieve student ID from the form

    // Delete the student from the database
    $query = "DELETE FROM Student WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $student_id);

    if ($stmt->execute()) {
        echo "Student with ID $student_id has been deleted successfully.";
    } else {
        echo "Error deleting the student: " . $conn->error;
    }

    $stmt->close();
}
?>
<html>
    <head>
    <link rel="stylesheet" href="style.css">
</head>
</html>
