<?php
// Include the header
include('header.php');
?>

<h1>Delete Institute</h1>

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
        $row = $result->fetch_assoc();
        // Display a confirmation page to delete the institute
        echo '<p>Are you sure you want to delete the following institute?</p>';
        echo '<p>Institute ID: ' . $row['id'] . '</p>';
        echo '<p>Name: ' . $row['name'] . '</p>';
        echo '<p>Location: ' . $row['location'] . '</p>';
        // Include more institute details here

        // Create a form to confirm the deletion
        echo '<form method="POST" action="process_delete_institute.php">';
        echo '<input type="hidden" name="institute_id" value="' . $institute_id . '">';
        echo '<input type="submit" value="Confirm Deletion">';
        echo '</form>';
    } else {
        echo "No institute found with ID: " . $institute_id;
    }

    $stmt->close();
} else {
    // Display a form to enter the institute ID
    echo '<form method="POST" action="delete_institute.php">';
    echo '<label for="institute_id">Institute ID:</label>';
    echo '<input type="text" name="institute_id" id="institute_id" required>';
    echo '<input type="submit" value="Proceed to Delete Institute">';
    echo '</form>';
}
?>

<?php
// Include the footer
include('footer.php');
?>
<html>
    <head>
    <link rel="stylesheet" href="style.css">
</head>
</html>
