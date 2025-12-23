<?php
header("Content-Type: application/json");

// DB connection
$conn = new mysqli("localhost", "root", "", "screenrecorder");

if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "DB Error"]);
    exit();
}

$uploadDir = "uploads/";

if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if (!isset($_FILES["video"])) {
    echo json_encode(["status" => "error", "message" => "No video uploaded"]);
    exit();
}

$fileName = time() . "_" . $_FILES["video"]["name"];
$filePath = $uploadDir . $fileName;

if (move_uploaded_file($_FILES["video"]["tmp_name"], $filePath)) {

    // insert info to DB
    $stmt = $conn->prepare("INSERT INTO videos (file_name, file_path) VALUES (?, ?)");
    $stmt->bind_param("ss", $fileName, $filePath);
    $stmt->execute();

    echo json_encode(["status" => "success", "path" => $filePath]);
} else {
    echo json_encode(["status" => "error", "message" => "Failed to save file"]);
}
