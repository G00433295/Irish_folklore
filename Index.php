<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Irish Folklore Login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body class="login-page">

  <div class="container">
    <h2>Login</h2>
    <form method="POST" action="login.php">
      <input type="text" name="login_input" placeholder="Username / Email" required><br>
      <input type="password" name="password" placeholder="Password" required><br>
      <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a id="openModal">Register here</a></p>
  </div>

  <!-- Register Modal -->
  <div class="modal" id="registerModal">
    <div class="modal-content">
      <span class="close" id="closeModal">&times;</span>
      <h2>Register</h2>
      <form id="registerForm">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required><br>
        <button type="submit">Register</button>
      </form>
      <div id="register-message"></div>
    </div>
  </div>

  <script>
    const modal = document.getElementById("registerModal");
    const openModal = document.getElementById("openModal");
    const closeModal = document.getElementById("closeModal");
    const registerForm = document.getElementById("registerForm");
    const messageDiv = document.getElementById("register-message");

    openModal.onclick = () => modal.style.display = "flex";
    closeModal.onclick = () => {
      modal.style.display = "none";
      messageDiv.textContent = "";
      registerForm.reset();
    };
    window.onclick = (e) => { if (e.target == modal) modal.style.display = "none"; };

    // AJAX registration with confirm password check
    registerForm.onsubmit = async (e) => {
      e.preventDefault();

      const password = registerForm.password.value;
      const confirmPassword = registerForm.confirm_password.value;

      if (password !== confirmPassword) {
        messageDiv.style.color = "red";
        messageDiv.textContent = "Passwords do not match.";
        return;
      }

      const formData = new FormData(registerForm);
      const response = await fetch("register.php", {
        method: "POST",
        body: formData
      });
      const result = await response.text();

      if (result.trim() === "success") {
        messageDiv.style.color = "green";
        messageDiv.textContent = "Registration successful! Redirecting...";
        setTimeout(() => {
          window.location.href = "home.php";
        }, 1000);
      } else {
        messageDiv.style.color = "red";
        messageDiv.textContent = result;
      }
    };
  </script>

</body>
</html>


