<!-- branch.php -->
<?php
// Include the header
include('header.php');
?>

<h1>Branch List</h1>

<?php
// Include the database configuration
require_once('database.php');

// Query to retrieve branch data from the database
$query = "SELECT * FROM Branch";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Display the table headers
    echo '<table>
            <tr>
                <th>Branch ID</th>
                <th>Name</th>
                <th>Institute ID</th>
                <th>Credits</th>
                <th>Description</th>
                <th>Capacity</th>
                <!-- Add more table headers for other branch attributes -->
            </tr>';

    // Display branch data from the database
    while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>' . $row['id'] . '</td>
                <td>' . $row['name'] . '</td>
                <td>' . $row['institute_id'] . '</td>
                <td>' . $row['credits'] . '</td>
                <td>' . $row['description'] . '</td>
                <td>' . $row['capacity'] . '</td>
                <!-- Add more table cells for other branch attributes -->
              </tr>';
    }

    echo '</table>';
} else {
    echo "No branches found.";
}

$result->close();
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
