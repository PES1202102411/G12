<?php
// Include the header
include('header.php');

// Include the database configuration
require_once('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['branch_id'])) {
    $branch_id = $_POST['branch_id'];

    // Retrieve branch data from the database based on branch_id
    $query = "SELECT * FROM Branch WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $branch_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Display the form to edit branch details
        echo '<h1>Edit Branch</h1>';
        echo '<form method="POST" action="process_edit_branch.php">';
        echo '<input type="hidden" name="branch_id" value="' . $branch_id . '">';

        // Fields for editing branch details
        echo '<label for="name">Branch Name:</label>';
        echo '<input type="text" name="name" id="name" required value="' . $row['name'] . '">';
        
        echo '<label for="institute_id">Institute ID:</label>';
        echo '<input type="text" name="institute_id" id="institute_id" required value="' . $row['institute_id'] . '">';
        
        echo '<label for="credits">Credits:</label>';
        echo '<input type="number" name="credits" id="credits" required value="' . $row['credits'] . '">';
        
        echo '<label for="description">Description:</label>';
        echo '<input type="text" name="description" id="description" required value="' . $row['description'] . '">';
        
        echo '<label for="capacity">Capacity:</label>';
        echo '<input type="number" name="capacity" id="capacity" required value="' . $row['capacity'] . '">';
        
        // Add more fields as needed

        echo '<input type="submit" value="Update Branch">';
        echo '</form>';
    } else {
        echo "No branch found with ID: " . $branch_id;
    }

    $stmt->close();
} else {
    // Display a form to enter the branch ID
    echo '<h1>Edit Branch</h1>';
    echo '<form method="POST" action="edit_branch.php">';
    echo '<label for="branch_id">Branch ID:</label>';
    echo '<input type="text" name="branch_id" id="branch_id" required>';
    echo '<input type="submit" value="Edit Branch">';
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
