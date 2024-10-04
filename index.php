<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Portal</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .overlay-text {
            position: absolute;
            top: 10%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }
        .overlay-btn{
            position: absolute;
            top: 79%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }
        .overlay {
            position: relative;
        }

        .img-overlay {
            width: 100%;
            height: auto;
            opacity: 0.85; /* Optional: Adjust the opacity of the image */
        }
    </style>
</head>
<body>

    <div class="container-fluid p-0">
        <div class="overlay">
            <!-- College Photo that spans full width -->
            <img src="college.jpg" alt="College Photo" class="img-fluid img-overlay w-100">

            <!-- Overlay text and button -->
            <div class="overlay-text text-center">
                <h1>Welcome to Stanford University</h1>
            </div>
            <div class="overlay-btn text -center">
                <a href="login.php" class="btn btn-primary btn-lg mt-3">Click here to see the results</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
