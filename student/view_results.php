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

$result_sql = "SELECT * FROM results WHERE student_id = '{$student['student_id']}'";
$result_result = $conn->query($result_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Results</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Your Results</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Grade</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result_result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['subject_name']; ?></td>
                    <td><?php echo $row['grade']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
