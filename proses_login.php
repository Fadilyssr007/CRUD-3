<?php

include("config.php");

$username = $_POST['username'];

$password = $_POST['password'];

// Query untuk memeriksa apakah username dan password cocok 
$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
 $result = mysqli_query($db, $query);


 if (mysqli_num_rows($result) > 0) {



$_SESSION['username'] = $username;

header("Location: index.php");

} else {

// Data pengguna tidak valid, arahkan kembali ke halaman login
 echo "Login gagal. Silakan coba lagi <a href='login.php'>di sini</a>.";

}

// Tutup koneksi database 
mysqli_close($koneksi);

?>