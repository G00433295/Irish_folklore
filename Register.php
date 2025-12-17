<?php
session_start();
require_once "db_connect.php";
require_once "setcheckoutforms.php"; // your validation functions

$username = trim($_POST['username'] ?? '');
$email    = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$confirm  = $_POST['confirm_password'] ?? '';

$errors = [];

// Requirement 5: validation
validate_required($username, "Username", $errors);
validate_required($email, "Email", $errors);
validate_required($password, "Password", $errors);
validate_required($confirm, "Confirm Password", $errors);

validate_email($email, "Email", $errors);

if ($password !== "" && $confirm !== "" && $password !== $confirm) {
    $errors[] = "Passwords do not match.";
}

// Password rule (your rule)
if ($password !== "" && (strlen($password) < 8 || !preg_match('/\d/', $password))) {
    $errors[] = "Password must be at least 8 characters long and contain at least one number.";
}

if (!empty($errors)) {
    echo implode("<br>", $errors);
    exit;
}

// Requirement 4: prepared statement (check exists)
// ✅ use SELECT 1 so you don't need an 'id' column
$stmt = $conn->prepare("SELECT 1 FROM Users WHERE username = ? OR email = ? LIMIT 1");
$stmt->bind_param("ss", $username, $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "Username or email already exists.";
    exit;
}
$stmt->close();

// Insert user (prepared statement)
$hashed = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO Users (username, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $email, $hashed);

if ($stmt->execute()) {
    $_SESSION['username'] = $username;
    echo "success";
} else {
    echo "Error: " . $stmt->error;
}
$stmt->close();
