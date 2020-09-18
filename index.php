<?php 
session_start();

if ( !isset($_SESSION["login"])){
    header("Location: login.php");
}

require 'functions.php'; 
// menampilkan mahsiswa yan terbaru dengan tambahan querry "ORDER BY 'id' DESC"
$mahasiswa = query("SELECT * FROM mahasiswa");

// tombol cari ditekan
if ( isset($_POST["cari"])){
    $mahasiswa = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP & mySQL</title>
</head>
 
<body>

    <a href="logout.php">logout</a>

    <h1>Data Mahasiswa</h1>
    <a href="tambah.php">Tambah Data</a> <br> <br>

    <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="cari nim / nama" autocomplete="off">
        <button type="submit" name="cari">Cari!</button>
    </form>

    <br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>Gambar</th>
            <th>Status</th>
        </tr>
        <?php $i=1; ?>
        <?php foreach ( $mahasiswa as $mhs) : ?>
        <tr>
            
            <td><?= $i; ?></td>
            <td><?= $mhs["nama"]?></td>
            <td><?= $mhs["nrp"];?></td>
            <td><?= $mhs["email"]; ?></td>
            <td><?= $mhs["jurusan"]; ?></td>
            <td><img src="img/<?= $mhs["gambar"]?>" width="100px" height="100px"></td>
            <td>
                <a href="ubah.php?id=<?= $mhs["id"]?>">Ubah |</a>
                <a href="hapus.php?id=<?= $mhs["id"]?>" onclick="return confirm('yakin?');">Hapus</a>
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>

</html>