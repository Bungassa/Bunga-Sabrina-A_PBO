<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "si_gudang";

//isi nma host, username mysql, dan password mysql anda
$koneksi = mysqli_connect($host,$username,$password,$database, 3307);
if (!$koneksi) { die('koneksi gagal: '.mysqli_connect_error());}
?>
