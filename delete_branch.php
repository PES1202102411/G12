<!-- delete_branch.php -->
<?php
// Include the header
include('header.php');
?>

<h1>Delete Branch</h1>

<form method="POST" action="process_delete_branch.php">
    <label for="branch_id">Branch ID:</label>
    <input type="text" name="branch_id" id="branch_id" required>
    <input type="submit" value="Proceed to Delete Branch">
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
