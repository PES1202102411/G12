<!-- student.php -->
<?php
// Include the header
include('header.php');

// Include the database configuration
require_once('database.php');

// Check if a student ID is provided in the URL
if (isset($_GET['id'])) {
    $student_id = $_GET['id']; // Ensure proper validation and error handling

    // Retrieve student data from the database based on student_id
    // You will need to use PHP and SQL for this
    // Example: SELECT * FROM Student WHERE id = $student_id
    $query = "SELECT * FROM Student WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Display the table headers
        echo '<h1>Student Details</h1>';

        while ($row = $result->fetch_assoc()) {
            echo '<p>Student ID: ' . $row['id'] . '</p>';
            echo '<p>Name: ' . $row['name'] . ' ' . $row['last_name'] . '</p>';
            echo '<p>Date of Birth: ' . $row['dob'] . '</p>';
            echo '<p>PESAT Score: ' . $row['pessat_score'] . '</p>';
            echo '<p>KCET Score: ' . $row['kcet_score'] . '</p>';
            echo '<p>Entrance Test: ' . $row['entrance_test'] . '</p>';
            echo '<p>Category: ' . $row['category'] . '</p>';
            echo '<p>Email: ' . $row['email'] . '</p>';
            echo '<p>Preference 1: ' . $row['preference1'] . '</p>';
            echo '<p>Preference 2: ' . $row['preference2'] . '</p>';
            // Add more details as needed

            // Include a link to go back to the student list
            echo '<a href="student.php">Back to Student List</a>';

            // Include a link to edit student details
            echo '<a href="edit_student.php?id=' . $student_id . '">Edit Student</a>';

            // Include a link to delete the student
            echo '<a href="delete_student.php?id=' . $student_id . '">Delete Student</a>';
        }
    } else {
        echo "No student found with ID: " . $student_id;
    }

    $stmt->close();
} else {
    // Display the list of students
    echo '<h1>Student List</h1>';

    // Query to retrieve student data from the database
    $query = "SELECT * FROM Student";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Display the table headers
        echo '<table>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Date of Birth</th>
                    <th>PESAT Score</th>
                    <th>KCET Score</th>
                    <th>Entrance Test</th>
                    <th>Category</th>
                    <th>Email</th>
                    <th>Preference 1</th>
                    <th>Preference 2</th>
                    <!-- Add more table headers for other student attributes -->
                </tr>';

        // Display student data from the database
        while ($row = $result->fetch_assoc()) {
            echo '<tr>
                    <td>' . $row['id'] . '</td>
                    <td>' . $row['name'] . '</td>
                    <td>' . $row['last_name'] . '</td>
                    <td>' . $row['dob'] . '</td>
                    <td>' . $row['pessat_score'] . '</td>
                    <td>' . $row['kcet_score'] . '</td>
                    <td>' . $row['entrance_test'] . '</td>
                    <td>' . $row['category'] . '</td>
                    <td>' . $row['email'] . '</td>
                    <td>' . $row['preference1'] . '</td>
                    <td>' . $row['preference2'] . '</td>
                    <!-- Add more table cells for other student attributes -->
                </tr>';
        }

        echo '</table>';
    } else {
        echo "No students found.";
    }
}

// Include the footer
include('footer.php');
?>
<html>
    <head>
    <link rel="stylesheet" href="style.css">
</head>
</html>