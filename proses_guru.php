<?php
include("config.php");
// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['aksi'])){
// ambil data dari formulir
 if($_POST['aksi']=='add'){
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$no_telepon = $_POST['no_telepon'];
$email = $_POST['email'];
// Format tanggal_lahir sesuai dengan format MySQL (YYYY-MM-DD)

$sql = "INSERT INTO guru (nama, alamat, jenis_kelamin,  no_telepon, email)
VALUE ('$nama', '$alamat', '$jenis_kelamin',  '$no_telepon', '$email')";
$query = mysqli_query($db, $sql);
// apakah query simpan berhasil?
if($query) {
    header('Location: index_guru.php?status=sukses');
 
// kalau berhasil alihkan ke halaman index_guru.php dengan status-sukses header('Location: index_guru.php?status=sukses');

} else {

// kalau gagal alihkan ke halaman indek.php dengan status=gagal header('Location: index_guru.php?status=gagal');

}

}else if($_POST['aksi']=='edit'){

$id_guru =$_POST['id_guru'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];

$no_telepon = $_POST['no_telepon'];
$email = $_POST['email'];


$sql = "UPDATE guru SET nama ='$nama', alamat='$alamat', jenis_kelamin='$jenis_kelamin',  no_telepon='$no_telepon', email='$email'WHERE id_guru='$id_guru';";
$query = mysqli_query($db, $sql);

if($query){

    header('Location: index_guru.php?status=sukses');
    
    } else {
    
    header('Location: index_guru.php?status=gagal');
    
    }

}
}
    if(isset($_GET['hapus']) ){
    
    // ambil id dari query string
    $id_guru = $_GET['hapus'];
    // buat query hapus
    
    $sql ="DELETE FROM guru WHERE id_guru='$id_guru';";
    $query = mysqli_query($db, $sql);
    
    // apakah query hapus berhasil?
    
    if( $query){
    
    header('Location: index_guru.php?status=sukses');
    
    } else {
    
    header('Location: index_guru.php?status=gagal');
    
    }
    
    }
    
    ?>