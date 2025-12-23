<?php
$conn = new mysqli("localhost", "root", "", "screenrecorder");

// Video ID from form
$id = $_POST['id'];

// Fetch the file path
$result = $conn->query("SELECT file_path FROM videos WHERE id = $id");
$row = $result->fetch_assoc();

if ($row) {
    $file = $row['file_path'];

    // Delete file from server
    if (file_exists($file)) {
        unlink($file);
    }

    // Delete from database
    $conn->query("DELETE FROM videos WHERE id = $id");
}

// Redirect back to videos list
header("Location: videos.php");
exit();
?>
