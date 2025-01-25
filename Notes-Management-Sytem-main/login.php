<?php
session_start();
include_once('includes/config.php');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysqli_query($con, "SELECT * FROM users WHERE username='$username' AND password='$password'");
    $user = mysqli_fetch_array($query);

    if ($user) {
        $_SESSION['userid'] = $user['id'];
        header('location:dashboard.php');
    } else {
        echo "<script>alert('Invalid login credentials.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login - Task Management System</title>
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
    <div class="login-container">
        <h3>Login</h3>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required />
            <input type="password" name="password" placeholder="Password" required />
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>
</html>
