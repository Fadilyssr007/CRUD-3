<?php

include("config.php");

if( isset($_GET['id_pendaftaran']) ){

    // ambil id dari query string
    $id = $_GET['id_pendaftaran'];

    // buat query hapus
    $sql = "DELETE FROM pendaftaran WHERE id_pendaftaran=$id";
    $query = mysqli_query($db, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: index.php');
    } else {
        die("gagal menghapus...");
    }

}
?>