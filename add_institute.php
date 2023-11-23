<?php
// Include the header
include('header.php');
?>

<h1>Add Institute</h1>

<form method="POST" action="process_add_institute.php">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>

    <label for="location">Location:</label>
    <input type="text" name="location" id="location" required>

    <label for="capacity">Capacity:</label>
    <input type="number" name="capacity" id="capacity" required>

    <label for="num_branches">Number of Branches:</label>
    <input type="number" name="num_branches" id="num_branches" required>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>

    <label for="contact_no">Contact No:</label>
    <input type="tel" name="contact_no" id="contact_no" required>

    <!-- Add more fields for other institute attributes -->

    <input type="submit" value="Add Institute">
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

