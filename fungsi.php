<?php
    function cek_login($conn){
        if(isset($_SESSION['user_id'])){
            $id = $_SESSION['user_id'];
            $query = "SELECT * FROM pengguna WHERE user_id = $id LIMIT 1";  //mencari data user_id yang sama dengan $id di tabel pengguna (limit 1)

            $result = mysqli_query($conn, $query);
            if($result && mysqli_num_rows($result) > 0){                    //jika $result ada dan baris data > 0 (data tidak kosong)
                $user_data = mysqli_fetch_assoc($result);
                return $user_data;
            }
        }
        //jika semua yang di atas tidak bekerja, maka redirect pengguna
        return null;
    }

    function check_user_id($str){
        global $conn;
        $query = "SELECT * FROM pengguna";
        $result = mysqli_query($conn, $query);
        $checkKey = false;
        if($result && mysqli_num_rows($result) > 0){                    //jika $result ada dan baris data > 0 (data tidak kosong)
            while($row = mysqli_fetch_assoc($result)){                  //selama data dari setiap row diambil masih ada
                if($row['user_id'] == $str){
                    $checkKey = true;
                    break;
                }
            }
        }
        return $checkKey;
    }

    function create_id($length){
        $text = "0123456789";
        $randStr = substr(str_shuffle($text), 0, $length);

        $checkKey = check_user_id($randStr);

        while($checkKey){                          //selama masih sama, random ulang
            $randStr = substr(str_shuffle($text), 0, $length);
            $checkKey = check_user_id($randStr);
        }

        return $randStr;
    }

    function load_array_jual(){
        global $conn;
        $result = mysqli_query($conn, "SELECT * FROM daftar_jual");

        if($result && mysqli_num_rows($result) > 0){
            $rows = [];
            while($row = mysqli_fetch_assoc($result)){
                $rows[] = $row;                                     //menyimpan data per baris dari database ke array rows
            }
            return $rows;
        }

        return null;
    }
?>