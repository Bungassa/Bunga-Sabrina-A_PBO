<?php
session_start();

// Redirect to login if not authenticated
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include('koneksi.php');
$db = new database(); 
// Ambil ID barang dari URL
$id_barang = isset($_GET['id_barang']) ? (int)$_GET['id_barang'] : 0; 

// Pastikan ID barang valid sebelum memanggil method
if ($id_barang > 0) {
    $data_edit_barang = $db->tampil_edit_data($id_barang);
} else {
    // Jika ID tidak ditemukan, kembalikan ke index.php
    header("Location: index.php");
    exit();
}

// Pastikan data ditemukan
if (empty($data_edit_barang)) {
    echo "Data barang tidak ditemukan.";
    exit();
}
    // Karena hasil tampil_edit_data adalah array dengan satu elemen, kita ambil elemen pertama
    $d = $data_edit_barang[0]; 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Barang</title>
</head>
<body>
    <h3>Form Edit Data Barang</h3>
    <hr/>
    
    <form method="post" action="proses_barang.php?action=edit">
        <input type="hidden" name="id_barang" value="<?php echo htmlspecialchars($d['id_barang']); ?>">
        <table>
            <tr>
                <td><label for="kode_barang">Kode Barang</label></td>
                <td><input type="text" name="kode_barang" id="kode_barang" value="<?php echo htmlspecialchars($d['kode_barang']); ?>"></td>
            </tr>
            <tr>
                <td><label for="nama_barang">Nama Barang</label></td>
                <td><input type="text" name="nama_barang" id="nama_barang" value="<?php echo htmlspecialchars($d['nama_barang']); ?>"></td>
            </tr>
            <tr>
                <td><label for="stok">Stok</label></td>
                <td><input type="number" name="stok" id="stok" value="<?php echo htmlspecialchars($d['stok']); ?>"></td>
            </tr>
            <tr>
                <td><label for="harga_beli">Harga Beli</label></td>
                <td><input type="number" name="harga_beli" id="harga_beli" value="<?php echo htmlspecialchars($d['harga_beli']); ?>"></td>
            </tr>
            <tr>
                <td><label for="harga_jual">Harga Jual</label></td>
                <td><input type="number" name="harga_jual" id="harga_jual" value="<?php echo htmlspecialchars($d['harga_jual']); ?>"></td>
            </tr>
            <tr>
                <td colspan="2" style="padding-top: 10px;">
                    <button type="submit">Update</button>
                    <a href="index.php" style="margin-left: 10px;"><button type="button">Kembali</button></a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>