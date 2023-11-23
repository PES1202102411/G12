<?php
// Include the database configuration
require_once('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['branch_id'])) {
    $branch_id = $_POST['branch_id']; // Retrieve branch ID from the form

    // You may want to add further validation or error handling here

    // Delete the branch from the database
    $query = "DELETE FROM Branch WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $branch_id);

    if ($stmt->execute()) {
        echo "Branch deleted successfully!";
    } else {
        echo "Error deleting branch: " . $conn->error;
    }

    $stmt->close();
}

// You can include a link to go back to the branch list or show other options as needed

// Include the footer
include('footer.php');
?>
<html>
    <head>
    <link rel="stylesheet" href="style.css">
</head>
</html>
