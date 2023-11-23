<?php
// Include the header
include('header.php');

// Include the database configuration
require_once('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['student_id'])) {
    // Retrieve student ID from the form
    $student_id = $_POST['student_id'];

    // Retrieve student data from the database based on student_id
    $query = "SELECT * FROM Student WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Display the form to edit student details
        echo '<h1>Edit Student</h1>';
        echo '<form method="POST" action="process_edit_student.php">';
        echo '<input type="hidden" name="student_id" value="' . $student_id . '">';
        
        // Fields for editing student details
        echo '<label for="name">Name:</label>';
        echo '<input type="text" name="name" id="name" required value="' . $row['name'] . '">';
        
        echo '<label for="last_name">Last Name:</label>';
        echo '<input type="text" name="last_name" id="last_name" required value="' . $row['last_name'] . '">';
        
        echo '<label for="dob">Date of Birth:</label>';
        echo '<input type="date" name="dob" id="dob" required value="' . $row['dob'] . '">';
        
        echo '<label for="pessat_score">PESAT Score:</label>';
        echo '<input type="number" name="pessat_score" id="pessat_score" value="' . $row['pessat_score'] . '">';
        
        echo '<label for="kcet_score">KCET Score:</label>';
        echo '<input type="number" name="kcet_score" id="kcet_score" value="' . $row['kcet_score'] . '">';
        
        echo '<label for="entrance_test">Entrance Test:</label>';
        echo '<input type="text" name="entrance_test" id="entrance_test" value="' . $row['entrance_test'] . '">';
        
        echo '<label for="category">Category:</label>';
        echo '<input type="text" name="category" id="category" value="' . $row['category'] . '">';
        
        echo '<label for="email">Email:</label>';
        echo '<input type="email" name="email" id="email" required value="' . $row['email'] . '">';
        
        echo '<label for="preference1">Preference 1:</label>';
        echo '<input type="text" name="preference1" id="preference1" value="' . $row['preference1'] . '">';
        
        echo '<label for="preference2">Preference 2:</label>';
        echo '<input type="text" name="preference2" id="preference2" value="' . $row['preference2'] . '">';
        
        echo '<input type="submit" value="Update Student">';
        echo '</form>';
    } else {
        echo "No student found with ID: " . $student_id;
    }

    $stmt->close();
} else {
    // Display a form to enter the student ID
    echo '<h1>Edit Student</h1>';
    echo '<form method="POST" action="edit_student.php">';
    echo '<label for="student_id">Student ID:</label>';
    echo '<input type="text" name="student_id" id="student_id" required>';
    echo '<input type="submit" value="Edit Student">';
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
