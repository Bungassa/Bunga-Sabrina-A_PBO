<?php
include('koneksi.php');
$db = new database();

$action = $_GET['action'];

if($action == "add"){
    // Ambil data dari formulir tambah
    $id_supplier = $_POST['id_supplier'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Panggil fungsi tambah_supplier
    $db->tambah_supplier($id_supplier, $nama, $alamat, $telepon, $email, $password);

    header("location:supp.php"); // Redirect kembali ke halaman supplier

} elseif($action == "edit"){
    // Ambil data dari formulir edit
    $id_supplier = $_POST['id_supplier'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Panggil fungsi edit_supplier
    $db->edit_supplier($id_supplier, $nama, $alamat, $telepon, $email, $password);

    header("location:supp.php"); // Redirect kembali ke halaman supplier

} elseif($action == "delete"){
    // Ambil ID dari URL
    $id_supplier = $_GET['id'];

    // Panggil fungsi delete_supplier
    $db->delete_supplier($id_supplier);

    header("location:supp.php"); // Redirect kembali ke halaman supplier
}
?>