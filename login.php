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

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name)){    //jika kedua data tidak kosong dan username bukanlah angka
            //baca data dari database
            $query = "SELECT * FROM pengguna WHERE user_name = '$user_name' LIMIT 1";         //mencari data user_name yang sama dengan $user_name di tabel pengguna (limit 1)
            
            $result = mysqli_query($conn, $query);

            if($result && mysqli_num_rows($result) > 0){                    //jika $result ada dan baris data > 0 (data tidak kosong)
                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['password'] === $password){
                    $_SESSION['user_id'] = $user_data['user_id'];           //digunakan untuk mengset sesi pengguna menjadi user_idnya agar tidak redirect terus menerus (sudah masuk)
                                                                            //Catatan : user_id harus int (index array)
                    header("Location: index.php");
                    die;
                }
                else{
                    echo "Password salah";
                }
            }
            else{
                echo "Username tidak ditemukan";
            }
        }
        else{
            echo "Informasi yang dimasukkan tidak valid";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <div id="box">
        <form method="post">
            <div>Login</div>
            <input type="text" name="user_name"><br><br>
            <input type="password" name="password"><br><br>

            <input type="submit" value="Login"><br><br>

            <a href="daftar.php">Daftar</a>
        </form>
    </div>
</body>
</html>