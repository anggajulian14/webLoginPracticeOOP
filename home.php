<?php
require('koneksi.php');
require('query.php');
session_start();

$email = $_GET['user_fullname'];
$obj = new crud();
$data = $obj->lihatData();
$no = 1;
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            text-align: center;
        }

        h1 {
            background-color: #4caf50;
            color: white;
            padding: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #4caf50;
            color: white;
        }

        a {
            text-decoration: none;
            padding: 5px 10px;
            background-color: #4caf50;
            color: white;
            border-radius: 3px;
        }

        a:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Selamat Datang</h1>
        <table>
            <tr>
                <th>No</th>
                <th>Email</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>

        <?php
        if ($data->rowCount() > 0) {
            while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $row['user_email']; ?></td>
            <td><?php echo $row['user_fullname']; ?></td>
            <td><a href="edit.php?id=<?php echo $row['user_id']; ?>">edit</a> 
            <a href="hapus.php?id=<?php echo $row['user_id']; ?>">hapus</a></td>
        </tr>

        <?php
                $no++;
            }
        }
        ?>
    </table>
    <a href="login.php">Logout</a>
</body>
</html>
