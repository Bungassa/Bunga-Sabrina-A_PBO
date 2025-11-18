<?php
include('koneksi.php');
$db = new database();
$data_barang = $db->tampil_data();
$koneksi = mysqli_connect("localhost","root","","belajar_oop2");

$keyword = "";

if (isset($_GET['cari']) && $_GET['cari'] != "") {
    $keyword = $_GET['cari'];
    $data_barang = $db->cari_data($keyword); 
    echo "<b>Hasil pencarian: ".$keyword."</b><br><br>";
} else {
    $data_barang = $db->tampil_data(); 

}
?>
<!DOCTYPE html>
<html>
<head>
    <a href="index.php"><button>Data Barang</button></a>&nbsp;&nbsp;
    <a href="cust.php"><button>Data Customer</button></a>&nbsp;&nbsp;
    <a href="supp.php"><button>Data Supplier</button></a>&nbsp;&nbsp;

    <title></title>
    <style type="text/css">
        form#background_border{
            margin: 0px 300px;
            color:white;
        }
    </style>
</head>
<body>
    <form id="background_border" method="get">
        <input type="text" name="cari" placeholder="Cari Nama Barang">
        <input type="submit" value="Cari">
    </form>

    <a href="tambah_data.php"><button>Tambah Data</button></a>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="cetak.php" target="_BLANK"><button>Print Data Barang</button></a>

    <table border="1">
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Barang</th>
            <th>Stok</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Action</th>
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
            <td>
                <a href="edit_data.php?id_barang=<?php echo $row['id_barang']; ?>&action=edit">Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="proses_barang.php?id_barang=<?php echo $row['id_barang']; ?>&action=delete">Hapus</a>
            </td>
        </tr>
        <?php
        }
        ?>
        
    </table>

    <form action="logout.php" method="post" style="display:inline;">
        <button type="submit"> Keluar</button>
    </form>
    <br><br></tr>

    <form method="get">
        <input type="text" name="cari" placeholder="Cari Nama Barang" value="<?php echo htmlspecialchars($keyword); ?>">
        <input type="submit" value="Cari">
        <?php if ($keyword != ""): ?>
            <a href="cetak_satuan.php?nama=<?php echo urlencode($keyword); ?>" target="_blank">
                <button type="button"> Cetak Barang Ini</button>
            </a>
        <?php endif; ?>
    </form>

</body>
</html>