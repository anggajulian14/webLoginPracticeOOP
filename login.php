<?php
$koneksi = mysqli_connect("localhost", "root", "", "web");

if(isset($_POST['submit'])){
    $email = $_POST['txt_email'];
    $pass = $_POST['txt_pass'];

    if (!empty(trim($email)) && !empty(trim($pass))) {
        // Select data berdasarkan email dari database
        $query = "SELECT * FROM user_detail WHERE user_email = '$email'";
        $result = mysqli_query($koneksi, $query);
        $num = mysqli_num_rows($result);

        if ($num != 0) {
            $row = mysqli_fetch_array($result);
            $passVal = $row['user_password'];

            if ($email == $row['user_email'] && $passVal == $pass) {
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_email'] = $email;
                $_SESSION['user_fullname'] = $row['user_fullname'];
                $_SESSION['id_level'] = $row['id_level'];
            
                if ($_SESSION['id_level'] == 2) {
                    $user_fullname = $_SESSION['user_fullname'];
                    header("Location: welcome.php?user_fullname=$user_fullname");
                    exit();
                } elseif ($_SESSION['id_level'] == 1) {
                    $user_fullname = $_SESSION['user_fullname'];
                    header("Location: home.php?user_fullname=$user_fullname");
                    exit();
                }
            } else {
                $error = 'Email atau password salah!!';
                header('Location: login.php?error=' . urlencode($error));
            }
            
        } else {
            $error = 'User tidak ditemukan!!';
            header('Location: login.php?error=' . urlencode($error));
        }
    } else {
        $error = 'Data tidak boleh kosong !!';
        header('Location: login.php?error=' . urlencode($error));
        exit();
    }
}elseif (isset($_POST['register'])) {
    header('Location: register.php');
    exit();
}5
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
   
</head>

<body>
    <div class="container">
        <h2>Halaman Login</h2>
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 1) {
            echo '<p class="error-message">Email atau password salah!</p>';
        } else if (isset($_GET['error']) && $_GET['error'] == 2) {
            echo '<p class="error-message">User tidak ditemukan!</p>';
        }
        ?>
        <form action="login.php" method="POST">
            <input type="text" name="txt_email" placeholder="Email"><br>
            <input type="password" name="txt_pass" placeholder="Password"><br>
            <button type="submit" name="submit">Sign In</button>
            <button type="submit" name="register">Register</button>
        </form>
    </div>
</body>

</html>
