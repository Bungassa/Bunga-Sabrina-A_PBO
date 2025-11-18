<?php
session_start();

// Redirect to login if not authenticated
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Redirect to login if not authenticated
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Sertakan file koneksi yang berisi class database
include('koneksi.php');
$db = new database();

// Cek apakah ada parameter 'action' di URL (untuk Hapus) atau di POST (untuk Tambah)
if(isset($_GET['action'])){
    $action = $_GET['action'];
    
    if($action == 'delete'){
        // Pastikan id_barang tersedia dan merupakan integer
        if(isset($_GET['id_barang']) && is_numeric($_GET['id_barang'])){
            $id_barang = $_GET['id_barang'];
            $db->delete_data($id_barang);
        }
        
    } 
    
    // Formulir tambah data.php mengirimkan action=add melalui GET dan data melalui POST
    elseif ($action == 'add'){
        // Ambil data dari formulir POST
        $kode_barang = $_POST['kode_barang'];
        $nama_barang = $_POST['nama_barang'];
        $stok = $_POST['stok'];
        $harga_beli = $_POST['harga_beli'];
        $harga_jual = $_POST['harga_jual'];

        // Panggil method input/tambah_data di class database
        // Asumsi methodnya bernama 'input'
        // Jika id_barang Auto Increment, pastikan method ini hanya menerima 4 parameter ini.
        $db->tambah_data($kode_barang, $nama_barang, $stok, $harga_beli, $harga_jual);
    }
    elseif ($action == 'edit'){
        // Ambil ID barang dari hidden input POST
        $id_barang = (int)$_POST['id_barang']; 
        $kode_barang = $_POST['kode_barang'];
        $nama_barang = $_POST['nama_barang'];
        $stok = (int)$_POST['stok'];
        $harga_beli = (float)$_POST['harga_beli'];
        $harga_jual = (float)$_POST['harga_jual'];

        // Debug: log the data
        $debug_msg = "Editing item: id_barang=$id_barang, kode_barang=$kode_barang, nama_barang=$nama_barang, stok=$stok, harga_beli=$harga_beli, harga_jual=$harga_jual\n";
        file_put_contents('debug_edit.log', $debug_msg, FILE_APPEND);

        // Panggil method edit_data dari class database
        $result = $db->edit_data($id_barang, $kode_barang, $nama_barang, $stok, $harga_beli, $harga_jual);
        if ($result !== true) {
            die($result);
        }
    }
}

// Jika ada data POST tanpa action (misalnya jika Anda ingin menggunakan POST untuk edit), 
// Anda bisa menambahkan logika di sini.

// Setelah selesai memproses, redirect kembali ke index.php
header("Location: index.php");
exit();
?>