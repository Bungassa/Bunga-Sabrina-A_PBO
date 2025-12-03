<?php
include('koneksi.php');
$koneksi = new database();

$action = $_GET['action'];

if($action == "add"){
    $koneksi->tambah_data($_POST['kd_barang'],$_POST['nama_barang'],$_POST['stok'],$_POST['harga_beli'],$_POST['harga_jual'],$_FILES['gambar_produk']['name']);
    header('location:tampil.php');
    exit();
}

else if($action == "edit"){
    $id_barang = $_GET['id_barang'];
    $koneksi->edit_data($id_barang, $_POST['nama_barang'], $_POST['stok'], $_POST['harga_beli'], $_POST['harga_jual'], $_FILES['gambar_produk']['name']);
    header('location:tampil.php');
    exit();
}

else if($action == "delete"){
    $id_barang = $_GET['id_barang'];
    $koneksi->delete_data($id_barang);
    header('location:tampil.php');
    exit();
}

else if($action == "print_satuan"){
    $nama_barang = $_POST['nama_barang'];
    $koneksi->satuan_print($nama_barang);
    header('location:cetak2.php?nama_barang='.$nama_barang);
    exit();
}

else if($action == "login"){
    $koneksi->login($_POST['username'],$_POST['password']);
}

else if($action == "logout"){
    $koneksi->logout();
}

?>