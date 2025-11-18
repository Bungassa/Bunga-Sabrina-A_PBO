<?php
include('koneksi.php');
$db = new database();
$customers = $db->tampil_customer(); // fungsi di database.php
?>
<!DOCTYPE html>
<html>
<head>
    <title>Kelola Customer</title>
</head>
<body>
    <h3>Data Customer</h3>
    <a href="tambah_customer.php"><button>Tambah Customer</button></a>
    <a href="index.php"><button>Kembali</button></a>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama Customer</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php $no=1; foreach($customers as $c){ ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $c['nama_customer']; ?></td>
            <td><?php echo $c['email_customer']; ?></td>
            <td><?php echo $c['telepon_customer']; ?></td>
            <td><?php echo $c['alamat_customer']; ?></td>
            <td>
                <a href="edit_customer.php?id=<?php echo $c['id_customer']; ?>">Edit</a> |
                <a href="proses_customer.php?action=delete&id=<?php echo $c['id_customer']; ?>">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
