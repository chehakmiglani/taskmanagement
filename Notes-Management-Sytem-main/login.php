<?php
session_start();
include_once('includes/config.php');

// Right after mysqli_connect or wherever $con is set:
if (!$con) {
    die("Database Connection Failed: " . mysqli_connect_error());
}


if (isset($_POST['login'])) {
    $username = $_POST['username'];
    // Use password_hash/verify in production; this is just for demonstration
    $password = $_POST['password']; // if DB has plain text

    $query = mysqli_query($con, "SELECT * FROM users WHERE username='$username' AND password='$password'");
    $user = mysqli_fetch_array($query);

    if ($user) {
        $_SESSION['userid'] = $user['id'];
        header('location:dashboard.php');
        exit;
    } else {
        echo "<script>alert('Invalid login credentials.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login - Task Management System</title>
    <!-- Google Font (optional) -->
    <link 
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" 
      rel="stylesheet"
    >
    
    <!-- Inline CSS for Elegant Gradient & Box -->
    <style>
      body {
        margin: 0; 
        padding: 0;
        font-family: 'Inter', sans-serif;
        /* Full-page subtle gradient background (blue/purple) */
        background: linear-gradient(120deg, #302b63 0%, #24243e 100%);
        
        /* Center the login box */
        display: flex; 
        justify-content: center; 
        align-items: center; 
        height: 100vh; 
        color: #fff;
      }

      .login-container {
        /* Elegant gradient box with a glassy effect */
        background: linear-gradient(
          135deg,
          rgba(255,255,255,0.15),
          rgba(255,255,255,0.10)
        );
        backdrop-filter: blur(8px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        border-radius: 12px;
        width: 360px;
        padding: 2rem;
        text-align: center;
      }

      .login-container h3 {
        margin-bottom: 1.5rem;
        font-size: 1.8rem;
        font-weight: 600;
      }

      .login-container form {
        display: flex; 
        flex-direction: column; 
        gap: 1rem;
      }

      /* Inputs */
      .login-container input {
        padding: 0.8rem;
        border: none;
        border-radius: 6px;
        outline: none;
        font-size: 1rem;
        color: #333;
      }

      /* Button */
      .login-container button {
        padding: 0.8rem;
        border: none;
        border-radius: 6px;
        background: #6a3093;
        background: linear-gradient(45deg, #6a3093, #a044ff);
        color: #fff;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: 0.3s ease;
      }
      .login-container button:hover {
        filter: brightness(1.1);
        transform: translateY(-2px);
      }

      /* Optional: small text or link below form */
      .extra-info {
        margin-top: 1.5rem;
        font-size: 0.9rem;
        color: #ccc;
      }
      .extra-info a {
        color: #fff; 
        text-decoration: underline;
      }
    </style>
</head>
<body>

  <div class="login-container">
      <h3>Login</h3>
      <form method="post">
          <input type="text" name="username" placeholder="Username" required />
          <input type="password" name="password" placeholder="Password" required />
          <button type="submit" name="login">Login</button>
      </form>
      <div class="extra-info">
        <p>Forgot Password? <a href="#">Reset here</a></p>
      </div>
  </div>

</body>
</html>
