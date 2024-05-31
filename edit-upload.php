<?php
include "config.php";

if(isset($_GET['id'])) {
    $id_gambar = $_GET['id'];

    // Fetch image details from the database
    $query = "SELECT * FROM gambar WHERE id_gambar = $id_gambar";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);

    if(!$row) {
        // Handle invalid ID
        echo "Invalid Image ID";
        exit;
    }
} else {
    // Handle missing ID
    echo "Image ID not provided";
    exit;
}
?>


