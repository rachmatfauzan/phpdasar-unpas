<?php  
require 'functions.php';

// ambil id dari URL
$id = $_GET["id"];
// querry data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];
// cek apakah tombol submit telah ditekan atau belum
if ( isset($_POST["submit"]) ) {
    // cek apakah data berhasil diubah atau tidak
    if ( ubah($_POST) > 0 ) {
        echo "
        <script>
            alert ('data berhasil diubah');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert ('Gagal Merubah data');
        </script>        
        ";
        var_dump(ubah($conn));
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Mahasiswa</title>
    <style>
        ul li{
            margin: 20px;
        }
    </style>
</head>
<body>
<h1>Ubah Data Mahasiswa</h1>

<form action="" method="post">
    <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
    <ul>
        <!-- nrp dan for adalah pasangan -->
        <li>
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" value="<?= $mhs["nama"]?>" required > 
        </li>
        <li>
        <label for="nrp">NIM</label>
        <input type="text" name="nrp" id="nrp" maxlength="9" value="<?= $mhs["nrp"]?>" required> 
        </li>
        <li>
        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="<?= $mhs["email"]?>">
        </li>
        <li>
        <label for="jurusan">Jurusan</label>
        <input type="text" name="jurusan" id="jurusan" value="<?= $mhs["jurusan"]?>">
        </li>
        <li>
        <label for="gambar">Gambar</label>
        <input type="text" name="gambar" id="gambar" value="<?= $mhs["gambar"]?>">
        </li>
        <li>
            <button type="submit" name="submit" onclick="return confirm('Yakin LO !');">Ubah Data</button>
        </li>
    </ul>


</form>




</body>
</html>