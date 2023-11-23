<?php
// Include the database configuration
require_once('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['institute_id'])) {
    $institute_id = $_POST['institute_id']; // Retrieve institute ID from the form

    // Check if the institute ID exists in the database
    $query = "SELECT * FROM Institute WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $institute_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Delete the institute
        $deleteQuery = "DELETE FROM Institute WHERE id = ?";
        $deleteStmt = $conn->prepare($deleteQuery);
        $deleteStmt->bind_param("i", $institute_id);

        if ($deleteStmt->execute()) {
            // Institute deleted successfully
            header("Location: institute.php"); // Redirect to the institute list
        } else {
            echo "Error deleting institute: " . $conn->error;
        }

        $deleteStmt->close();
    } else {
        echo "No institute found with ID: " . $institute_id;
    }

    $stmt->close();
} else {
    echo "Invalid request or missing institute ID.";
}
?>
<html>
    <head>
    <link rel="stylesheet" href="style.css">
</head>
</html>
