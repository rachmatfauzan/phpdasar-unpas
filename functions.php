<?php  
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// ambil data mahasiswa dari obhjek result
// ada 4 cara untuk menangkap objek
// mysqli_fetch_row(); // hanya menangkap id [index] row baris dalamisi database(array numerik)
// mysqli_fetch_assoc(); // menangkap array associative 
// mysqli_fetch_array();menangkap 2-2 nya [id],[arrayssoc]
// mysqli_fetch_object();

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query); // mengambil lemari
    $rows = []; // membuat wadah untuk isi lemari
    while( $row = mysqli_fetch_assoc($result)){ // mengambil isi lemari
        $rows[]= $row;  // letak isi lemari kedalam wadah
    }
    return $rows;
}


function tambah($data){
    global $conn; 
    // ambil data dari tiap elemen dalam form
    $nrp = htmlspecialchars( $data["nrp"]);
    $nama = htmlspecialchars( $data["nama"]) ;
    $email = htmlspecialchars($data["email"]) ;
    $jurusan = htmlspecialchars($data["jurusan"]) ;
    $gambar = htmlspecialchars($data["gambar"]) ;

    // query insert data
    $query = "INSERT INTO mahasiswa VALUES
            ('','$nama', '$nrp', '$email', '$jurusan', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa where id = $id");

    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;
    // ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $nrp = htmlspecialchars( $data["nrp"]);
    $nama = htmlspecialchars( $data["nama"]) ;
    $email = htmlspecialchars($data["email"]) ;
    $jurusan = htmlspecialchars($data["jurusan"]) ;
    $gambar = htmlspecialchars($data["gambar"]) ;

    // query insert data
    $query = "UPDATE mahasiswa SET 
                nama = '$nama',
                nrp = '$nrp',
                email = '$email',
                jurusan = '$jurusan',
                gambar = '$gambar'
                WHERE id = $id
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword){
    $query = "SELECT * FROM mahasiswa 
                WHERE
                nama LIKE '%$keyword%' OR
                nrp LIKE '%$keyword%'
                
                ";
    return  query($query);
}


function registrasi($data){
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_escape_string($conn, $data["password"]);
    $password2 = mysqli_escape_string($conn,$data["password2"]);

    // cek konfirmasi password
    if ($password != $password2) {
        echo "
            <script>
                alert ('Password tidak sesuai');
            </script>";
            return false;
    }

    // cek usernmae sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username from user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)){
        echo "
            <script>
                alert ('Username telah dipakai');
            </script>";
         return false;
    }
    // enkripsi password

    // tambahkan user baru kedatabase
    mysqli_query($conn, "INSERT INTO user VALUES(
        '',
        '$username',
        '$password'
    )");

    return mysqli_affected_rows($conn);
}
?>