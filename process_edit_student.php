<?php
// Include the database configuration
require_once('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $student_id = $_POST['student_id'];
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

    // Update data in the database
    $query = "UPDATE Student SET name = ?, last_name = ?, dob = ?, pessat_score = ?, kcet_score = ?, entrance_test = ?, category = ?, email = ?, preference1 = ?, preference2 = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssssssssi", $name, $last_name, $dob, $pessat_score, $kcet_score, $entrance_test, $category, $email, $preference1, $preference2, $student_id);

    if ($stmt->execute()) {
        // Redirect back to the student list or show a success message
        header('Location: student.php');
        exit();
    } else {
        echo "Error updating student: " . $conn->error;
    }

    $stmt->close();
}
?>
<html>
    <head>
    <link rel="stylesheet" href="style.css">
</head>
</html>