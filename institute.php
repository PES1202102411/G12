<!-- institute.php -->
<?php
// Include the header
include('header.php');
?>

<h1>Institute List</h1>

<?php
// Include the database configuration
require_once('database.php');

// Query to retrieve institute data from the database
$query = "SELECT * FROM Institute";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Display the table headers
    echo '<table>
            <tr>
                <th>Institute ID</th>
                <th>Name</th>
                <th>Location</th>
                <th>Capacity</th>
                <th>Number of Branches</th>
                <th>Email</th>
                <th>Contact No</th>
                <!-- Add more table headers for other institute attributes -->
            </tr>';

    // Display institute data from the database
    while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>' . $row['id'] . '</td>
                <td>' . $row['name'] . '</td>
                <td>' . $row['location'] . '</td>
                <td>' . $row['capacity'] . '</td>
                <td>' . $row['num_branches'] . '</td>
                <td>' . $row['email'] . '</td>
                <td>' . $row['contact_no'] . '</td>
                <!-- Add more table cells for other institute attributes -->
              </tr>';
    }

    echo '</table>';
} else {
    echo "No institutes found.";
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
