<?php
include('koneksi.php');
$db = new database();

$action = $_GET['action'];

if($action == "add"){
    // Ambil data dari formulir tambah
    $id_customer = $_POST['id_customer'];
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Panggil fungsi tambah_customer
    $db->tambah_customer($id_customer, $nik, $nama, $jk, $alamat, $telepon, $email, $password);

    header("location:cust.php"); // Redirect kembali ke halaman customer

} elseif($action == "edit"){
    // Ambil data dari formulir edit
    $id_customer = $_POST['id_customer'];
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Panggil fungsi edit_customer
    $db->edit_customer($id_customer, $nik, $nama, $jk, $alamat, $telepon, $email, $password);

    header("location:cust.php"); // Redirect kembali ke halaman customer

} elseif($action == "delete"){
    // Ambil ID dari URL
    $id_customer = $_GET['id'];

    // Panggil fungsi delete_customer
    $db->delete_customer($id_customer);

    header("location:cust.php"); // Redirect kembali ke halaman customer
}
?>