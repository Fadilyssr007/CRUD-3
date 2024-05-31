<?php
include("config.php");
// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['aksi'])){
// ambil data dari formulir
 if($_POST['aksi']=='add'){
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$agama = $_POST['agama'];
$sekolah_asal = $_POST['sekolah_asal'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$no_telepon = $_POST['no_telepon'];
$email = $_POST['email'];
$desa_kelurahan = $_POST['desa_kelurahan'];
$kecamatan = $_POST['kecamatan'];
$kabupaten = $_POST['kabupaten'];
$provinsi = $_POST['provinsi'];
$kode_pos = $_POST['kode_pos'];
// Format tanggal_lahir sesuai dengan format MySQL (YYYY-MM-DD)
$tanggal_mysql = date("Y-m-d", strtotime($tanggal_lahir));
// buat query
$sql = "INSERT INTO pendaftaran (nama, alamat, jenis_kelamin, agama, sekolah_asal, tanggal_lahir, no_telepon, email, desa_kelurahan, kecamatan, kabupaten, provinsi,kode_pos)
VALUE ('$nama', '$alamat', '$jenis_kelamin', '$agama', '$sekolah_asal', '$tanggal_lahir', '$no_telepon', '$email', '$desa_kelurahan', '$kecamatan', '$kabupaten', '$provinsi','$kode_pos')";
$query = mysqli_query($db, $sql);
// apakah query simpan berhasil?
if($query) {
header('Location: index.php?status=sukses');

// kalau berhasil alihkan ke halaman index.php dengan status-sukses header('Location: index.php?status=sukses');

} else {

// kalau gagal alihkan ke halaman indek.php dengan status=gagal header('Location: index.php?status=gagal');

}

}else if($_POST['aksi']=='edit'){

$id_pendaftaran =$_POST['id_pendaftaran'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$agama = $_POST['agama'];
$sekolah_asal = $_POST['sekolah_asal'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$no_telepon = $_POST['no_telepon'];
$email = $_POST['email'];
$desa = $_POST['desa_kelurahan'];
$kecamatan = $_POST['kecamatan'];
$kabupaten = $_POST['kabupaten'];
$provinsi = $_POST['provinsi'];
$kode_pos = $_POST['kode_pos'];

$tanggal_mysql = date("Y-m-d", strtotime($tanggal_lahir)); 
$sql = "UPDATE pendaftaran SET nama ='$nama', alamat='$alamat', jenis_kelamin='$jenis_kelamin', agama= '$agama', sekolah_asal='$sekolah_asal', tanggal_lahir='$tanggal_lahir', no_telepon='$no_telepon', email='$email', desa_kelurahan='$desa', kecamatan='$kecamatan',kabupaten='$kabupaten', provinsi='$provinsi', kode_pos='$kode_pos'
WHERE id_pendaftaran='$id_pendaftaran';";
$query = mysqli_query($db, $sql);

if($query){

    header('Location: index.php?status=sukses');
    
    } else {
    
    header('Location: index.php?status=gagal');
    
    }

}
}
    if(isset($_GET['hapus']) ){
    
    // ambil id dari query string
    $id_pendaftaran = $_GET['hapus'];
    // buat query hapus
    
    $sql ="DELETE FROM pendaftaran WHERE id_pendaftaran='$id_pendaftaran';";
    $query = mysqli_query($db, $sql);
    
    // apakah query hapus berhasil?
    
    if( $query){
    
    header('Location: index.php?status=sukses');
    
    } else {
    
    header('Location: index.php?status=gagal');
    
    }
    
    }
    
    ?>