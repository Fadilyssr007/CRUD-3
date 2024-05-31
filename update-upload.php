<?php
include "config.php";

if(isset($_POST['update'])) {
    $id_gambar = $_POST['id_gambar'];

    // Fetch existing image details
    $query = "SELECT * FROM gambar WHERE id_gambar = $id_gambar";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);

    if(!$row) {
        // Handle invalid ID
        echo "Invalid Image ID";
        exit;
    }

    // Process the new image if provided
    if(isset($_FILES['new_gambar']) && $_FILES['new_gambar']['size'] > 0) {
        $nama_file = $_FILES['new_gambar']['name'];
        $ukuran_file = $_FILES['new_gambar']['size'];
        $tipe_file = $_FILES['new_gambar']['type'];
        $tmp_file = $_FILES['new_gambar']['tmp_name'];

        // Set path folder for the new image
        $path = "image/".$nama_file;

        // Move the new image to the specified path
        if(move_uploaded_file($tmp_file, $path)) {
            // Update image details in the database
            $update_query = "UPDATE gambar SET nama='$nama_file', ukuran='$ukuran_file', tipe='$tipe_file' WHERE id_gambar=$id_gambar";
            $update_result = mysqli_query($db, $update_query);

            if($update_result) {
                // Redirect to the image list page
                header("location: data_upload.php");
            } else {
                // Handle database update failure
                echo "Failed to update image details in the database.";
            }
        } else {
            // Handle file upload failure
            echo "Failed to upload the new image.";
        }
    } else {
        // No new image provided, update other details if needed
        // Update image details in the database
        $update_query = "UPDATE gambar SET ... WHERE id_gambar=$id_gambar";
        $update_result = mysqli_query($db, $update_query);

        if($update_result) {
            // Redirect to the image list page
            header("location: data_upload.php");
        } else {
            // Handle database update failure
            echo "Failed to update image details in the database.";
        }
    }
} else {
    // Handle invalid form submission
    echo "Invalid form submission.";
}
?>
