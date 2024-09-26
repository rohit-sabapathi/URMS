<?php
session_start();
if ($_SESSION['role'] !== 'student') {
    header('Location: ../login.php');
    exit();
}

require '../db_connect.php';

$user_id = $_SESSION['user_id'];
$student_sql = "SELECT * FROM students WHERE user_id = '$user_id'";
$student_result = $conn->query($student_sql);
$student = $student_result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Welcome, <?php echo $student['name']; ?></h2>
        <a href="view_courses.php" class="btn btn-info mt-3">View Enrolled Courses</a>
        <a href="view_results.php" class="btn btn-success mt-3">View Your Results</a>
    </div>
</body>
</html>
