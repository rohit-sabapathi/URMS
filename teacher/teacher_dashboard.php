<?php
session_start();
if ($_SESSION['role'] !== 'teacher') {
    header('Location: ../login.php');
    exit();
}

require '../db_connect.php';

$students_sql = "SELECT * FROM students";
$students_result = $conn->query($students_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>All Students</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Course ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $students_result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['student_id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['course_id']; ?></td>
                    <td><a href="upload_result.php?student_id=<?php echo $row['student_id']; ?>" class="btn btn-primary">Upload Results</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="../logout.php" class="btn btn-danger mt-3">Logout</a>
    </div>
</body>
</html>
