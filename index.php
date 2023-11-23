<?php
// Include the header
include('header.php');
?>

<div class="container mt-4">
    <h1>Welcome to Your Application</h1>

    <ul class="list-group">
        <li class="list-group-item">
            <a href="student.php">Students</a>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><a href="student.php">View Students</a></li>
                <li class="list-group-item"><a href="add_student.php">Add Student</a></li>
                <li class="list-group-item"><a href="edit_student.php">Edit Student</a></li>
                <li class="list-group-item"><a href="delete_student.php">Delete Student</a></li>
            </ul>
        </li>
        <li class="list-group-item">
            <a href="institute.php">Institutes</a>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><a href="institute.php">View Institutes</a></li>
                <li class="list-group-item"><a href="add_institute.php">Add Institute</a></li>
                <li class="list-group-item"><a href="edit_institute.php">Edit Institute</a></li>
                <li class="list-group-item"><a href="delete_institute.php">Delete Institute</a></li>
            </ul>
        </li>
        <li class="list-group-item">
            <a href="branch.php">Branches</a>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><a href="branch.php">View Branches</a></li>
                <li class="list-group-item"><a href="add_branch.php">Add Branch</a></li>
                <li class="list-group-item"><a href="edit_branch.php">Edit Branch</a></li>
                <li class="list-group-item"><a href="delete_branch.php">Delete Branch</a></li>
            </ul>
        </li>
        <!-- Add links for other entities as needed -->
    </ul>
</div>

<?php
// Include the footer
include('footer.php');
?>
