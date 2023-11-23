<?php
// Include the header
include('header.php');

// Include the database configuration
require_once('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['institute_id'])) {
    $institute_id = $_POST['institute_id'];

    // Retrieve institute data from the database based on institute_id
    $query = "SELECT * FROM Institute WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $institute_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Display the form to edit institute details
        echo '<h1>Edit Institute</h1>';
        echo '<form method="POST" action="process_edit_institute.php">';
        echo '<input type="hidden" name="institute_id" value="' . $institute_id . '">';

        // Fields for editing institute details
        echo '<label for="name">Institute Name:</label>';
        echo '<input type="text" name="name" id="name" required value="' . $row['name'] . '">';
        
        echo '<label for="location">Location:</label>';
        echo '<input type="text" name="location" id="location" required value="' . $row['location'] . '">';
        
        echo '<label for="capacity">Capacity:</label>';
        echo '<input type="number" name="capacity" id="capacity" required value="' . $row['capacity'] . '">';
        
        echo '<label for="num_branches">Number of Branches:</label>';
        echo '<input type="number" name="num_branches" id="num_branches" required value="' . $row['num_branches'] . '">';
        
        echo '<label for="email">Email:</label>';
        echo '<input type="email" name="email" id="email" required value="' . $row['email'] . '">';
        
        echo '<label for="contact_no">Contact No:</label>';
        echo '<input type="text" name="contact_no" id="contact_no" required value="' . $row['contact_no'] . '">';
        
        // Add more fields as needed

        echo '<input type="submit" value="Update Institute">';
        echo '</form>';
    } else {
        echo "No institute found with ID: " . $institute_id;
    }

    $stmt->close();
} else {
    // Display a form to enter the institute ID
    echo '<h1>Edit Institute</h1>';
    echo '<form method="POST" action="edit_institute.php">';
    echo '<label for="institute_id">Institute ID:</label>';
    echo '<input type="text" name="institute_id" id="institute_id" required>';
    echo '<input type="submit" value="Edit Institute">';
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
