<?php
// Include the header
include('header.php');

// Include the database configuration
require_once('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
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

    // Insert data into the database
    $query = "INSERT INTO Student (name, last_name, dob, pessat_score, kcet_score, entrance_test, category, email, preference1, preference2)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssiisssss", $name, $last_name, $dob, $pessat_score, $kcet_score, $entrance_test, $category, $email, $preference1, $preference2);

    if ($stmt->execute()) {
        echo "Student added successfully!";
    } else {
        echo "Error adding student: " . $conn->error;
    }

    $stmt->close();
}
?>

<h1>Add Student</h1>

<form method="POST" action="add_student.php">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>

    <label for="last_name">Last Name:</label>
    <input type="text" name="last_name" id="last_name" required>

    <label for="dob">Date of Birth:</label>
    <input type="date" name="dob" id="dob" required>

    <label for="pessat_score">PESAT Score:</label>
    <input type="number" name="pessat_score" id="pessat_score">

    <label for="kcet_score">KCET Score:</label>
    <input type="number" name="kcet_score" id="kcet_score">

    <label for="entrance_test">Entrance Test:</label>
    <input type="text" name="entrance_test" id="entrance_test">

    <label for="category">Category:</label>
    <input type="text" name="category" id="category">

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>

    <label for="preference1">Preference 1:</label>
    <input type="text" name="preference1" id="preference1">

    <label for="preference2">Preference 2:</label>
    <input type="text" name="preference2" id="preference2">

    <input type="submit" value="Add Student">
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
