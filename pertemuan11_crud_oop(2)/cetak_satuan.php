<?php
include('koneksi.php');
$db = new database();

$nama_barang = isset($_GET['nama']) ? $_GET['nama'] : "";
if ($nama_barang == "") die("Nama barang tidak diberikan.");

$data_barang = $db->cari_data($nama_barang);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cetak Barang</title>
    <style>
        table { border-collapse: collapse; width: 80%; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: left; }
        @media print { button { display: none; } }
    </style>
</head>
<body>
    <h3>Data Barang: <?php echo htmlspecialchars($nama_barang); ?></h3>
    <button onclick="window.print()"> Cetak</button>
    <br><br>
    <table>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Keuntungan</th>
        </tr>
        <?php
        $no = 1;
        foreach($data_barang as $row){
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['kd_barang']; ?></td>
            <td><?php echo $row['nama_barang']; ?></td>
            <td><?php echo $row['stok']; ?></td>
            <td><?php echo $row['harga_beli']; ?></td>
            <td><?php echo $row['harga_jual']; ?></td>
            <td><?php echo ($row['harga_jual'] - $row['harga_beli']); ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
