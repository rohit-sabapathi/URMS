<?php
session_start();
if ($_SESSION['role'] !== 'teacher') {
    header('Location: ../login.php');
    exit();
}

require '../db_connect.php';

if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject_name = $_POST['subject_name'];
    $grade = $_POST['grade'];

    $sql = "INSERT INTO results (student_id, subject_name, grade) VALUES ('$student_id', '$subject_name', '$grade')";
    if ($conn->query($sql)) {
        echo "Result uploaded successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Results</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Upload Results for Student ID: <?php echo $student_id; ?></h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="subject_name">Subject Name:</label>
                <input type="text" class="form-control" id="subject_name" name="subject_name" required>
            </div>
            <div class="form-group">
                <label for="grade">Grade:</label>
                <input type="text" class="form-control" id="grade" name="grade" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload Result</button>
        </form>
    </div>
</body>
</html>
