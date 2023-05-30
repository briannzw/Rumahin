<?php
    session_start();                        //Untuk mengakses $_SESSION, diperlukan session_start()
    include("koneksi.php");                 //$conn akan didapatkan dari sini
    include("fungsi.php");

    if(cek_login($conn)){
        header("Location: index.php");
        die;
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        //Ada sesuatu yang telah di POST
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password2'];

        if(!empty($user_name) && !empty($password) && !empty($password_confirm) && $password === $password_confirm && !is_numeric($user_name)){    //jika kedua data tidak kosong dan username bukanlah angka
            //simpan ke database
            $user_id = create_id(20);
            $query = "INSERT INTO pengguna (user_id, user_name, password) VALUES ('$user_id', '$user_name', '$password')";

            mysqli_query($conn, $query);

            header("Location: login.php");
            die;
        }
        else{
            echo "Informasi yang dimasukkan tidak valid";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar</title>
</head>
<body>
    <div id="box">
        <form method="post">
            <div>Daftar</div>
            <input type="text" name="user_name"><br><br>
            <input type="password" name="password"><br><br>
            <input type="password" name="password2"><br><br>

            <input type="submit" value="Daftar"><br><br>

            Sudah memiliki akun? <a href="login.php">Login</a>
        </form>
    </div>
</body>
</html>