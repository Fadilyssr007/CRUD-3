<?php

// Load file koneksi.php
include ("config.php");

if (isset($_POST['save'])) {

    // Ambil Data yang Dikirim dari Form
    if ($_POST['save'] == 'add') {

        $nama_file = $_FILES['gambar']['name'];
        $ukuran_file = $_FILES['gambar']['size'];
        $tipe_file = $_FILES['gambar']['type'];
        $tmp_file = $_FILES['gambar']['tmp_name'];

        // Set path folder tempat menyimpan gambarnya
        $path = "image/" . $nama_file;

        // Proses upload
        if (move_uploaded_file($tmp_file, $path)) { // Cek apakah gambar berhasil diupload atau tidak

            // Proses simpan ke Database
            $query = "INSERT INTO gambar (nama, ukuran, tipe) VALUES('$nama_file','$ukuran_file','$tipe_file')";
            $sql = mysqli_query($db, $query);

            if ($sql) { // Cek jika proses simpan ke database sukses atau tidak
                // Jika Sukses, Lakukan :
                header("location: data_upload.php"); // Redirect ke halaman data_upload.php
            } else {
                // Jika Gagal, Lakukan :
                header('Location: data_upload.php?status=gagal');
            }
        } else {
            // Jika gambar gagal diupload, Lakukan :
            header('Location: data_upload.php?status=gagal');
        }

    } else if ($_POST['save'] == 'edit') {

        $id_gambar = $_POST['id_gambar'];
        $nama = $_POST['nama'];
        $ukuran = $_POST['ukuran'];
        $tipe = $_POST['tipe'];

        // Proses update gambar
        if ($_FILES['gambar']['size'] > 0) {
            $new_nama_file = $_FILES['gambar']['name'];
            $new_ukuran_file = $_FILES['gambar']['size'];
            $new_tipe_file = $_FILES['gambar']['type'];
            $new_tmp_file = $_FILES['gambar']['tmp_name'];

            $new_path = "image/" . $new_nama_file;

            if (move_uploaded_file($new_tmp_file, $new_path)) {
                // Update data gambar dengan gambar baru
                $sql = "UPDATE gambar SET nama='$new_nama_file', ukuran='$new_ukuran_file', tipe='$new_tipe_file' WHERE id_gambar='$id_gambar'";
                $query = mysqli_query($db, $sql);
            }
        } else {
            // Update data gambar tanpa mengganti gambar
            $sql = "UPDATE gambar SET nama='$nama', ukuran='$ukuran', tipe='$tipe' WHERE id_gambar='$id_gambar'";
            $query = mysqli_query($db, $sql);
        }

        if ($query) {
            header('Location: data_upload.php?status=sukses');
        } else {
            header('Location: data_upload.php?status=gagal');
        }
    }
}

if (isset($_GET['hapus'])) {
    // ambil id dari query string
    $id_gambar = $_GET['hapus'];
    // buat query hapus
    $sql = "DELETE FROM gambar WHERE id_gambar='$id_gambar';";
    $query = mysqli_query($db, $sql);

    // apakah query hapus berhasil?
    if ($query) {
        header('Location: data_upload.php?status=sukses');
    } else {
        header('Location: data_upload.php?status=gagal');
    }
}

?>
