<?php

include("config.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

     // ambil data dari formulir
     $nama = $_POST['nama'];
     $ukuran = $_POST['ukuran'];
     $tipe = $_POST['tipe'];
     
     
     // buat query
     $sql = "INSERT INTO gambar (nama, ukuran, tipe) VALUE ('$nama', '$ukuran', '$tipe')";
     $query = mysqli_query($db, $sql);

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: data_upload.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>