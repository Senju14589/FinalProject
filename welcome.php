<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>logout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    body {
        font: 14px sans-serif;
        text-align: center;
    }
    </style>
</head>

<body>
    <h1 class="my-5">สวัสดี <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h1>
    <p><b>คุณต้องการออกจากระบบใช่หรือไม่</b></p>
    <p>
        <a href="index.php" class="btn btn-primary">ไม่ </a>
        <a href="logout.php" class="btn btn-danger ml-3">ออกจากระบบ</a>

    </p>
</body>

</html>