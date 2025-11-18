<?php
session_start();
include 'koneksi.php';

// Ambil data dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Buat objek dari class database
$db = new database();

// Cek login pakai fungsi dari class
$user = $db->login_user($username, $password);

if ($user) {
    // Kalau login berhasil, buat session
    $_SESSION['user_id'] = $user['id_user']; 
    $_SESSION['username'] = $user['username'];
    $_SESSION['level'] = $user['level']; // tipe_user (Administrator/Petugas)
    $_SESSION['status'] = "login";

    // Redirect ke halaman utama
    header("Location: index.php");
    exit;
} else {
    // Kalau gagal login, kembali ke form login
    header("Location: login.php?pesan=gagal");
    exit;
}
?>
