<?php
include("config.php");

// Retrieve the id_gambar from the query parameters
$id_gambar = $_GET['edit'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Image</title>
</head>
<body>
    <h2>Edit Image</h2>
    <form method="post" enctype="multipart/form-data" action="update-upload.php">
        <input type="hidden" name="id_gambar" value="<?php echo $id_gambar; ?>">
        <label for="new_gambar">New Image:</label>
        <input type="file" name="new_gambar">
        <input type="submit" name="update" value="update">
    </form>
</body>
</html>
