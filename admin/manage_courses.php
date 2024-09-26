<?php
session_start();
if ($_SESSION['role'] !== 'admin') {
    header('Location: ../login.php');
    exit();
}

require '../db_connect.php';

// Fetch courses from the database
$courses_sql = "SELECT * FROM courses";
$courses_result = $conn->query($courses_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Courses</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Manage Courses</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Course ID</th>
                    <th>Course Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $courses_result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['course_id']; ?></td>
                    <td><?php echo $row['course_name']; ?></td>
                    <td>
                        <a href="edit_course.php?course_id=<?php echo $row['course_id']; ?>" class="btn btn-warning">Edit</a>
                        <a href="delete_course.php?course_id=<?php echo $row['course_id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
