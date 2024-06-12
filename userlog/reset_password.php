<?php
session_start();
if (!isset($_SESSION['student_id'])) {
    header("Location: forgot_password.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alumniportal";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background-color: rgb(139, 60, 64);">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <h2 class="text-center mt-5 text-white">Reset Password</h2>
            <form action="update_password.php" method="post" class="mt-4">
                <div class="form-group">
                    <label for="new_password" class="text-white">New Password:</label>
                    <input type="password" id="new_password" name="new_password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
