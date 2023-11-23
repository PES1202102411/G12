<?php
// Include the header
include('header.php');

// Include the database configuration
require_once('database.php');

// Initialize variables to hold branch data
$name = $institute_id = $credits = $description = $capacity = '';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and validate the form data
    $name = $_POST['name'];
    $institute_id = $_POST['institute_id'];
    $credits = $_POST['credits'];
    $description = $_POST['description'];
    $capacity = $_POST['capacity'];

    // Add more validation and error handling here

    // Insert the branch data into the database
    $query = "INSERT INTO Branch (name, institute_id, credits, description, capacity) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sisss", $name, $institute_id, $credits, $description, $capacity);

    if ($stmt->execute()) {
        // Branch added successfully
        echo "Branch added successfully!";
    } else {
        // Error adding branch
        echo "Error adding branch: " . $conn->error;
    }

    $stmt->close();
}
?>

<!-- Display the branch input form -->
<h1>Add Branch</h1>
<form method="POST" action="add_branch.php">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>

    <label for="institute_id">Institute ID:</label>
    <input type="number" name="institute_id" id="institute_id" required>

    <label for="credits">Credits:</label>
    <input type="number" name="credits" id="credits" required>

    <label for="description">Description:</label>
    <input type="text" name="description" id="description">

    <label for="capacity">Capacity:</label>
    <input type="number" name="capacity" id="capacity" required>

    <!-- Add more fields as needed -->

    <input type="submit" value="Add Branch">
</form>

<?php
// Include the footer
include('footer.php');
?>
<html>
    <head>
    <link rel="stylesheet" href="style.css">
</head>
</html>
