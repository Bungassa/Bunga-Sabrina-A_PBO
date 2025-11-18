<?php
session_start();
include('koneksi.php');
$db = new database();
$data_barang = $db->cetak_data();

if (isset($_GET['id_barang'])) {
    $id_barang = $_GET['id_barang'];
    $data_barang = $db->cetak_satuan($id_barang); // nanti kamu buat fungsi ini di class database
} else {
    $data_barang = $db->cetak_data();
}

?>



<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        form#background_border{
            margin : 0px 230px;
            color:white;
        }
    </style>
</head>
<body onload="window.print()">
    <h3>LAPORAN DATA BARANG CV JAYA</h3>
    <hr>

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
        </tr>
        <?php
        $no = 1;
        foreach ($data_barang as $row) {
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['kode_barang']; ?></td>
            <td><?php echo $row['nama_barang']; ?></td>
            <td><?php echo $row['stok']; ?></td>
            <td><?php echo $row['harga_beli']; ?></td>
            <td><?php echo $row['harga_jual']; ?></td>
        </tr>
        <?php } ?>
    </table>

</body>
</html>
