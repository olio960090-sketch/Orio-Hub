<?php
$conn = new mysqli("localhost", "root", "", "screenrecorder");
$result = $conn->query("SELECT * FROM videos ORDER BY uploaded_at DESC");

echo "<h2>Saved Recordings</h2>";

while ($row = $result->fetch_assoc()) {
    echo "<div style='margin:10px; padding:10px; background:#222; color:white;'>
            <p>".$row['file_name']."</p>
            <video src='".$row['file_path']."' controls width='400'></video>
          </div>";
}
?>
