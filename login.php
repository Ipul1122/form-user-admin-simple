<?php
include('db.php');
session_start();
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            
            <!-- Password field with eye icon -->
            <div class="password-container">
                <input type="password" name="password" id="login-password" placeholder="Password" required>
                <span class="eye-icon" onclick="togglePassword('login-password')">&#128065;</span>
            </div>
            
            <button type="submit">Login</button>
            <p class="error-message"><?php echo $error; ?></p>
        </form>
        <p class="message">Belum punya akun? <a href="register.php">Daftar now</a></p>
    </div>

    <script src="script.js"> </script>
</body>
</html>


