<?php
include('db.php');
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $checkUser = $conn->query("SELECT * FROM users WHERE username='$username'");

    if ($checkUser->num_rows > 0) {
        $error = "Username sudah digunakan!";
    } else {
        $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";
        if ($conn->query($sql) === TRUE) {
            header("Location: login.php");
            exit;
        } else {
            $error = "Registrasi gagal: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            
            <!-- Password field with eye icon -->
            <div class="password-container">
                <input type="password" name="password" id="register-password" placeholder="Password" required>
                <span class="eye-icon" onclick="togglePassword('register-password')">&#128065;</span>
            </div>
            
            <select name="role">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <button type="submit">Register</button>
            <p class="error-message"><?php echo $error; ?></p>
        </form>
        <p class="message">Sudah punya akun? <a href="login.php">Login now</a></p>
    </div>

    <script src="script.js"></script>
</body>
</html>

