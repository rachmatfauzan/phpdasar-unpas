<?php
session_start();

if ( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'functions.php';

// cek apakah tombol submit sudah di tekan atau belum
if ( isset($_POST["submit"]) ) {
    // cek apakah data berhasil di tambahkan atau tidak
   if (tambah($_POST) > 0 ){
       echo "
       <script>
            alert('Data Berhasil di tambahkan !');
            document.location.href = 'index.php';
       </script>";
   }
   else {
    echo "
    <script>
         alert('Data gagal di tambahkan !');
         document.location.href = 'tambah.php';
    </script>";
   }
    
}    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <style>
        ul li{
            margin: 20px;
        }
    </style>
</head>
<body>
<h1>Tambah Data Mahasiswa</h1>

<form action="" method="post">
    <ul>
        <!-- nrp dan for adalah pasangan -->
        <li>
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" required> 
        </li>
        <li>
        <label for="nrp">NIM</label>
        <input type="text" name="nrp" id="nrp" maxlength="9" required> 
        </li>
        <li>
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
        </li>
        <li>
        <label for="jurusan">Jurusan</label>
        <input type="text" name="jurusan" id="jurusan">
        </li>
        <li>
        <label for="gambar">Gambar</label>
        <input type="text" name="gambar" id="gambar">
        </li>
        <li>
            <button type="submit" name="submit">Tambah Data!</button>
        </li>
    </ul>


</form>




</body>
</html>