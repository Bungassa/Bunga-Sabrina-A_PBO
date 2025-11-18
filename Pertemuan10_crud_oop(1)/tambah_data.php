<?php
session_start();

// Redirect to login if not authenticated
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Barang</title>
</head>
<body>
    <h3>Form Tambah Data Barang</h3>
    <hr/>
    <form method="post" action="proses_barang.php?action=add">
        <table>
            <tr>
                <td><label for="kode_barang">Kode Barang</label></td>
                <td><input type="text" name="kode_barang" id="kode_barang"></td>
            </tr>
            <tr>
                <td><label for="nama_barang">Nama Barang</label></td>
                <td><input type="text" name="nama_barang" id="nama_barang"></td>
            </tr>
            <tr>
                <td><label for="stok">Stok</label></td>
                <td><input type="number" name="stok" id="stok"></td>
            </tr>
            <tr>
                <td><label for="harga_beli">Harga Beli</label></td>
                <td><input type="number" name="harga_beli" id="harga_beli"></td>
            </tr>
            <tr>
                <td><label for="harga_jual">Harga Jual</label></td>
                <td><input type="number" name="harga_jual" id="harga_jual"></td>
            </tr>
            <tr>
                <td colspan="2" style="padding-top: 10px;">
                    <button type="submit">Simpan</button>
                    <a href="index.php" style="margin-left: 10px;"><button type="button">Kembali</button></a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>