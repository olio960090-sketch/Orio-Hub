<?php
header("Content-Type: application/json");

// Read JSON data
$data = json_decode(file_get_contents("php://input"), true);

$email = $data['email'];
$password = $data['password'];

// MySQL Connection
$conn = new mysqli("localhost", "root", "", "your_database_name");

if ($conn->connect_error) {
    echo json_encode(["status" => "danger", "message" => "Database connection failed"]);
    exit;
}

// Fetch user
$stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 0) {
    echo json_encode(["status" => "danger", "message" => "Invalid email or password"]);
    exit;
}

$stmt->bind_result($hashedPassword);
$stmt->fetch();

// Verify password
if (password_verify($password, $hashedPassword)) {
    echo json_encode(["status" => "success", "message" => "Login successful!"]);
} else {
    echo json_encode(["status" => "danger", "message" => "Incorrect password"]);
}

$stmt->close();
$conn->close();
?>
