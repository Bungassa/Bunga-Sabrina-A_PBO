<?php
include('koneksi.php');
$db = new database();
$suppliers = $db->tampil_supplier();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Kelola Supplier</title>
</head>
<body>
    <h3>Data Supplier</h3>
    <a href="tambah_supplier.php"><button>Tambah Supplier</button></a>
    <a href="index.php"><button>Kembali</button></a>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama Supplier</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php $no=1; foreach($suppliers as $s){ ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $s['nama_supplier']; ?></td>
            <td><?php echo $s['email_supplier']; ?></td>
            <td><?php echo $s['telepon_supplier']; ?></td>
            <td><?php echo $s['alamat_supplier']; ?></td>
            <td>
                <a href="edit_supplier.php?id=<?php echo $s['id_supplier']; ?>">Edit</a> |
                <a href="proses_supplier.php?action=delete&id=<?php echo $s['id_supplier']; ?>">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
