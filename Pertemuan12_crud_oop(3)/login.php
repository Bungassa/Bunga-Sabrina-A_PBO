<?php
session_start();

// kalau udah login, langsung arahkan ke tampil.php
if (isset($_SESSION['username'])) {
    header("Location: tampil.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    <form method="post" action="proses_barang.php?action=login">
        <label>Username</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
