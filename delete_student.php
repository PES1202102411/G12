<?php
// Include the header
include('header.php');

// Include the database configuration
require_once('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['student_id'])) {
    $student_id = $_POST['student_id']; // Retrieve student ID from the form

    // Check if the student ID exists in the database
    $query = "SELECT * FROM Student WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Display a confirmation page to delete the student
        echo '<h1>Delete Student</h1>';
        echo '<p>Are you sure you want to delete the following student?</p>';
        echo '<p>Student ID: ' . $row['id'] . '</p>';
        echo '<p>Name: ' . $row['name'] . ' ' . $row['last_name'] . '</p>';
        echo '<p>Date of Birth: ' . $row['dob'] . '</p>';
        // Include more student details here

        // Create a form to confirm the deletion
        echo '<form method="POST" action="process_delete_student.php">';
        echo '<input type="hidden" name="student_id" value="' . $student_id . '">';
        echo '<input type="submit" value="Confirm Deletion">';
        echo '</form>';
    } else {
        echo "No student found with ID: " . $student_id;
    }

    $stmt->close();
} else {
    // Display a form to enter the student ID
    echo '<h1>Delete Student</h1>';
    echo '<form method="POST" action="delete_student.php">';
    echo '<label for="student_id">Student ID:</label>';
    echo '<input type="text" name="student_id" id="student_id" required>';
    echo '<input type="submit" value="Proceed to Delete Student">';
    echo '</form>';
}

// Include the footer
include('footer.php');
?>
<html>
    <head>
    <link rel="stylesheet" href="style.css">
</head>
</html>
