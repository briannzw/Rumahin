<?php
    session_start();
    include("koneksi.php");
    include("fungsi.php");

    $user_data = cek_login($conn);

    if(!$user_data){                                    //jika user belum login ($user_data tidak valid)
        header("Location: login.php");
        die;
    }

    $daftar_jual = load_array_jual($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Penjualan</title>
</head>
<body>
    <a href="index.php">Back to index</a>
    <h1>Daftar Jual</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>                               <!--Hanya dapat diakses oleh admin-->
            <th>Gambar</th>
            <th>Nama Bangunan</th>
            <th>Tipe Bangunan</th>
            <th>Luas Bangunan</th>
            <th>Harga Bangunan</th>
            <th>Nama Penjual</th>
            <th>Tanggal</th>
        </tr>
        <?php $i = 1 ?>
        <?php foreach($daftar_jual as $item) : ?>
        <tr>
            <td><?php echo $i ?></td>
            <td>
                <a href="">Edit</a> | 
                <a href="">Hapus</a>
            </td>
            <td>
                <img src="" width="50px"><?php echo $item["gambar_bangunan"] ?>
            </td>
            <td><?php echo $item["nama_bangunan"] ?></td>
            <td><?php echo $item["tipe_bangunan"] ?></td>
            <td>
                <?php echo $item["luas_bangunan"] ?> m<sup>2</sup>
            </td>
            <td>Rp <?php echo $item["harga_bangunan"] ?></td>
            <td><?php echo $item["nama_penjual"] ?></td>
            <td><?php echo $item["date"] ?></td>
        </tr>
        <?php $i++ ?>
        <?php endforeach; ?>
    </table>
</body>
</html>