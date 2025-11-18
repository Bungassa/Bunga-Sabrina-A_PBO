<?php
session_start();

// Redirect to login if not authenticated
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['cari']) && $_GET['cari'] != '') {
    $cari = $_GET['cari'];
    $data_barang = $db->cari_data($cari); // nanti kamu buat fungsi ini di class database
} else {
    $data_barang = $db->cetak_data();
}
?>


include('koneksi.php');
$db = new database();
$data_barang = $db->cetak_data();
$koneksi = mysqli_connect("localhost","root","","belajar_oop");
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        form {
            background: border;
            margin: 0px 0px;
            color: white;
        }
    </style>
</head>
<body>
    <a href="tambah_data.php"><button> Tambah Data</button></a>
    <a href="cetak.php" target="_blank"><button>Cetak Laporan</button></a>
    <br><br>
    
    <form id="background_border" method="get">
        <input type="text" name="cari" placeholder="Cari Nama Barang">
        <input type="submit" value="Cari">
    </form>

    <?php
    if (isset($_GET['cari'])) {
        $cari = $_GET['cari'];
        echo "<b>Hasil pencarian : " . $cari . "</b>";
    }
    ?>

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
        foreach ($data_barang as $row) {
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo htmlspecialchars($row['kode_barang']); ?></td>
            <td><?php echo htmlspecialchars($row['nama_barang']); ?></td>
            <td><?php echo htmlspecialchars($row['stok']); ?></td>
            <td><?php echo htmlspecialchars($row['harga_beli']); ?></td>
            <td><?php echo htmlspecialchars($row['harga_jual']); ?></td>
            <td>
                <a href="edit_data.php?id_barang=<?php echo $row['id_barang']; ?>&action=edit">Edit</a>
                <a href="proses_barang.php?id_barang=<?php echo $row['id_barang']; ?>&action=delete">Hapus</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
     <form class="logout-form" action="logout.php" method="post">
        <input type="submit" value="Keluar Aplikasi">
    </form>
</body>
</html>
