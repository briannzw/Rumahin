<?php
    session_start();                        //Untuk mengakses $_SESSION, diperlukan session_start()
    include("koneksi.php");
    include("fungsi.php");

    $user_data = cek_login($conn);

    if(!$user_data){
        header("Location: login.php");
        die;
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Website</title>
</head>

<body>
    <a href="logout.php">Keluar</a>
    <h1>Ini adalah halaman depan.</h1>
    <br>Halo, <?php echo $user_data['user_name'] ?>
    <a href="jual.php">Halaman Jual</a>
</body>
<html>