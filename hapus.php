<?php  
require "functions.php";
$id = $_GET["id"];

if ( hapus($id) > 0 ){
    echo "
       <script>
            alert('Data Berhasil di Hapus !');
            document.location.href = 'index.php';
       </script>";
} else {
    echo "
    <script>
         alert('Data gagal di Hapus !');
         document.location.href = 'tambah.php';
    </script>";
}

?>