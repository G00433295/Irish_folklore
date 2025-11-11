<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head><title>Home</title></head>
<body>
  <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
  <p>This is your Irish Folklore home page 🌿</p>
  <a href="logout.php">Logout</a>
</body>
</html>
