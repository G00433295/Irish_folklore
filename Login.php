<?php
session_start();
require_once "db_connect.php";
require_once "setcheckoutforms.php";

/* Get form values (matches Index.php) */
$input    = trim($_POST['login_input'] ?? '');
$password = $_POST['password'] ?? '';

$errors = [];

/* Requirement 5 – Validation */
validate_required($input, "Username or Email", $errors);
validate_required($password, "Password", $errors);

if (!empty($errors)) {
    echo implode("<br>", $errors);
    exit;
}

/* Requirement 4 – Prepared SQL (username OR email) */
if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
    $sql = "SELECT user_id, username, password FROM Users WHERE email = ? LIMIT 1";
} else {
    $sql = "SELECT user_id, username, password FROM Users WHERE username = ? LIMIT 1";
}

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $input);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    echo "Invalid username/email or password.";
    exit;
}

$user = $result->fetch_assoc();

if (!password_verify($password, $user['password'])) {
    echo "Invalid username/email or password.";
    exit;
}

/* Login success */
$_SESSION['user_id'] = $user['user_id'];
$_SESSION['username'] = $user['username'];

/* ✅ COOKIE: remember last user for 100 days */
setcookie("last_user", $user['username'], time() + (3600 * 24 * 100), "/");

header("Location: home.php");
exit;
?>
