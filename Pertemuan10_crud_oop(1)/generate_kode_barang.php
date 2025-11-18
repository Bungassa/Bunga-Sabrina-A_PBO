<?php
include('koneksi.php');
$db = new database();

// Ambil semua data barang
$data_barang = $db->tampil_data();

// Loop melalui setiap barang dan update kode_barang
$counter = 1;
foreach ($data_barang as $barang) {
    $id_barang = $barang['id_barang'];
    $kode_barang = 'BRG' . str_pad($counter, 2, '0', STR_PAD_LEFT);
    
    // Update kode_barang untuk barang ini
    $db->koneksi->query("UPDATE tb_barang SET kode_barang = '$kode_barang' WHERE id_barang = $id_barang");
    
    $counter++;
}

echo "Berhasil mengupdate kode barang untuk " . ($counter-1) . " barang.";
?>