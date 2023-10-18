<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}

$userEmail = $_SESSION['user_email'];
$userFullName = $_SESSION['user_fullname'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .welcome-container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px #000000;
            margin-top: 100px;
        }

        h2 {
            text-align: center;
        }

        p {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="welcome-container">
        <h2>Welcome, <?php echo $userFullName; ?>!</h2>
        <p>You are logged in as <?php echo $userEmail; ?>.</p>
        <p><a href="login.php">Logout</a></p>
    </div>
</body>

</html>
