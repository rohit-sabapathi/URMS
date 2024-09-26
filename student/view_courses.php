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

$course_sql = "SELECT * FROM courses WHERE course_id = '{$student['course_id']}'";
$course_result = $conn->query($course_sql);
$course = $course_result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Enrolled Courses</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Enrolled Course</h2>
        <p>Course Name: <?php echo $course['course_name']; ?></p>
    </div>
</body>
</html>
