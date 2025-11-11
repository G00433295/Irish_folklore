<?php
include 'db_connect.php';
session_start();

$input = $_POST['login_input'];
$password = $_POST['password'];

// Check if email or username
if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
    $sql = "SELECT * FROM Users WHERE email = ?";
} else {
    $sql = "SELECT * FROM Users WHERE username = ?";
}

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $input);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        header("Location: home.php");
        exit();
    } else {
        echo "Invalid password.";
    }
} else {
    echo "No user found.";
}
?>
