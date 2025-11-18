<?php
session_start();

// Redirect to login if not authenticated
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<?php
    include('koneksi.php');
    $db = new database();
    
    if(isset($_GET['cari'])){
        $cari = $_GET['cari'];
        $data_barang = $db->tampil_data($cari);
    } else {
        $data_barang = $db->tampil_data();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cari Data Barang</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .search-form { margin: 10px 0; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Cari Data Barang</h1>
        <div>
            <span>Selamat datang, <?php echo $_SESSION['username']; ?>!</span>
            <a href="logout.php" style="margin-left: 10px;">Logout</a>
        </div>
    </div>
    
    <form class="search-form" method="get">
        <input type="text" name="cari" placeholder="Cari Nama Barang" value="<?php echo isset($_GET['cari']) ? htmlspecialchars($_GET['cari']) : ''; ?>">
        <input type="submit" value="Cari">
    </form>
    
    <?php if(isset($_GET['cari']) && !empty($_GET['cari'])): ?>
        <p><b>Hasil pencarian: <?php echo htmlspecialchars($_GET['cari']); ?></b></p>
    <?php endif; ?>
    
    <table>
        <tr>
            <th>No</th>
            <th>Barang</th>
            <th>Stok</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Action</th>
        </tr>
        <?php if(count($data_barang) > 0): ?>
            <?php $no = 1; ?>
            <?php foreach($data_barang as $row): ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($row['nama_barang']); ?></td>
                    <td><?php echo htmlspecialchars($row['stok']); ?></td>
                    <td><?php echo htmlspecialchars($row['harga_beli']); ?></td>
                    <td><?php echo htmlspecialchars($row['harga_jual']); ?></td>
                    <td>
                        <a href="edit_data.php?id_barang=<?php echo $row['id_barang']; ?>&action=edit">Edit</a>
                        <a href="proses_barang.php?id_barang=<?php echo $row['id_barang']; ?>&action=delete">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" style="text-align: center;">Tidak ada data ditemukan</td>
            </tr>
        <?php endif; ?>
    </table>
    
    <a href="index.php" class="back-link">Kembali ke Halaman Utama</a>
</body>
</html>