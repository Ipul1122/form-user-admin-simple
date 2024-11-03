<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container dashboard-container">
        <h2>Selamat datang, <?php echo $username; ?>!</h2>
        <p>Anda login sebagai <?php echo $role; ?>.</p>
        <a href="logout.php"><button class="logout-button">Logout</button></a>
    </div>
</body>
</html>

